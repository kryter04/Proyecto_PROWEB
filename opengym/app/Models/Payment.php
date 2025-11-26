<?php

namespace App\Models;

// Importamos la clase base para modelos de Eloquent ORM
use Illuminate\Database\Eloquent\Model;

// Definimos la clase Payment que representa los pagos realizados por los usuarios
class Payment extends Model
{
   // Especificamos que la tabla de base de datos se llama 'Pago'
   protected $table = 'Pago'; 

   // Definimos los campos que pueden ser asignados masivamente
   protected $fillable = [
       'user_id',          // ID del usuario que realizó el pago
       'amount',           // Monto pagado
       'payment_date',     // Fecha del pago
       'payment_method',   // Método de pago (tarjeta, transferencia, efectivo, etc)
       'concept'           // Concepto del pago (membresía, renovación, etc)
   ];
}