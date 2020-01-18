@extends('backoffice.template')

@section('titulo','Productos')

@section('tituloseccion','Productos')

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active">Productos</li>
@endsection

@section('contenido')
	<div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              	<div class="text-right">
              		<a class="btn btn-success" href="{{ route('productos.create') }}"><i class="fas fa-plus"></i></a>
                  <!-- EXPORTAR PDF -->
                  <a class="btn btn-primary" href="{{ route('productos.pdf') }}"><i class="fas fa-file-pdf"></i></a>

                  <!-- FILTROS -->
                  <?php
                    //Definir las variables para recordar que se digito en las cajas del filtro
                    $nombre = null; $desde=null; $hasta=null; $categoria_id = null;
                    if($_GET){
                      if($_GET['nombre'])
                        $nombre = $_GET['nombre'];
                      if($_GET['desde'])
                        $desde = $_GET['desde'];
                      if($_GET['hasta'])
                        $hasta = $_GET['hasta'];
                      if($_GET['categoria_id'])
                        $categoria_id = $_GET['categoria_id'];
                    }           
                  ?>
                  <form action="{{ route('productos.index') }}" method="get" class="form-inline">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{$nombre}}">
                    <input type="number" name="desde" class="form-control" placeholder="Precio desde..." value="{{$desde}}">
                    <input type="number" name="hasta" class="form-control" placeholder="Precio hasta..." value="{{$hasta}}">
                    <select name="categoria_id" class="form-control">
                      <option value="">Seleccionar categoría</option>
                      @foreach($categorias as $categoria)
                        <option @if($categoria_id==$categoria->id) selected @endif value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                      @endforeach
                    </select>
                    <button class="btn btn-info"><i class="fas fa-search"></i></button>
                    <a class="btn btn-warning" href="{{ route('productos.index') }}"><i class="fas fa-sync"></i></a>
                  </form>
                  <!-- FIN FILTROS -->
              	</div>
              	
                <table class="table table-striped">
                	<thead>
                		<th>ISBN</th>
                		<th>Nombre</th>
                    <th>Categoria</th>
                		<th>Descripcion</th>
                		<th>Precio</th>
                		<th>Imagen</th>
                		<th>Archivo</th>
                    <th>Estado</th>
                		<th>Opciones</th>
                	</thead>
                	<tbody>
                		@foreach($productos as $producto)
	                		<tr @if($producto->estado_id==3) class="table-danger" @endif>
	                			<td>{{$producto->isbn}}</td>
	                			<td>{{$producto->nombre}}</td>
                        <td>{{$producto->categoria->nombre}}</td>
	                			<td>{{$producto->descripcion}}</td>
	                			<td>${{number_format($producto->precio,0,',','.')}}</td>
	                			<td><img src="{{ asset('imgproductos/'.$producto->imagen.'') }}" alt="" width="50"></td>
	                			<td>{{$producto->archivo}}</td>
                        <td>{{$producto->estado->nombre}}</td>
	                			<td>
                          <a class="btn btn-warning" href="{{ route('productos.edit',$producto->id) }}"><i class="fas fa-edit"></i></a>
                          @if($producto->estado_id<3)
                            <a class="btn btn-danger" href="{{ route('productos.inactivar',$producto->id) }}"><i class="fas fa-trash"></i></a>
                          @else
                            <a class="btn btn-success" href="{{ route('productos.activar',$producto->id) }}"><i class="fas fa-check"></i></a>
                          @endif

                        </td>
	                		</tr>
	                	@endforeach
                	</tbody>
                </table>             	

              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection