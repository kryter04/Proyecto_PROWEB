<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function dashboard()
    {
        return view('paneles.empleado.dashboard');
    }

    public function pagos()
    {
        return view('paneles.empleado.registrar_pagos');
    }

    public function altas()
    {
        return view('paneles.empleado.altas_socios');
    }
}