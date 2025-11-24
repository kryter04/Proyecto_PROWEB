<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan; 

class SitioController extends Controller
{
    public function inicio() {
        return view('sitio.inicio'); 
    }

    public function acerca() {
        return view('sitio.acerca');
    }

    public function planes() {
        // Aquí obtenemos los planes de la base de datos para mostrarlos
        $planes = Plan::all(); 
        return view('sitio.planes', compact('planes'));
    }

    public function contacto() {
        return view('sitio.contacto');
    }
}