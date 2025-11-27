<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tabla de ANUNCIOS
 * Esta tabla almacena los anuncios publicados por los empleados
 * Los socios pueden ver estos anuncios en su panel
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tabla)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // Creamos la tabla 'Anuncio' con sus columnas
        Schema::create('Anuncio', function (Blueprint $table) {
            $table->id();                                    // ID auto-incrementado
            $table->string('title');                         // Título del anuncio
            $table->text('content');                         // Contenido/descripción del anuncio
            // Relación con tabla 'Usuario' - quién creó el anuncio (empleado)
            $table->foreignId('user_id')->constrained('Usuario');
            $table->timestamps();                            // Crea created_at y updated_at
        });
    }

    /**
     * Revierte la migración (elimina tabla)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos la tabla 'Anuncio' si existe
        Schema::dropIfExists('Anuncio');
    }
};
