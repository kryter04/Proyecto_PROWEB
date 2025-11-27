<?php

// Namespace del Seeder
namespace Database\Seeders;

// Importamos la clase base Seeder
use Illuminate\Database\Seeder;
// Importamos DB para ejecutar queries directas
use Illuminate\Support\Facades\DB;
// Importamos Hash para encriptar contraseñas
use Illuminate\Support\Facades\Hash;

/**
 * DatabaseSeeder: Poblador de datos iniciales
 * Este seeder inserta datos de prueba y configuración inicial en la base de datos
 * Crea: 3 roles, 4 planes de membresía, y 3 usuarios de prueba (uno por rol)
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Método: run()
     * Se ejecuta cuando se corre: php artisan db:seed
     * Inserta todos los datos de prueba en la base de datos
     */
    public function run(): void
    {
        // =============== PARTE 1: CREAR ROLES ===============
        // Insertamos 3 roles principales del sistema con descripción y timestamps
        DB::table('rol')->insert([
            // Rol de Administrador - acceso total
            [
                'name' => 'admin',
                'description' => 'Acceso total al sistema',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Rol de Empleado - acceso a ventas y registros
            [
                'name' => 'empleado',
                'description' => 'Acceso a ventas y registros',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Rol de Socio/Miembro - acceso limitado a su perfil
            [
                'name' => 'socio',
                'description' => 'Acceso a su perfil y pagos',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // =============== PARTE 2: CREAR PLANES DE MEMBRESÍA ===============
        // Insertamos 4 planes diferentes con precios y beneficios
        DB::table('Plan')->insert([
            // Plan 1: Plan Acceso - Básico
            [
                'name' => 'Plan Acceso',
                'price' => 299.00,
                'duration_days' => 30,
                'benefits' => 'Acceso general a máquinas y cardio, Sin instructor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Plan 2: Plan Fitness - Con entrenador
            [
                'name' => 'Plan Fitness',
                'price' => 499.00,
                'duration_days' => 30,
                'benefits' => 'Acceso total + Rutinas personalizadas con Entrenador',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Plan 3: Plan Nutri - Con nutriólogo
            [
                'name' => 'Plan Nutri',
                'price' => 499.00,
                'duration_days' => 30,
                'benefits' => 'Acceso total + Plan de alimentación con Nutriólogo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Plan 4: Plan Transformación - Paquete completo (más caro)
            [
                'name' => 'Plan Transformación',
                'price' => 799.00,
                'duration_days' => 30,
                'benefits' => 'Todo incluido: Entrenador + Nutriólogo + Acceso Total',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // =============== PARTE 3: CREAR USUARIOS DE PRUEBA ===============
        
        // Usuario 1: Administrador (rol_id = 1)
        DB::table('Usuario')->insert([
            'name' => 'Admin',                                                      // Nombre del usuario
            'lastname' => 'Principal',                                              // Apellido del usuario
            'email' => 'admin@opengym.com',                                         // Email único
            'password' => Hash::make('admin123'),                                   // Contraseña encriptada
            'role_id' => 1,                                                         // Rol: Admin (1)
            'created_at' => now(),                                                  // Fecha de creación
            'updated_at' => now(),                                                  // Fecha de actualización
        ]);

        // Usuario 2: Empleado (rol_id = 2)
        DB::table('Usuario')->insert([
            'name' => 'Staff',                                                      // Nombre del usuario
            'lastname' => 'Ventas',                                                 // Apellido del usuario
            'email' => 'empleado@opengym.com',                                      // Email único
            'password' => Hash::make('empleado123'),                                // Contraseña encriptada
            'role_id' => 2,                                                         // Rol: Empleado (2)
            'created_at' => now(),                                                  // Fecha de creación
            'updated_at' => now(),                                                  // Fecha de actualización
        ]);

        // Usuario 3: Socio/Miembro (rol_id = 3)
        DB::table('Usuario')->insert([
            'name' => 'Cliente',                                                    // Nombre del usuario
            'lastname' => 'Prueba',                                                 // Apellido del usuario
            'email' => 'socio@opengym.com',                                         // Email único
            'password' => Hash::make('socio123'),                                   // Contraseña encriptada
            'role_id' => 3,                                                         // Rol: Socio (3)
            'created_at' => now(),                                                  // Fecha de creación
            'updated_at' => now(),                                                  // Fecha de actualización
        ]);

        // Mensaje de confirmación
        echo "Base de datos de prueba creada con éxito.";
    }
}