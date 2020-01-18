<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['isbn','nombre','descripcion','precio',
    		'archivo','imagen','categoria_id','autor_id','tipo_id','estado_id'];

    //Relación con el modelo Estadoproducto
    public function estado(){
    	return $this->belongsTo('App\Estadoproducto');
    }

    //Relación con el modelo Categoria
    public function categoria(){
    	return $this->belongsTo('App\Categoria');
    }

    //Función scope para buscar por nombre
    public function scopeNombre($query,$nombre){
    	return $query->where('nombre','LIKE',"%$nombre%");
    }

    //Función scope para filtrar por categoria
    public function scopeCategoria($query,$categoria_id){
    	if($categoria_id)
    		return $query->where('categoria_id',$categoria_id);
    }

    //Función scope para filtrar por rango de precio
    public function scopePrecio($query,$desde,$hasta){
    	if($desde && $hasta)
    		return $query->whereBetween('precio',[$desde,$hasta]);
    	else if($desde)
    		return $query->where('precio','>=',$desde);
    	else if($hasta)
    		return $query->where('precio','<=',$hasta);
    }

}
