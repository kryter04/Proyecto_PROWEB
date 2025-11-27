<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tablas de TRABAJOS EN COLA (Queue/Jobs)
 * Laravel utiliza estas tablas para procesar tareas asincrónicas
 * Ejemplo: Enviar emails, procesar datos pesados, etc.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tablas)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // =============== TABLA JOBS ===============
        // Almacena los trabajos/tareas pendientes de procesar
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            $table->string('queue')->index();               // Nombre de la cola (general, email, etc)
            $table->longText('payload');                    // Datos del trabajo (serializado)
            $table->unsignedTinyInteger('attempts');        // Número de intentos de ejecución
            $table->unsignedInteger('reserved_at')->nullable(); // Timestamp de reserva del trabajo
            $table->unsignedInteger('available_at');        // Timestamp cuando está disponible para procesar
            $table->unsignedInteger('created_at');          // Timestamp de creación del trabajo
        });

        // =============== TABLA JOB_BATCHES ===============
        // Agrupa múltiples trabajos relacionados en lotes
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();                // ID único del lote
            $table->string('name');                         // Nombre del lote
            $table->integer('total_jobs');                  // Total de trabajos en el lote
            $table->integer('pending_jobs');                // Trabajos pendientes
            $table->integer('failed_jobs');                 // Trabajos fallidos
            $table->longText('failed_job_ids');             // IDs de los trabajos que fallaron
            $table->mediumText('options')->nullable();      // Opciones adicionales
            $table->integer('cancelled_at')->nullable();    // Timestamp si el lote fue cancelado
            $table->integer('created_at');                  // Timestamp de creación del lote
            $table->integer('finished_at')->nullable();     // Timestamp de finalización del lote
        });

        // =============== TABLA FAILED_JOBS ===============
        // Registra los trabajos que fallaron después de todos los intentos
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            $table->string('uuid')->unique();               // UUID único del trabajo fallido
            $table->text('connection');                      // Tipo de conexión (database, redis, etc)
            $table->text('queue');                           // Nombre de la cola
            $table->longText('payload');                    // Datos del trabajo (serializado)
            $table->longText('exception');                  // Mensaje de error/excepción
            $table->timestamp('failed_at')->useCurrent();   // Timestamp de cuando falló
        });
    }

    /**
     * Revierte la migración (elimina tablas)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos todas las tablas de trabajos
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
