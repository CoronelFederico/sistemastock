<?php 

include('controlador.php');

 ?>
 

<!DOCTYPE html>
<html>
<head>
	<title>PRODUCTOS</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="http://localhost/stock/css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar fixed-top navbar-dark bg-primary">
  <ul class="nav">
			
	<form action="frm_altas.php">
	  <button class="btn btn-outline-light" type=submit value='Agregar Producto'>Agregaar Producto</button>
	  
    </form>
		  <form action="index_prod.php">
			  <button class="btn btn-outline-light" type=submit value='Listado'>Listado</button>
			  
    </form>
		  <form action="home.php">
			  <button class="btn btn-outline-light" type=submit  value='Volver'>Volver</button>
    </form>
		  </ul>
	<form class="form-inline" action="index_prod.php" method="POST">
		<input class="form-control mr-sm-2" type="text" name="buscar" value="" placeholder="Buscar">
		<select class="form-control mr-sm-2" name="campo">
			<option value="nom_producto">Producto</option>
			<option value="precio_producto">precio</option>
			<option value="nom_proveedor">proveedor</option>
		</select>
		<input rol="button" class="form-control mr-sm-2" type="submit" value="Enviar">
		<!--<button class="btn btn-outline-light " type="submit" value='Buscar'>Buscar</button>-->
	</form>
</nav>
<div class = "container">
<br>
<br>
<br>
<br>
<br>
<table class = "table table-bordered table-hover">
	<tr>
		
		<th>PRODUCTOS</td>
		<th>PRECIO</td>
		<th>STOCK</td>
		<th>PROVEEDOR</td>
		<th>Editar</td>
		<th>Eliminar</td>
	</tr>
	<?php 
		$obj = new crud();
		$datos = $obj->mostrarDatos(0);

		foreach ($datos as $key) {
	 ?>
	<tr>
		
		<td><?php echo $key['nom_producto']; ?></td>
		<td><?php echo $key['precio_producto']; ?></td>
		<td><?php echo $key['stock_producto']; ?></td>
		<td><?php echo $key['nom_proveedor']; ?></td>
		<td><a href="frm_editar.php?id=<?php echo $key['id']; ?>">Editar</a></td>
		<td><a href="eliminar.php?id=<?php echo $key['id']; ?>">Eliminar</a></td>
	</tr>
	<?php 
		}
	 ?>
</table>
