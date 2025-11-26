<?php

namespace App\Models;

// Importamos la clase base para modelos de Eloquent ORM
use Illuminate\Database\Eloquent\Model;

// Definimos la clase Role que representa los roles de usuarios en el sistema
class Role extends Model
{
    // Especificamos que la tabla de base de datos se llama 'rol'
    // Roles del sistema: 1=Admin, 2=Empleado, 3=Socio
    protected $table = 'rol';
}
