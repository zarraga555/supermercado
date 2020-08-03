<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
  protected $fillable = ['id','nombre', 'descripcion'];
  protected $table = 'categorias';
}
