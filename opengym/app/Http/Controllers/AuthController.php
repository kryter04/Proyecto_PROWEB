<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('autenticacion.login');
    }

    public function showRegisterForm() {
        return view('autenticacion.registro');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            // Redirección por ROL
            if ($user->role_id == 1) return redirect()->route('admin.dashboard');
            if ($user->role_id == 2) return redirect()->route('empleado.dashboard');
            return redirect()->route('socio.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    public function register(Request $request) {
        // Aquí iría la lógica de registro, creando un User nuevo con rol 3 (Socio)
        return "Funcionalidad de registro pendiente de conectar a BD";
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('inicio');
    }
}
