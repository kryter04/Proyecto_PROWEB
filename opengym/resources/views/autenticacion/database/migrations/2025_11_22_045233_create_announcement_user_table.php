<?php

// Importamos las clases necesarias para crear migraciones
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración: Crear tabla PIVOT/INTERMEDIA Usuario_has_Anuncio
 * Esta tabla crea una relación muchos-a-muchos entre Usuarios y Anuncios
 * Permite rastrear qué usuarios han leído o interactuado con qué anuncios
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración (crear tabla)
     * Se ejecuta cuando se corre: php artisan migrate
     */
    public function up(): void
    {
        // Creamos la tabla de relación 'Usuario_has_Anuncio'
        Schema::create('Usuario_has_Anuncio', function (Blueprint $table) {
            // Relación con tabla 'Usuario' - si se elimina el usuario, se eliminan sus relaciones
            $table->foreignId('user_id')->constrained('Usuario')->onDelete('cascade');
            // Relación con tabla 'Anuncio' - si se elimina el anuncio, se eliminan sus relaciones
            $table->foreignId('announcement_id')->constrained('Anuncio')->onDelete('cascade');
            // Definimos la clave primaria como compuesta de ambas claves foráneas
            $table->primary(['user_id', 'announcement_id']);
        });
    }

    /**
     * Revierte la migración (elimina tabla)
     * Se ejecuta cuando se corre: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Eliminamos la tabla 'Usuario_has_Anuncio' si existe
        Schema::dropIfExists('Usuario_has_Anuncio');
    }
};
