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

    public function planes()
    {
        // Aquí obtenemos los planes de la base de datos para mostrarlos
        //$planes = Plan::all(); 
        //quitar el comentario si la bd esta lista
        // 2. Si no esta la conexión a BD lista, usa datos de prueba temporalmente
        $planes = [
            (object)['nombre' => 'Básico', 'precio' => 10.00],
            (object)['nombre' => 'Premium', 'precio' => 50.00],
        ];
        // 3. Pasa la variable $planes (ya definida) a la vista
        return view('sitio.planes', compact('planes'));
    }

    public function contacto() {
        return view('sitio.contacto');
    }
}