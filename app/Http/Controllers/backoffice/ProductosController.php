<?php

namespace App\Http\Controllers\backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Categoria;
use App\Autor;
use App\Estadoproducto;
use App\Tipo;

class ProductosController extends Controller
{
    //Listar los productos
    public function index()
    {
        $productos = Producto::all();
        return view('backoffice.productos.index',compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $autores = Autor::all();
        $tipos = Tipo::all();
        $estados = Estadoproducto::all();
        return view('backoffice.productos.crear',compact('categorias','autores','tipos','estados'));
    }

    //Función para guardar un producto
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
