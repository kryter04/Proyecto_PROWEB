<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SocioController;


// --- PÁGINAS PÚBLICAS ---
Route::get('/', [SitioController::class, 'inicio'])->name('inicio');
Route::get('/acerca', [SitioController::class, 'acerca'])->name('acerca');
Route::get('/planes', [SitioController::class, 'planes'])->name('planes');
Route::get('/contacto', [SitioController::class, 'contacto'])->name('contacto');

// --- AUTENTICACIÓN ---
Route::get('/iniciar-sesion', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/iniciar-sesion', [AuthController::class, 'login']);
Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('registro'); // Si tienes registro
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/cerrar-sesion', [AuthController::class, 'logout'])->name('logout');

// --- PANELES PRIVADOS (Protegidos) ---
Route::middleware('auth')->group(function () {

    // ADMIN (Rol 1)
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/socios', [AdminController::class, 'socios'])->name('admin.socios');
        Route::get('/empleados', [AdminController::class, 'empleados'])->name('admin.empleados');
        Route::get('/planes', [AdminController::class, 'planes'])->name('admin.planes');
        Route::get('/reportes', [AdminController::class, 'reportes'])->name('admin.reportes');
    });

    // EMPLEADO (Rol 2)
    Route::prefix('empleado')->group(function () {
        Route::get('/dashboard', [EmpleadoController::class, 'dashboard'])->name('empleado.dashboard');
        Route::get('/pagos', [EmpleadoController::class, 'pagos'])->name('empleado.pagos');
        Route::get('/altas', [EmpleadoController::class, 'altas'])->name('empleado.altas');
    });

    // SOCIO (Rol 3)
    Route::prefix('socio')->group(function () {
        Route::get('/dashboard', [SocioController::class, 'dashboard'])->name('socio.dashboard');
        Route::get('/perfil', [SocioController::class, 'perfil'])->name('socio.perfil');
        Route::get('/membresia', [SocioController::class, 'membresia'])->name('socio.membresia');
    });

});