<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear los ROLES (Agregamos created_at y updated_at)
        DB::table('rol')->insert([
            ['name' => 'admin', 'description' => 'Acceso total al sistema', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'empleado', 'description' => 'Acceso a ventas y registros', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'socio', 'description' => 'Acceso a su perfil y pagos', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Crear los PLANES (Agregamos created_at y updated_at)
        DB::table('Plan')->insert([
            [
                'name' => 'Plan Acceso',
                'price' => 299.00,
                'duration_days' => 30,
                'benefits' => 'Acceso general a máquinas y cardio, Sin instructor',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Plan Fitness',
                'price' => 499.00,
                'duration_days' => 30,
                'benefits' => 'Acceso total + Rutinas personalizadas con Entrenador',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Plan Nutri',
                'price' => 499.00,
                'duration_days' => 30,
                'benefits' => 'Acceso total + Plan de alimentación con Nutriólogo',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Plan Transformación',
                'price' => 799.00,
                'duration_days' => 30,
                'benefits' => 'Todo incluido: Entrenador + Nutriólogo + Acceso Total',
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);

        // 3. USUARIOS DE PRUEBA
        
        // Admin (Rol 1)
        DB::table('Usuario')->insert([
            'name' => 'Admin',
            'lastname' => 'Principal',
            'email' => 'admin@opengym.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Empleado (Rol 2)
        DB::table('Usuario')->insert([
            'name' => 'Staff',
            'lastname' => 'Ventas',
            'email' => 'empleado@opengym.com',
            'password' => Hash::make('empleado123'),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Socio (Rol 3)
        DB::table('Usuario')->insert([
            'name' => 'Cliente',
            'lastname' => 'Prueba',
            'email' => 'socio@opengym.com',
            'password' => Hash::make('socio123'),
            'role_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        echo "Base de datos de prueba creada con éxito.";
    }
}