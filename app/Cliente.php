<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $fillable = ['ci', 'complemento', 'nombre', 'apellido', 'telefono', 'correo', 'direccion'];
  protected $table = 'cliente';
}
