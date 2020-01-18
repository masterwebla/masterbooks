<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Producto creado</title>
</head>
<body>
	<h1>Nuevo producto Creado</h1>
	<p>Se ha creado un nuevo libro y los datos son:</p>
	<p>Nombre: {{$nombre}}</p>
	<p>Precio: ${{number_format($precio,0,',','.')}}</p>
</body>
</html>