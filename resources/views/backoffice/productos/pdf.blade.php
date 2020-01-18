<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Productos</title>
</head>
<body>
	<h1>Listado de Productos</h1>
	<table width="100%" border="1">
		<tbody>
			<tr>
				<th>ISBN</th>
	    		<th>Nombre</th>
	        	<th>Categoria</th>
	    		<th>Descripcion</th>
	    		<th>Precio</th>
	    		<th>Archivo</th>
	        	<th>Estado</th>
			</tr>
		</tbody>
		<thead>
			@foreach($productos as $producto)
				<tr>
					<td>{{$producto->isbn}}</td>
	                <td>{{$producto->nombre}}</td>
                    <td>{{$producto->categoria->nombre}}</td>
	               	<td>{{$producto->descripcion}}</td>
	                <td>${{number_format($producto->precio,0,',','.')}}</td>
	                <td>{{$producto->archivo}}</td>
                    <td>{{$producto->estado->nombre}}</td>
				</tr>
			@endforeach
		</thead>
	</table>
</body>
</html>