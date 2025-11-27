<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tablas de CACHÉ
 * Laravel utiliza estas tablas para almacenar datos en caché
 * Mejora el rendimiento guardando datos temporales
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tablas)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // =============== TABLA CACHE ===============
        // Almacena datos en caché con clave y fecha de expiración
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();                // Clave única del caché (clave primaria)
            $table->mediumText('value');                     // Valor almacenado en el caché
            $table->integer('expiration');                   // Timestamp de expiración del caché
        });

        // =============== TABLA CACHE_LOCKS ===============
        // Maneja los bloqueos de caché para evitar condiciones de carrera
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();                // Clave única del bloqueo (clave primaria)
            $table->string('owner');                         // Propietario del bloqueo
            $table->integer('expiration');                   // Timestamp de expiración del bloqueo
        });
    }

    /**
     * Revierte la migración (elimina tablas)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos ambas tablas de caché
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
