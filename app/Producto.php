<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $fillable = ['id','nombre', 'descripcion', 'stock', 'precio', 'categoria_id'];
  protected $table = 'producto';

  public function proveedor(){
    return $this->belongsToMany('App\Proveedor')->withTimestamps();
  }
}
