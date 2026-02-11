<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Dashboard Super Admin
     */
    public function superAdmin(): Response
    {
        return Inertia::render('Dashboard/SuperAdmin');
    }

    /**
     * Dashboard Admin
     */
    public function admin(): Response
    {
        return Inertia::render('Dashboard/Admin');
    }

    /**
     * Dashboard Empleado
     */
    public function empleado(): Response
    {
        return Inertia::render('Dashboard/Empleado');
    }
}
