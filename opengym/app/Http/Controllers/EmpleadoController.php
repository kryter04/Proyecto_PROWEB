<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Payment;
use App\Models\Announcement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    // 1. Dashboard
    public function dashboard()
    {
        $usuario = Auth::user(); // Necesario para mostrar "Hola, [Nombre]"
        return view('paneles.empleado.dashboard', compact('usuario'));
    }

    // 2. Altas (Formulario)
    public function altas()
    {
        $planes = Plan::all(); // Necesario para llenar el select de planes
        return view('paneles.empleado.altas_socios', compact('planes'));
    }

    // 3. Guardar Socio (Lógica)
    public function storeSocio(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:Usuario,email',
            'password' => 'required|min:8',
            'telefono' => 'required',
            'plan_id' => 'required'
        ]);

        User::create([
            'name' => $request->nombre,
            'lastname' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->telefono,
            'role_id' => 3, // Rol 3 = Socio
        ]);

        return redirect()->route('empleado.altas')->with('success', 'Socio registrado correctamente.');
    }

    // 4. Pagos (Formulario)
    public function pagos()
    {
        $socios = User::where('role_id', 3)->get(); // Necesario para buscar a quién cobrarle
        return view('paneles.empleado.registrar_pagos', compact('socios'));
    }

    // 5. Guardar Pago (Lógica)
    public function storePago(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'monto' => 'required|numeric',
            'concepto' => 'required'
        ]);

        Payment::create([
            'user_id' => $request->user_id,
            'amount' => $request->monto,
            'payment_date' => now(),
            'concept' => $request->concepto 
        ]);

        return redirect()->route('empleado.pagos')->with('success', 'Pago registrado exitosamente.');
    }

    // 6. Consultar (Buscador)
    public function consultar(Request $request)
    {
        $socios = [];
        $busqueda = $request->input('busqueda');

        if($busqueda) {
            $socios = User::where('role_id', 3)
                ->where(function($query) use ($busqueda) {
                    $query->where('name', 'LIKE', "%{$busqueda}%")
                          ->orWhere('email', 'LIKE', "%{$busqueda}%");
                })->get();
        }

        return view('paneles.empleado.consultar_info', compact('socios', 'busqueda'));
    }

    // 7. Anuncios
    public function anuncios()
    {
        $anuncios = Announcement::orderBy('created_at', 'desc')->get();
        $usuario = Auth::user();
        return view('paneles.empleado.anuncios_empleado', compact('anuncios', 'usuario'));
    }

    // 8. Guardar Anuncio
    public function storeAnuncio(Request $request)
    {
        $request->validate(['titulo' => 'required', 'contenido' => 'required']);
        
        Announcement::create([
            'title' => $request->titulo,
            'content' => $request->contenido
        ]);

        return redirect()->route('empleado.anuncios')->with('success', 'Anuncio publicado.');
    }
}