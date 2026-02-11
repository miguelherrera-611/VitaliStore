<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta de bienvenida
Route::get('/', function () {
    // Si el usuario está autenticado, redirigir a su dashboard
    if (auth()->check()) {
        $user = auth()->user();

        if ($user->hasRole('super_admin')) {
            return redirect()->route('dashboard.superadmin');
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('dashboard.admin');
        } elseif ($user->hasRole('empleado')) {
            return redirect()->route('dashboard.empleado');
        }

        return redirect()->route('dashboard');
    }

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('welcome');

// Rutas protegidas con autenticación
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard general (fallback)
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->hasRole('super_admin')) {
            return redirect()->route('dashboard.superadmin');
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('dashboard.admin');
        } elseif ($user->hasRole('empleado')) {
            return redirect()->route('dashboard.empleado');
        }

        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Dashboards por rol
    Route::get('/dashboard/superadmin', [DashboardController::class, 'superAdmin'])
        ->middleware('role:super_admin')
        ->name('dashboard.superadmin');

    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->middleware('role:admin')
        ->name('dashboard.admin');

    Route::get('/dashboard/empleado', [DashboardController::class, 'empleado'])
        ->middleware('role:empleado')
        ->name('dashboard.empleado');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ==========================================
    // MÓDULOS (pendientes de implementar)
    // ==========================================

    // Gestión de Usuarios (solo super_admin)
    Route::middleware('role:super_admin')->prefix('usuarios')->name('usuarios.')->group(function () {
        // Route::get('/', [UsuarioController::class, 'index'])->name('index');
        // Route::get('/crear', [UsuarioController::class, 'create'])->name('create');
        // Route::post('/', [UsuarioController::class, 'store'])->name('store');
        // Route::get('/{id}/editar', [UsuarioController::class, 'edit'])->name('edit');
        // Route::put('/{id}', [UsuarioController::class, 'update'])->name('update');
        // Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('destroy');
    });

    // Gestión de Productos (admin y super_admin)
    Route::middleware('role:admin|super_admin')->prefix('productos')->name('productos.')->group(function () {
        // Route::get('/', [ProductoController::class, 'index'])->name('index');
        // Route::get('/crear', [ProductoController::class, 'create'])->name('create');
        // Route::post('/', [ProductoController::class, 'store'])->name('store');
        // Route::get('/{id}/editar', [ProductoController::class, 'edit'])->name('edit');
        // Route::put('/{id}', [ProductoController::class, 'update'])->name('update');
        // Route::delete('/{id}', [ProductoController::class, 'destroy'])->name('destroy');
    });

    // Gestión de Ventas (todos los roles autenticados)
    Route::prefix('ventas')->name('ventas.')->group(function () {
        // Route::get('/', [VentaController::class, 'index'])->name('index');
        // Route::get('/crear', [VentaController::class, 'create'])->name('create');
        // Route::post('/', [VentaController::class, 'store'])->name('store');
        // Route::get('/{id}', [VentaController::class, 'show'])->name('show');
    });

    // Gestión de Clientes (admin y super_admin)
    Route::middleware('role:admin|super_admin')->prefix('clientes')->name('clientes.')->group(function () {
        // Route::get('/', [ClienteController::class, 'index'])->name('index');
        // Route::get('/crear', [ClienteController::class, 'create'])->name('create');
        // Route::post('/', [ClienteController::class, 'store'])->name('store');
        // Route::get('/{id}/editar', [ClienteController::class, 'edit'])->name('edit');
        // Route::put('/{id}', [ClienteController::class, 'update'])->name('update');
        // Route::delete('/{id}', [ClienteController::class, 'destroy'])->name('destroy');
    });

    // Gestión de Inventario (admin y super_admin)
    Route::middleware('role:admin|super_admin')->prefix('inventario')->name('inventario.')->group(function () {
        // Route::get('/', [InventarioController::class, 'index'])->name('index');
        // Route::post('/ajustar', [InventarioController::class, 'ajustar'])->name('ajustar');
    });

    // Reportes (admin y super_admin)
    Route::middleware('role:admin|super_admin')->prefix('reportes')->name('reportes.')->group(function () {
        // Route::get('/ventas', [ReporteController::class, 'ventas'])->name('ventas');
        // Route::get('/inventario', [ReporteController::class, 'inventario'])->name('inventario');
        // Route::get('/clientes', [ReporteController::class, 'clientes'])->name('clientes');
    });
});

require __DIR__.'/auth.php';
