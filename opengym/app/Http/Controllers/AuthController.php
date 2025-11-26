<?php

namespace App\Http\Controllers;

// Importamos clases necesarias para manejo de requests y autenticación
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;      // Para manejo de sesiones de usuario
use App\Models\User;                        // Modelo de Usuario
use Illuminate\Support\Facades\Hash;      // Para encriptar contraseñas

// Controlador encargado de la autenticación (login, registro, logout)
class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión
     * @return vista de login
     */
    public function showLoginForm() {
        return view('autenticacion.login');
    }

    /**
     * Muestra el formulario de registro para nuevos usuarios
     * @return vista de registro
     */
    public function showRegisterForm() {
        return view('autenticacion.registro');
    }

    /**
     * Procesa el inicio de sesión del usuario
     * Valida credenciales y redirige según el rol del usuario
     */
    public function login(Request $request) {
        // Validamos que se envíen email y contraseña
        $credentials = $request->validate([
            'email' => ['required', 'email'],           // Email requerido y válido
            'password' => ['required'],                 // Contraseña requerida
        ]);

        // Intentamos autenticar el usuario con las credenciales proporcionadas
        if (Auth::attempt($credentials)) {
            // Regeneramos la sesión por seguridad después de login exitoso
            $request->session()->regenerate();
            // Obtenemos el usuario autenticado
            $user = Auth::user();
            
            // Redirigimos según el rol del usuario
            if ($user->role_id == 1) return redirect()->route('admin.dashboard');        // Admin
            if ($user->role_id == 2) return redirect()->route('empleado.dashboard');    // Empleado
            // Por defecto, redirigimos a Socio si no es Admin ni Empleado
            return redirect()->route('socio.dashboard');
        }

        // Si las credenciales son incorrectas, retornamos al formulario con el error
        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    /**
     * Procesa el registro de nuevos usuarios
     * Valida datos, crea el usuario y lo redirige al panel de socio
     */
    public function register(Request $request) {
        // PASO 1: Validamos todos los datos del formulario de registro
        // Nota: 'unique:Usuario' valida que el email no exista en la tabla 'Usuario'
        $request->validate([
            'nombre' => 'required|string|max:255',                              // Nombre requerido
            'apellido' => 'required|string|max:255',                            // Apellido requerido
            'email' => 'required|string|email|max:255|unique:Usuario',          // Email único y válido
            'password' => 'required|string|min:8',                              // Contraseña de mínimo 8 caracteres
        ]);

        // PASO 2: Creamos el nuevo usuario en la base de datos
        $user = User::create([
            'name' => $request->nombre,
            'lastname' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Encriptamos la contraseña
            'phone' => $request->telefono,
            'role_id' => 3,                                // Le asignamos rol 3 (Socio)
        ]);

        // PASO 3: Iniciamos sesión automáticamente y redirigimos al panel de socio
        Auth::login($user);
        return redirect()->route('socio.dashboard');
    }

    /**
     * Cierra la sesión del usuario actual
     * Invalida la sesión y regenera el token CSRF
     */
    public function logout(Request $request) {
        // Cerramos la sesión del usuario
        Auth::logout();
        // Invalidamos la sesión actual
        $request->session()->invalidate();
        // Regeneramos el token CSRF por seguridad
        $request->session()->regenerateToken();
        // Redirigimos a la página de inicio
        return redirect()->route('inicio');
    }
}