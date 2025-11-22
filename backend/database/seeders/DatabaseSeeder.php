<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // 1. Crear los ROLES
        DB::table('rol')->insert([
            ['name' => 'admin', 'description' => 'Acceso total al sistema'],
            ['name' => 'empleado', 'description' => 'Acceso a ventas y registros'],
            ['name' => 'socio', 'description' => 'Acceso a su perfil y pagos'],
        ]);

        // 2. Crear los PLANES
        DB::table('Plan')->insert([
[
                // EL NORMAL
                'name' => 'Plan Acceso',
                'price' => 299.00,
                'duration_days' => 30,
                'benefits' => 'Acceso general a máquinas y cardio, Sin instructor'
            ],
            [
                // CON ENTRENADOR
                'name' => 'Plan Fitness',
                'price' => 499.00,
                'duration_days' => 30,
                'benefits' => 'Acceso total + Rutinas personalizadas con Entrenador'
            ],
            [
                // CON NUTRIÓLOGO (Vale lo mismo que el de entrenador)
                'name' => 'Plan Nutri',
                'price' => 499.00,
                'duration_days' => 30,
                'benefits' => 'Acceso total + Plan de alimentación con Nutriólogo'
            ],
            [
                // CON LOS DOS (EL VIP)
                'name' => 'Plan Transformación',
                'price' => 799.00, // Un poco menos que la suma de los dos para que convenga
                'duration_days' => 30,
                'benefits' => 'Todo incluido: Entrenador + Nutriólogo + Acceso Total'
            ],
        ]);

                 // 3. USUARIOS DE PRUEBA
        
        // Admin
        DB::table('Usuario')->insert([
            'name' => 'Admin',
            'lastname' => 'Principal',
            'email' => 'admin@opengym.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Empleado
        DB::table('Usuario')->insert([
            'name' => 'Staff',
            'lastname' => 'Ventas',
            'email' => 'empleado@opengym.com',
            'password' => Hash::make('empleado123'),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Socio (Le ponemos el Plan Transformación de ejemplo)
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
