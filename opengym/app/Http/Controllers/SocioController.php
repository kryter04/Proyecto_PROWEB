<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocioController extends Controller
{
    public function dashboard()
    {
        $usuario = Auth::user();
        return view('paneles.socio.dashboard', compact('usuario'));
    }

    public function perfil()
    {
        $usuario = Auth::user();
        return view('paneles.socio.mi_perfil', compact('usuario'));
    }

    public function membresia()
    {
        // Aquí podrías buscar la membresía real en la BD
        return view('paneles.socio.mi_membresia');
    }
}