<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tabla de MEMBRESÍAS
 * Esta tabla registra las membresías activas de cada usuario
 * Conecta usuarios con planes y control de fechas de vigencia
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tabla)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // Creamos la tabla 'Membresia' con sus columnas
        Schema::create('Membresia', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            // Relación con tabla 'Usuario' - si se elimina el usuario, se elimina su membresía
            $table->foreignId('user_id')->constrained('Usuario')->onDelete('cascade');
            // Relación con tabla 'Plan' - si se elimina el plan, se elimina la membresía
            $table->foreignId('plan_id')->constrained('Plan')->onDelete('cascade');
            $table->date('start_date');                      // Fecha de inicio de la membresía
            $table->date('end_date');                        // Fecha de vencimiento de la membresía
            // Estado de la membresía: activa, expirada o cancelada
            $table->enum('status', ['active', 'expired', 'cancelled'])->default('active');
            $table->timestamps();                            // Crea created_at y updated_at
        });
    }

    /**
     * Revierte la migración (elimina tabla)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos la tabla 'Membresia' si existe
        Schema::dropIfExists('Membresia');
    }
};
