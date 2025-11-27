<?php

// Namespace de la factory
namespace Database\Factories;

// Importamos la clase base de Factory
use Illuminate\Database\Eloquent\Factories\Factory;
// Importamos la clase Hash para encriptar contraseñas
use Illuminate\Support\Facades\Hash;
// Importamos Str para generar strings aleatorios
use Illuminate\Support\Str;

/**
 * Factory UserFactory para generar datos ficticios de usuarios
 * Se utiliza para pruebas y desarrollo
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Variable estática para almacenar la contraseña
     * Se reutiliza para no generar múltiples contraseñas
     */
    protected static ?string $password;

    /**
     * Método: definition()
     * Define el estado por defecto de un usuario generado
     * Retorna un array con los datos del usuario
     * 
     * @return array<string, mixed> Array con los atributos del usuario
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),                                              // Nombre falso usando Faker
            'email' => fake()->unique()->safeEmail(),                              // Email único y válido
            'email_verified_at' => now(),                                          // Marca el email como verificado
            'password' => static::$password ??= Hash::make('password'),           // Contraseña encriptada (reutiliza si existe)
            'remember_token' => Str::random(10),                                   // Token aleatorio para "Recuérdame"
        ];
    }

    /**
     * Método: unverified()
     * Crea un usuario con el email no verificado
     * Anula el timestamp email_verified_at
     * 
     * @return static Retorna la instancia de factory con estado modificado
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,                                           // Establece email_verified_at como null
        ]);
    }
}
