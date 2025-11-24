<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('paneles.admin.dashboard');
    }

    public function socios()
    {
        // Ejemplo: $socios = User::where('role_id', 3)->get();
        // return view('paneles.admin.gestion_socios', compact('socios'));
        return view('paneles.admin.gestion_socios');
    }

    public function empleados()
    {
        return view('paneles.admin.gestion_empleados');
    }

    public function planes()
    {
        return view('paneles.admin.gestion_planes');
    }

    public function reportes()
    {
        return view('paneles.admin.reportes');
    }
}