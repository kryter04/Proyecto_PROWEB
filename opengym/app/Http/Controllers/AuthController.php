<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // muestra la vista de login
    public function showLoginForm() {
        return view('autenticacion.login');
    }

    // muestra la vista de registro
    public function showRegisterForm() {
        return view('autenticacion.registro');
    }

    // procesa el inicio de sesión
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            // redirección por ROL
            if ($user->role_id == 1) return redirect()->route('admin.dashboard');
            if ($user->role_id == 2) return redirect()->route('empleado.dashboard');
            // por defecto socio
            return redirect()->route('socio.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    // procesa el registro de nuevos usuarios
    public function register(Request $request) {
        // 1. validar los datos del formulario
        // nota: 'unique:Usuario' se refiere a la tabla 'Usuario'
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Usuario', 
            'password' => 'required|string|min:8',

        ]);

        // 2. Crear el usuario en la base de datos
        $user = User::create([
            'name' => $request->nombre,
            'lastname' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->telefono,
            'role_id' => 3,
        ]);

        // 3. Iniciar sesión automáticamente y redirigir al panel de socio
        Auth::login($user);
        return redirect()->route('socio.dashboard');
    }

    // Cierra la sesión
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('inicio');
    }
}