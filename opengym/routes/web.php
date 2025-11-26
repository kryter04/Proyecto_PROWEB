<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SocioController;

// ==========================================
// PÁGINAS PÚBLICAS (Acceso libre)
// ==========================================
Route::get('/', [SitioController::class, 'inicio'])->name('inicio');
Route::get('/acerca', [SitioController::class, 'acerca'])->name('acerca');
Route::get('/planes', [SitioController::class, 'planes'])->name('planes');
Route::get('/contacto', [SitioController::class, 'contacto'])->name('contacto');

// ==========================================
// AUTENTICACIÓN (Login, Registro, Logout)
// ==========================================
Route::get('/iniciar-sesion', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/iniciar-sesion', [AuthController::class, 'login']);
Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/cerrar-sesion', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// PANELES PRIVADOS (Requieren Login)
// ==========================================
Route::middleware('auth')->group(function () {

    // --------------------------------------
    // 1. ADMIN (Rol 1)
    // --------------------------------------
    Route::prefix('admin')->group(function () {
        // Vistas principales
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/reportes', [AdminController::class, 'reportes'])->name('admin.reportes');
        
        // --- GESTIÓN DE SOCIOS ---
        Route::get('/socios', [AdminController::class, 'socios'])->name('admin.socios');
        Route::get('/socios/crear', [AdminController::class, 'createSocio'])->name('admin.socios.create');
        Route::post('/socios', [AdminController::class, 'storeSocio'])->name('admin.socios.store');
        Route::get('/socios/{id}/editar', [AdminController::class, 'editSocio'])->name('admin.socios.edit');
        Route::put('/socios/{id}', [AdminController::class, 'updateSocio'])->name('admin.socios.update');
        Route::delete('/socios/{id}', [AdminController::class, 'destroySocio'])->name('admin.socios.destroy');

        // --- GESTIÓN DE EMPLEADOS ---
        Route::get('/empleados', [AdminController::class, 'empleados'])->name('admin.empleados');
        Route::get('/empleados/crear', [AdminController::class, 'createEmpleado'])->name('admin.empleados.create');
        Route::post('/empleados', [AdminController::class, 'storeEmpleado'])->name('admin.empleados.store');
        Route::get('/empleados/{id}/editar', [AdminController::class, 'editEmpleado'])->name('admin.empleados.edit');
        Route::put('/empleados/{id}', [AdminController::class, 'updateEmpleado'])->name('admin.empleados.update');
        Route::delete('/empleados/{id}', [AdminController::class, 'destroyEmpleado'])->name('admin.empleados.destroy');

        // --- GESTIÓN DE PLANES ---
        Route::get('/planes', [AdminController::class, 'planes'])->name('admin.planes');
        Route::get('/planes/crear', [AdminController::class, 'createPlan'])->name('admin.planes.create');
        Route::post('/planes', [AdminController::class, 'storePlan'])->name('admin.planes.store');
        Route::get('/planes/{id}/editar', [AdminController::class, 'editPlan'])->name('admin.planes.edit');
        Route::put('/planes/{id}', [AdminController::class, 'updatePlan'])->name('admin.planes.update');
        Route::delete('/planes/{id}', [AdminController::class, 'destroyPlan'])->name('admin.planes.destroy');
    });

    // --------------------------------------
    // 2. EMPLEADO (Rol 2)
    // --------------------------------------
    Route::prefix('empleado')->group(function () {
        // Vistas principales
        Route::get('/dashboard', [EmpleadoController::class, 'dashboard'])->name('empleado.dashboard');
        Route::get('/pagos', [EmpleadoController::class, 'pagos'])->name('empleado.pagos'); // Recibe ?user_id opcional
        Route::get('/altas', [EmpleadoController::class, 'altas'])->name('empleado.altas');
        Route::get('/consultar', [EmpleadoController::class, 'consultar'])->name('empleado.consultar');
        
        // Anuncios (Ver, Crear y Eliminar)
        Route::get('/anuncios', [EmpleadoController::class, 'anuncios'])->name('empleado.anuncios');
        Route::post('/store-anuncio', [EmpleadoController::class, 'storeAnuncio'])->name('empleado.store_anuncio');
        Route::delete('/anuncios/{id}', [EmpleadoController::class, 'destroyAnuncio'])->name('empleado.anuncios.destroy');

        // Procesar Formularios (POST)
        Route::post('/store-socio', [EmpleadoController::class, 'storeSocio'])->name('empleado.store_socio');
        Route::post('/store-pago', [EmpleadoController::class, 'storePago'])->name('empleado.store_pago');
        
        // Gestión Membresía (Editar/Renovar)
        Route::get('/membresia/{user_id}/editar', [EmpleadoController::class, 'editMembresia'])->name('empleado.membresia.edit');
        Route::put('/membresia/{user_id}', [EmpleadoController::class, 'updateMembresia'])->name('empleado.membresia.update');
    });

    // --------------------------------------
    // 3. SOCIO (Rol 3)
    // --------------------------------------
    Route::prefix('socio')->group(function () {
        // Dashboard principal
        Route::get('/dashboard', [SocioController::class, 'dashboard'])->name('socio.dashboard');
        
        // Perfil (Ver y Editar)
        Route::get('/perfil', [SocioController::class, 'perfil'])->name('socio.perfil');
        Route::put('/perfil', [SocioController::class, 'updatePerfil'])->name('socio.perfil.update');

        // Secciones informativas
        Route::get('/membresia', [SocioController::class, 'membresia'])->name('socio.membresia');
        Route::get('/ver-planes', [SocioController::class, 'verPlanes'])->name('socio.ver_planes');
        Route::get('/anuncios', [SocioController::class, 'anuncios'])->name('socio.anuncios');
        Route::get('/historial', [SocioController::class, 'historial'])->name('socio.historial');
    });

});