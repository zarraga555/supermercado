<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $fillable = ['id','nombre', 'descripcion'];
  protected $table = 'metodo_pago';
}
