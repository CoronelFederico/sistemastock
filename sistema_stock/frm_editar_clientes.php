<?php 
include('controlador_clientes.php');
$id = $_REQUEST['id'];
$editar = new crud();
$fila = $editar->mostrarDatos($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>EDITAR CLIENTES</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
</head>

<body class="bg-secondary">
<nav class="navbar fixed-top navbar-dark bg-primary">
	<ul class="nav">
		<li class="nav-item">
			<!--boton de altas de libros-->
			<form action="index_clientes.php">
				<button class="btn btn-outline-light" type=submit value='Listado'>Volver</button>
			</form>
		</li>
	</ul>		
	
	<form action="index.php">
			
				<button class="btn btn-outline-light" type=submit value='Productos'>Salir</button> 
				
			
    </form>
</nav>
<div class = "container">
<br>
<br>
<br>
<div class="col-md-12">
	<form method="POST" action="actualizar_clientes.php">
		<table class = "table table-bordered">
			<tr>
				<td><label>DNI</label></td>
				<input type="hidden" name="id_cliente" value="<?php echo $fila['id_cliente']; ?>">
				<td><input type="text" name="dni_cliente" value="<?php echo $fila['dni_cliente']; ?>"></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nom_cliente" value="<?php echo $fila['nom_cliente']; ?>"></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td><input type="text" name="direccion" value="<?php echo $fila['direccion']; ?>"></td>
			</tr>
			<tr>
				<td>telefono</td>
				<td><input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>"></td>
			</tr>
			<tr>
				<td>E_mail</td>
				<td><input type="text" name="e_mail" value="<?php echo $fila['e_mail']; ?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="Guardar"></td>
			</tr>
		</table>
	</form>
</div>
</div>
</body>
</html>