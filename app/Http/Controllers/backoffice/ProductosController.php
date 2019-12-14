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
        
        //Validar los campos
        $request->validate([
            'isbn'=>'required|max:100',
            'nombre'=>'required|max:100',
            'precio'=>'required|numeric',
            'imagen' => 'required|mimes:jpeg,jpg,png',
            'archivo' => 'mimes:pdf|max:10000',
            'categoria_id' => 'required',
            'autor_id' => 'required',
            'tipo_id' => 'required',
            'estado_id' => 'required'
        ]);

        //Subir la imagen al servidor
        $nombreimg = "";
        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $ruta = public_path().'/imgproductos';
            $nombreimg = uniqid()."-".$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombreimg);
        }

        //Subir el pdf al servidor
        $nombrepdf = "";
        if($request->file('archivo')){
            $archivo = $request->file('archivo');
            $ruta = public_path().'/libros';
            $nombrepdf = uniqid()."-".$archivo->getClientOriginalName();
            $archivo->move($ruta,$nombrepdf);
        }

        //Insertarlos en la base de datos
        $producto = Producto::create([
            'isbn'=>$request->isbn,
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'imagen'=>$nombreimg,
            'archivo'=>$nombrepdf,
            'categoria_id'=>$request->categoria_id,
            'autor_id'=>$request->autor_id,
            'tipo_id'=>$request->tipo_id,
            'estado_id'=>$request->estado_id
        ]);

        return redirect()->route('productos.index');

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
