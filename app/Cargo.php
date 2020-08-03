<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
  protected $fillable = ['id','nombre', 'descripcion'];
  protected $table = 'cargo';
}
