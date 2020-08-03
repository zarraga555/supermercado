<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
  protected $fillable = ['id','nit', 'nombre', 'direccion', 'telefono', 'correo'];
  protected $table = 'proveedor';

  public function producto(){
    return $this->belongsToMany('App\Producto')->withTimestamps();
  }
}
