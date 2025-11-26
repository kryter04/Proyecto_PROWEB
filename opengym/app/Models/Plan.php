<?php

namespace App\Models;

// Importamos la clase base para modelos de Eloquent ORM
use Illuminate\Database\Eloquent\Model;

// Definimos la clase Plan que representa los planes de membresía disponibles
class Plan extends Model
{
    // Especificamos que la tabla de base de datos se llama 'Plan'
    protected $table = 'Plan';
    
    // Definimos los campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',           // Nombre del plan (ej: Plan básico, Plan premium)
        'price',          // Precio mensual del plan
        'duration_days',  // Duración del plan en días
        'benefits'        // Beneficios incluidos en el plan (descripción)
    ];
}