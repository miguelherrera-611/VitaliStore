<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;
use Carbon\Carbon;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validar credenciales sin autenticar
        $credentials = $request->only('email', 'password');

        if (!Auth::validate($credentials)) {
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas son incorrectas.',
            ]);
        }

        // Obtener el usuario
        $user = User::where('email', $request->email)->first();

        // Generar código de 6 dígitos
        $code = random_int(100000, 999999);

        // Guardar código y expiración (10 minutos)
        $user->verification_code = $code;
        $user->code_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        // Enviar email con el código
        Mail::to($user->email)->send(new VerificationCodeMail($code));

        // Guardar email en sesión
        session(['2fa_email' => $user->email]);

        return redirect()->route('verification.2fa.show');
    }

    /**
     * Mostrar formulario de verificación 2FA
     */
    public function showVerificationForm(): Response
    {
        $email = session('2fa_email');

        if (!$email) {
            return redirect()->route('login');
        }

        return Inertia::render('Auth/VerifyCode', [
            'email' => $email,
        ]);
    }

    /**
     * Verificar código 2FA
     */
    public function verifyCode(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

        $email = session('2fa_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['code' => 'Usuario no encontrado.']);
        }

        // Verificar código
        if ($user->verification_code != $request->code) {
            return back()->withErrors(['code' => 'El código ingresado es incorrecto.']);
        }

        // Verificar expiración
        if (Carbon::now()->greaterThan($user->code_expires_at)) {
            return back()->withErrors(['code' => 'El código ha expirado. Por favor, inicia sesión nuevamente.']);
        }

        // Limpiar código
        $user->verification_code = null;
        $user->code_expires_at = null;
        $user->save();

        // Autenticar usuario
        Auth::login($user);
        $request->session()->regenerate();
        $request->session()->forget('2fa_email');

        // Redirigir según el rol
        if ($user->hasRole('super_admin')) {
            return redirect()->intended('/dashboard/superadmin');
        } elseif ($user->hasRole('admin')) {
            return redirect()->intended('/dashboard/admin');
        } elseif ($user->hasRole('empleado')) {
            return redirect()->intended('/dashboard/empleado');
        }

        return redirect()->intended('/dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
