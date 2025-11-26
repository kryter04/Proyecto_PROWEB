<?php

namespace App\Models;

// Importamos la clase base para modelos de Eloquent ORM
use Illuminate\Database\Eloquent\Model;

// Definimos la clase Membership que representa las membresías de los usuarios
class Membership extends Model
{
    // Especificamos que la tabla de base de datos se llama 'Membresia'
    protected $table = 'Membresia';

    // Definimos los campos que pueden ser asignados masivamente
    protected $fillable = [
        'user_id',     // ID del usuario propietario de la membresía
        'plan_id',     // ID del plan contratado
        'start_date',  // Fecha de inicio de la membresía
        'end_date',    // Fecha de vencimiento de la membresía
        'status'       // Estado de la membresía (activa, inactiva, cancelada)
    ];

    /**
     * Define la relación con la tabla de Planes
     * Una membresía pertenece a un plan
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}