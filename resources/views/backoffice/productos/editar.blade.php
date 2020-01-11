@extends('backoffice.template')

@section('titulo','Editar Producto')

@section('tituloseccion','Editar Productos')

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active">Productos</li>
@endsection

@section('contenido')
	<div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                @include('backoffice.secciones.errores')
              	<form action="{{ route('productos.update',$producto->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" class="form-control" placeholder="Ingresar isbn" required value="{{$producto->isbn}}">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresar nombre" required value="{{$producto->nombre}}">
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control">{{$producto->descripcion}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" class="form-control" placeholder="Ingresar precio" required value="{{$producto->precio}}">
                  </div>
                  <div class="form-group">
                    <label for="archivo">Archivo (pdf)</label>
                    <input type="file" name="archivo" class="form-control" placeholder="Ingresar archivo">
                  </div>
                  <div class="form-group">
                    <label for="imagen">Imagen (jpg, png)</label>
                    <input type="file" name="imagen" class="form-control" placeholder="Ingresar imagen">
                  </div>
                  <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select name="categoria_id" class="form-control" required>
                      <option value="">Seleccionar categoría</option>
                      @foreach($categorias as $categoria)
                        <option @if($producto->categoria_id==$categoria->id) selected @endif value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="autor_id">Autor</label>
                    <select name="autor_id" class="form-control" required>
                      <option value="">Seleccionar autor</option>
                      @foreach($autores as $autor)
                        <option @if($producto->autor_id==$autor->id) selected @endif value="{{$autor->id}}">{{$autor->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tipo_id">Tipo</label>
                    <select name="tipo_id" class="form-control" required>
                      <option value="">Seleccionar tipo</option>
                      @foreach($tipos as $tipo)
                        <option @if($producto->tipo_id==$tipo->id) selected @endif value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="estado_id">Estado</label>
                    <select name="estado_id" class="form-control" required>
                      <option value="">Seleccionar estado</option>
                      @foreach($estados as $estado)
                        <option @if($producto->estado_id==$estado->id) selected @endif value="{{$estado->id}}">{{$estado->nombre}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <a class="btn btn-danger" href="{{ route('productos.index') }}">Cancelar</a>
                    <button class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
                  </div>

                </form>  	

              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection