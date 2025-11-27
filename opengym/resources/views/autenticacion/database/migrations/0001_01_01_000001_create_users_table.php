<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tabla de USUARIOS
 * Esta tabla almacena los datos de todos los usuarios del sistema
 * También crea las tablas de soporte: password_reset_tokens y sessions
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tablas)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // =============== TABLA USUARIO ===============
        Schema::create('Usuario', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            $table->string('name');                          // Nombre del usuario
            $table->string('lastname')->nullable();          // Apellido del usuario (opcional)
            $table->string('email')->unique();               // Email único para cada usuario
            $table->string('phone')->nullable();             // Teléfono del usuario (opcional)
            $table->timestamp('email_verified_at')->nullable(); // Fecha de verificación de email
            $table->string('password');                      // Contraseña encriptada del usuario
            // Relación con la tabla 'rol' (1 usuario tiene 1 rol)
            $table->foreignId('role_id')->nullable()->constrained('rol')->onDelete('set null');
            $table->rememberToken();                         // Token para "Recuérdame"
            $table->timestamps();                            // Crea created_at y updated_at
        });
        
        // =============== TABLA PASSWORD_RESET_TOKENS ===============
        // Almacena tokens temporales para reinicio de contraseña
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();              // Email del usuario
            $table->string('token');                         // Token temporal único
            $table->timestamp('created_at')->nullable();     // Cuándo se creó el token
        });

        // =============== TABLA SESSIONS ===============
        // Almacena información de las sesiones de usuarios autenticados
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();                 // ID de sesión único
            $table->foreignId('user_id')->nullable()->index(); // ID del usuario en sesión
            $table->string('ip_address', 45)->nullable();    // Dirección IP del usuario
            $table->text('user_agent')->nullable();          // Información del navegador/dispositivo
            $table->longText('payload');                     // Datos de la sesión
            $table->integer('last_activity')->index();       // Última actividad de la sesión
        });
    }

    /**
     * Revierte la migración (elimina tablas)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos las tablas en orden inverso
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
