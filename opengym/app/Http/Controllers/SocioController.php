<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Importante para encriptar la contraseña
use App\Models\Payment;
use App\Models\Announcement;
use App\Models\Plan;
use App\Models\Membership;
use Carbon\Carbon;

class SocioController extends Controller
{
    /**
     * Muestra el dashboard (panel principal) del Socio
     */
    public function dashboard()
    {
        $usuario = Auth::user();
        return view('paneles.socio.dashboard', compact('usuario'));
    }

    /**
     * Muestra el perfil personal del socio
     */
    public function perfil()
    {
        $usuario = Auth::user();
        return view('paneles.socio.mi_perfil', compact('usuario'));
    }

    /**
     * Actualiza el perfil personal del socio
     * Permite cambiar nombre, apellido, teléfono y contraseña
     */
    public function updatePerfil(Request $request)
    {
        $user = Auth::user();

        // Validamos los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'password' => 'nullable|min:8|confirmed', // Contraseña opcional
        ]);

        // Preparamos los datos básicos
        $data = [
            'name' => $request->nombre,
            'lastname' => $request->apellido,
            'phone' => $request->telefono,
        ];

        // Si el usuario escribió una nueva contraseña, la encriptamos y agregamos
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        /** @var \App\Models\User $user */
        $user->update($data);

        return redirect()->route('socio.perfil')->with('success', 'Información actualizada correctamente.');
    }

    /**
     * Muestra la membresía actual del socio
     */
    public function membresia()
    {
        $usuario = Auth::user();
        // Buscamos la última membresía registrada
        $membresia = Membership::where('user_id', $usuario->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
        
        $diasRestantes = 0;
        $estado = 'sin_plan';

        if ($membresia) {
            $fin = Carbon::parse($membresia->end_date);
            $hoy = Carbon::now();
            
            // Calculamos días restantes (puede ser negativo si venció)
            $diasRestantes = $hoy->diffInDays($fin, false);
            
            $estado = $diasRestantes < 0 ? 'vencido' : 'activo';
        }

        return view('paneles.socio.mi_membresia', compact('usuario', 'membresia', 'diasRestantes', 'estado'));
    }

    /**
     * Muestra todos los planes disponibles
     */
    public function verPlanes()
    {
        $planes = Plan::all();
        return view('paneles.socio.ver_planes', compact('planes'));
    }

    /**
     * Muestra los anuncios publicados
     */
    public function anuncios() {
        $anuncios = Announcement::orderBy('created_at', 'desc')->get();
        return view('paneles.socio.anuncios', compact('anuncios'));
    }

    /**
     * Muestra el historial de pagos del socio
     */
    public function historial() {
        // CORREGIDO: Se agregó el paréntesis que faltaba en la consulta
        $pagos = Payment::where('user_id', Auth::id())
                        ->orderBy('payment_date', 'desc')
                        ->get();
                        
        return view('paneles.socio.historial_pagos', compact('pagos'));
    }
}