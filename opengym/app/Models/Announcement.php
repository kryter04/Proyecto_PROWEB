<?php

namespace App\Models;

// Importamos la clase base para modelos de Eloquent ORM
use Illuminate\Database\Eloquent\Model;

// Definimos la clase Announcement que representa los anuncios del sistema
class Announcement extends Model
{
    // Especificamos que la tabla de base de datos se llama 'Anuncio'
    protected $table = 'Anuncio';

    // Definimos los campos que pueden ser asignados masivamente
    protected $fillable = [
        'title',      // Título del anuncio
        'content',    // Contenido/descripción del anuncio
        'user_id',    // ID del usuario (empleado) que creó el anuncio
    ];
}