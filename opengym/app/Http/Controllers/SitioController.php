<?php

namespace App\Http\Controllers;

// Importamos clases necesarias
use Illuminate\Http\Request;      // Para manejar requests
use App\Models\Plan;              // Modelo de Planes

// Controlador encargado de las páginas públicas del sitio
class SitioController extends Controller
{
    /**
     * Muestra la página de inicio del sitio
     * @return vista de inicio
     */
    public function inicio() {
        return view('sitio.inicio'); 
    }

    /**
     * Muestra la página de información acerca de la empresa/gimnasio
     * @return vista de acerca
     */
    public function acerca() {
        return view('sitio.acerca');
    }

    /**
     * Muestra los planes disponibles para que los usuarios puedan verlos
     * Opcionalmente puede obtener planes de la BD o usar datos de prueba
     * @return vista de planes
     */
    public function planes()
    {
        // OPCIÓN 1: Obtener planes de la base de datos (una vez esté completa la BD)
        //$planes = Plan::all(); 
        
        // OPCIÓN 2: Datos de prueba temporales mientras se configura la BD
        $planes = [
            // Planes con objeto stdClass para simular datos de BD
            (object)['nombre' => 'Básico', 'precio' => 10.00],
            (object)['nombre' => 'Premium', 'precio' => 50.00],
        ];
        
        // Pasamos la variable $planes a la vista mediante compact()
        return view('sitio.planes', compact('planes'));
    }

    /**
     * Muestra la página de contacto
     * @return vista de contacto
     */
    public function contacto() {
        return view('sitio.contacto');
    }
}