@extends('backoffice.template')

@section('titulo','Crear Producto')

@section('tituloseccion','Crear Productos')

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
              	<form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" class="form-control" placeholder="Ingresar isbn" required>
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresar nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" class="form-control" placeholder="Ingresar precio" required>
                  </div>
                  <div class="form-group">
                    <label for="archivo">Archivo (pdf)</label>
                    <input type="file" name="archivo" class="form-control" placeholder="Ingresar archivo" required>
                  </div>
                  <div class="form-group">
                    <label for="imagen">Imagen (jpg, png)</label>
                    <input type="file" name="imagen" class="form-control" placeholder="Ingresar imagen" required>
                  </div>
                  <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select name="categoria_id" class="form-control" required>
                      <option value="">Seleccionar categoría</option>
                      @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="autor_id">Autor</label>
                    <select name="autor_id" class="form-control" required>
                      <option value="">Seleccionar autor</option>
                      @foreach($autores as $autor)
                        <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tipo_id">Tipo</label>
                    <select name="tipo_id" class="form-control" required>
                      <option value="">Seleccionar tipo</option>
                      @foreach($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="estado_id">Estado</label>
                    <select name="estado_id" class="form-control" required>
                      <option value="">Seleccionar estado</option>
                      @foreach($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->nombre}}</option>
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