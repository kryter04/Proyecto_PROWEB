<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tabla de PAGOS
 * Esta tabla registra todos los pagos realizados por los usuarios
 * Incluye información del monto, método y concepto del pago
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tabla)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // Creamos la tabla 'Pago' con sus columnas
        Schema::create('Pago', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            // Relación con tabla 'Usuario' - si se elimina el usuario, se eliminan sus pagos
            $table->foreignId('user_id')->constrained('Usuario')->onDelete('cascade');
            $table->decimal('amount', 8, 2);                // Monto pagado (8 dígitos, 2 decimales)
            $table->date('payment_date');                    // Fecha en que se realizó el pago
            $table->string('payment_method');                // Método de pago (tarjeta, efectivo, transferencia, etc)
            $table->string('concept')->nullable();           // Concepto del pago (membresía, renovación, etc)
            $table->timestamps();                            // Crea created_at y updated_at
        });
    }

    /**
     * Revierte la migración (elimina tabla)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos la tabla 'Pago' si existe
        Schema::dropIfExists('Pago');
    }
};
