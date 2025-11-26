<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Payment;
use App\Models\Announcement;
use App\Models\Membership; // Importante para gestionar membresías
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    /**
     * Muestra el panel principal del empleado.
     */
    public function dashboard() {
        $usuario = Auth::user();
        return view('paneles.empleado.dashboard', compact('usuario'));
    }

    /**
     * Muestra el formulario para dar de alta nuevos socios.
     */
    public function altas() {
        $planes = Plan::all();
        return view('paneles.empleado.altas_socios', compact('planes'));
    }

    /**
     * Muestra el formulario para registrar pagos.
     * Acepta un parámetro opcional 'user_id' para preseleccionar al socio.
     */
    public function pagos(Request $request) {
        $socios = User::where('role_id', 3)->get();
        
        // Capturamos el ID si viene en la URL (ej. tras renovar o crear socio)
        $usuarioPreseleccionado = $request->query('user_id'); 
        
        return view('paneles.empleado.registrar_pagos', compact('socios', 'usuarioPreseleccionado'));
    }

    /**
     * Buscador de socios para consultar información y gestionar membresías.
     */
    public function consultar(Request $request) {
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

    /**
     * Muestra el tablero de anuncios.
     */
    public function anuncios() {
        $anuncios = Announcement::orderBy('created_at', 'desc')->get();
        $usuario = Auth::user();
        return view('paneles.empleado.anuncios_empleado', compact('anuncios', 'usuario'));
    }
    /**
     * Registra un nuevo socio y su membresía inicial.
     * Redirige automáticamente a la caja para cobrar.
     */
    public function storeSocio(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:Usuario,email',
            'password' => 'required|min:8',
            'telefono' => 'required',
            'plan_id' => 'required|exists:Plan,id'
        ]);

        // 1. Crear el Usuario
        $user = User::create([
            'name' => $request->nombre,
            'lastname' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->telefono,
            'role_id' => 3, // Rol Socio
        ]);

        // 2. Crear la Membresía asociada
        $plan = Plan::find($request->plan_id);
        Membership::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'start_date' => now(),
            'end_date' => now()->addDays($plan->duration_days),
            'status' => 'active' // 'active' minúscula para coincidir con la BD
        ]);

        // FLUJO INTELIGENTE: Redirigir a registrar el pago inicial
        return redirect()->route('empleado.pagos', ['user_id' => $user->id])
                         ->with('success', 'Socio registrado. Por favor registra el cobro inicial.');
    }

    /**
     * Registra un pago en el sistema.
     */
    public function storePago(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'monto' => 'required|numeric',
            'metodo_pago' => 'required', // Validamos el método
            'concepto' => 'required'
        ]);

        Payment::create([
            'user_id' => $request->user_id,
            'amount' => $request->monto,
            'payment_date' => now(),
            'payment_method' => $request->metodo_pago, // Guardamos método (Efectivo/Tarjeta)
            'concept' => $request->concepto 
        ]);

        return redirect()->route('empleado.pagos')->with('success', 'Pago registrado exitosamente.');
    }

    /**
     * Publica un nuevo anuncio.
     */
    public function storeAnuncio(Request $request) {
        $request->validate(['titulo' => 'required', 'contenido' => 'required']);
        
        Announcement::create([
            'title' => $request->titulo,
            'content' => $request->contenido,
            'user_id' => Auth::id() // Se guarda con el ID del empleado que lo creó
        ]);

        return redirect()->route('empleado.anuncios')->with('success', 'Anuncio publicado.');
    }

    /**
     * Elimina un anuncio existente.
     */
    public function destroyAnuncio($id) {
        $anuncio = Announcement::findOrFail($id);
        $anuncio->delete();

        return redirect()->route('empleado.anuncios')->with('success', 'Anuncio eliminado correctamente.');
    }
    /**
     * Muestra el formulario para editar/renovar membresía de un socio específico.
     */
    public function editMembresia($user_id) {
        $socio = User::findOrFail($user_id);
        $planes = Plan::all();
        // Buscamos si ya tiene una membresía previa
        $membresia = Membership::where('user_id', $user_id)->first();
        
        return view('paneles.empleado.editar_membresia', compact('socio', 'planes', 'membresia'));
    }

    /**
     * Actualiza la membresía (Reinicia el ciclo de vigencia).
     * Redirige automáticamente a la caja para cobrar la renovación.
     */
    public function updateMembresia(Request $request, $user_id) {
        $request->validate([
            'plan_id' => 'required|exists:Plan,id'
        ]);

        $plan = Plan::find($request->plan_id);

        // Actualiza o crea si no existe
        Membership::updateOrCreate(
            ['user_id' => $user_id],
            [
                'plan_id' => $plan->id,
                'start_date' => now(), // Reinicia el ciclo hoy
                'end_date' => now()->addDays($plan->duration_days), // Suma los días del plan
                'status' => 'active' // 'active' minúscula para coincidir con la BD
            ]
        );

        // FLUJO INTELIGENTE: Redirigir a registrar el pago de la renovación
        return redirect()->route('empleado.pagos', ['user_id' => $user_id])
                         ->with('success', 'Membresía actualizada. Por favor registra el pago correspondiente.');
    }
}