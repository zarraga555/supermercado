<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
  protected $fillable = ['ci', 'complemento', 'nombre', 'apellido', 'telefono', 'correo', 'direccion', 'sexo', 'salario', 'cargo_id'];
  protected $table = 'empleado';
}
