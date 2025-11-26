<?php

namespace App\Http\Controllers;

// Importamos clases necesarias para el controlador del Admin
use Illuminate\Http\Request;              // Para manejar requests
use App\Models\User;                       // Modelo de Usuario
use App\Models\Plan;                       // Modelo de Planes
use App\Models\Payment;                    // Modelo de Pagos
use Illuminate\Support\Facades\Hash;      // Para encriptar contraseñas

// Controlador encargado de todas las operaciones del ADMIN
// Gestiona: Socios, Empleados, Planes y Reportes
class AdminController extends Controller
{
    /**
     * Muestra el dashboard (panel principal) del Admin
     * @return vista del dashboard
     */
    public function dashboard() {
        return view('paneles.admin.dashboard');
    }

    /**
     * Muestra reportes y estadísticas del gimnasio
     * Calcula: Total de socios, Total de empleados, Ingresos totales
     * @return vista de reportes
     */
    public function reportes() {
        // Contamos usuarios con role_id = 3 (Socios)
        $totalSocios = User::where('role_id', 3)->count();
        // Contamos usuarios con role_id = 2 (Empleados)
        $totalEmpleados = User::where('role_id', 2)->count();
        // Sumamos todos los pagos registrados en el sistema
        $ingresos = Payment::sum('amount'); 
        // Pasamos los datos a la vista
        return view('paneles.admin.reportes', compact('totalSocios', 'totalEmpleados', 'ingresos'));
    }

    /**
     * Lista todos los socios registrados en el sistema
     * @return vista con listado de socios
     */
    public function socios() {
        // Obtenemos todos los usuarios con role_id = 3 (Socios)
        $socios = User::where('role_id', 3)->get();
        return view('paneles.admin.gestion_socios', compact('socios'));
    }

    /**
     * Muestra el formulario para crear un nuevo socio
     * @return vista del formulario de creación
     */
    public function createSocio() {
        return view('paneles.admin.socios.create');
    }

    /**
     * Guarda un nuevo socio en la base de datos
     * Valida datos, encripta contraseña y asigna rol de Socio
     * @param Request $request con datos del formulario
     * @return redirección a listado de socios
     */
    public function storeSocio(Request $request) {
        // Validamos todos los datos requeridos
        $request->validate([
            'name' => 'required',                           // Nombre requerido
            'lastname' => 'required',                       // Apellido requerido
            'email' => 'required|email|unique:Usuario,email', // Email único
            'password' => 'required|min:8',                 // Contraseña mínimo 8 caracteres
            'phone' => 'required'                           // Teléfono requerido
        ]);

        // Creamos el nuevo usuario con los datos validados
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),   // Encriptamos la contraseña
            'phone' => $request->phone,
            'role_id' => 3                                  // Asignamos rol 3 (Socio)
        ]);

        // Redirigimos a listado de socios con mensaje de éxito
        return redirect()->route('admin.socios')->with('success', 'Socio creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un socio existente
     * @param int $id del socio a editar
     * @return vista del formulario de edición
     */
    public function editSocio($id) {
        // Buscamos el socio por ID o lanzamos error 404
        $socio = User::findOrFail($id);
        return view('paneles.admin.socios.edit', compact('socio'));
    }

    /**
     * Actualiza los datos de un socio existente
     * @param Request $request con datos del formulario
     * @param int $id del socio a actualizar
     * @return redirección a listado de socios
     */
    public function updateSocio(Request $request, $id) {
        // Validamos los datos (la contraseña es opcional para poder actualizar sin cambiarla)
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'password' => 'nullable|min:8'                 // Opcional: solo si se envía algo
        ]);

        // Buscamos el socio a actualizar
        $socio = User::findOrFail($id);
        // Extraemos solo los campos permitidos
        $data = $request->only(['name', 'lastname', 'phone']);
        
        // Si se envió una nueva contraseña, la encriptamos y la agregamos
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Actualizamos el socio con los nuevos datos
        $socio->update($data);
        return redirect()->route('admin.socios')->with('success', 'Socio actualizado correctamente.');
    }

    /**
     * Elimina un socio del sistema
     * @param int $id del socio a eliminar
     * @return redirección a listado de socios
     */
    public function destroySocio($id) {
        // Eliminamos el usuario con el ID especificado
        User::destroy($id);
        return redirect()->route('admin.socios')->with('success', 'Socio eliminado.');
    }

    /**
     * Lista todos los empleados registrados en el sistema
     * @return vista con listado de empleados
     */
    public function empleados() {
        // Obtenemos todos los usuarios con role_id = 2 (Empleados)
        $empleados = User::where('role_id', 2)->get();
        return view('paneles.admin.gestion_empleados', compact('empleados'));
    }

    /**
     * Muestra el formulario para crear un nuevo empleado
     * @return vista del formulario de creación
     */
    public function createEmpleado() {
        return view('paneles.admin.empleados.create');
    }

    /**
     * Guarda un nuevo empleado en la base de datos
     * Valida datos, encripta contraseña y asigna rol de Empleado
     * @param Request $request con datos del formulario
     * @return redirección a listado de empleados
     */
    public function storeEmpleado(Request $request) {
        // Validamos todos los datos requeridos
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:Usuario,email',
            'password' => 'required|min:8',
            'phone' => 'required'
        ]);

        // Creamos el nuevo empleado con los datos validados
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),   // Encriptamos la contraseña
            'phone' => $request->phone,
            'role_id' => 2                                  // Asignamos rol 2 (Empleado)
        ]);

        return redirect()->route('admin.empleados')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un empleado existente
     * @param int $id del empleado a editar
     * @return vista del formulario de edición
     */
    public function editEmpleado($id) {
        // Buscamos el empleado por ID o lanzamos error 404
        $empleado = User::findOrFail($id);
        return view('paneles.admin.empleados.edit', compact('empleado'));
    }

    /**
     * Actualiza los datos de un empleado existente
     * @param Request $request con datos del formulario
     * @param int $id del empleado a actualizar
     * @return redirección a listado de empleados
     */
    public function updateEmpleado(Request $request, $id) {
        $request->validate([
            'name' => 'required', 'lastname' => 'required',
            'phone' => 'required',
            'password' => 'nullable|min:8'
        ]);

        $empleado = User::findOrFail($id);
        $data = $request->only(['name', 'lastname', 'phone']);
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $empleado->update($data);
        return redirect()->route('admin.empleados')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroyEmpleado($id) {
        User::destroy($id);
        return redirect()->route('admin.empleados')->with('success', 'Empleado eliminado.');
    }

    /**
     * Lista todos los planes de membresía disponibles
     * @return vista con listado de planes
     */
    public function planes() {
        // Obtenemos todos los planes de la base de datos
        $planes = Plan::all();
        return view('paneles.admin.gestion_planes', compact('planes'));
    }

    /**
     * Muestra el formulario para crear un nuevo plan
     * @return vista del formulario de creación
     */
    public function createPlan() {
        return view('paneles.admin.planes.create');
    }
    
    /**
     * Guarda un nuevo plan de membresía en la base de datos
     * @param Request $request con datos del formulario
     * @return redirección a listado de planes
     */
    public function storePlan(Request $request) {
        // Validamos los datos del plan
        $request->validate([
            'name' => 'required',                   // Nombre requerido
            'price' => 'required|numeric',          // Precio numérico
            'duration_days' => 'required|integer'   // Duración en días
        ]);
        // Creamos el plan con todos los datos
        Plan::create($request->all());
        return redirect()->route('admin.planes')->with('success', 'Plan creado.');
    }

    /**
     * Muestra el formulario para editar un plan existente
     * @param int $id del plan a editar
     * @return vista del formulario de edición
     */
    public function editPlan($id) {
        // Buscamos el plan por ID o lanzamos error 404
        $plan = Plan::findOrFail($id);
        return view('paneles.admin.planes.edit', compact('plan'));
    }

    /**
     * Actualiza los datos de un plan existente
     * @param Request $request con datos del formulario
     * @param int $id del plan a actualizar
     * @return redirección a listado de planes
     */
    public function updatePlan(Request $request, $id) {
        // Validamos los datos del plan
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer'
        ]);
        // Buscamos y actualizamos el plan
        $plan = Plan::findOrFail($id);
        $plan->update($request->all());
        return redirect()->route('admin.planes')->with('success', 'Plan actualizado.');
    }

    /**
     * Elimina un plan del sistema
     * @param int $id del plan a eliminar
     * @return redirección a listado de planes
     */
    public function destroyPlan($id) {
        // Eliminamos el plan con el ID especificado
        Plan::destroy($id);
        return redirect()->route('admin.planes')->with('success', 'Plan eliminado.');
    }
}