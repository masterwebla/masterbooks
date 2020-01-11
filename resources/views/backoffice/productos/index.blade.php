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
              	</div>
              	
                <table class="table table-striped">
                	<thead>
                		<th>ISBN</th>
                		<th>Nombre</th>
                		<th>Descripcion</th>
                		<th>Precio</th>
                		<th>Imagen</th>
                		<th>Archivo</th>
                		<th>Opciones</th>
                	</thead>
                	<tbody>
                		@foreach($productos as $producto)
	                		<tr @if($producto->estado_id==3) class="table-danger" @endif>
	                			<td>{{$producto->isbn}}</td>
	                			<td>{{$producto->nombre}}</td>
	                			<td>{{$producto->descripcion}}</td>
	                			<td>${{$producto->precio}}</td>
	                			<td><img src="{{ asset('imgproductos/'.$producto->imagen.'') }}" alt="" width="50"></td>
	                			<td>{{$producto->archivo}}</td>
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