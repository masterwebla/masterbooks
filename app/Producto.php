<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['isbn','nombre','descripcion','precio',
    		'archivo','imagen','categoria_id','autor_id','tipo_id','estado_id'];
}
