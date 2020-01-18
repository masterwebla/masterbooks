<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre'];

    //Relación con el modelo producto
    public function producto(){
    	return $this->hasMany('App\Producto');
    }
}
