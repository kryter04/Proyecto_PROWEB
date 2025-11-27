<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tabla de ROLES
 * Esta tabla almacena los roles del sistema: admin, empleado, socio
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tabla)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // Creamos la tabla 'rol' con sus columnas
        Schema::create('rol', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            $table->string('name');                          // Nombre del rol (admin, socio, empleado)
            $table->string('description')->nullable();       // Descripción opcional del rol
            $table->timestamps();                            // Crea created_at y updated_at
        });
    }
    
    /**
     * Revierte la migración (elimina tabla)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos la tabla 'rol' si existe
        Schema::dropIfExists('roles');
    }
};
