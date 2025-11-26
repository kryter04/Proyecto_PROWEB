<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// Importamos la clase para usar Factory (generador de datos de prueba)
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Importamos la clase base para autenticación de usuarios
use Illuminate\Foundation\Auth\User as Authenticatable;
// Importamos la clase para enviar notificaciones
use Illuminate\Notifications\Notifiable;

// Definimos la clase User que extiende de Authenticatable para herencia de autenticación
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // Agregamos traits para usar Factory y Notifiable en esta clase
    use HasFactory, Notifiable;

    // Especificamos que la tabla de base de datos se llama 'Usuario'
    protected $table = 'Usuario';

    /**
     * Definimos los campos que pueden ser asignados masivamente al crear/actualizar un usuario
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',       // Nombre del usuario
        'lastname',   // Apellido del usuario
        'email',      // Correo electrónico único del usuario
        'password',   // Contraseña del usuario (se guarda hasheada)
        'phone',      // Número de teléfono del usuario
        'role_id',    // ID del rol (1=Admin, 2=Empleado, 3=Socio)
    ];

    /**
     * Definimos los campos que NO se deben mostrar cuando el modelo se convierte a JSON
     * (Esto es por seguridad, para no exponer la contraseña en respuestas)
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',        // La contraseña nunca se debe enviar en respuestas
        'remember_token',  // El token de "recuérdame" tampoco se debe exponer
    ];

    /**
     * Definimos cómo deben convertirse los datos de la base de datos a tipos de datos PHP
     * (Casting automático al leer del modelo)
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convierte la fecha de verificación a objeto DateTime
            'password' => 'hashed',            // Indica que la contraseña se guarda hasheada
        ];
    }
}