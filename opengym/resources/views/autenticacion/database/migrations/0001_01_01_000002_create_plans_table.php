<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tabla de PLANES DE MEMBRESÍA
 * Esta tabla almacena los diferentes planes de membresía disponibles en el gimnasio
 * Ejemplos: Plan Básico, Plan Premium, Plan Transformación, etc.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tabla)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // Creamos la tabla 'Plan' con sus columnas
        Schema::create('Plan', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            $table->string('name');                          // Nombre del plan (ej: Plan Básico, Premium)
            $table->decimal('price', 8, 2);                 // Precio del plan (8 dígitos, 2 decimales)
            $table->integer('duration_days');               // Duración del plan en días (ej: 30, 90)
            $table->text('benefits')->nullable();            // Descripción de beneficios incluidos (opcional)
            $table->timestamps();                            // Crea created_at y updated_at
        });
    }

    /**
     * Revierte la migración (elimina tabla)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos la tabla 'Plan' si existe
        Schema::dropIfExists('Plan');
    }
};
