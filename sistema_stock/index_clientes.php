<?php 


include('controlador_clientes.php');

 ?>
 

<!DOCTYPE html>
<html lang="es">
<head>
	<title>CLIENTES</title>
	<meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
</head>

<body>
<nav class="navbar fixed-top navbar-dark bg-primary">
	<ul class="nav">
			
	<form action="frm_altas_clientes.php">
	  <button class="btn btn-outline-light" type=submit value='Agregar Proveedor'>Agregar Cliente</button>
	  
    </form>
		  
		  <form action="home.php">
			  <button class="btn btn-outline-light" type=submit  value='Volver'>Volver</button>
    </form>
		  </ul>	
	
	<form action="index.php">
			
				<button class="btn btn-outline-light" type=submit value='Productos'>Salir</button> 
				
			
    </form>
</nav>
<div class = "container">
<p>&lt;	<br>
</p>
<p><br>
  <br>
</p>
<div class="row align-items-start">
<table class = "table table-sm">
	<tr>
		<th>Id</td>
		<th>DNI</td>	
		<th>CLIENTE</td>
		<th>DIRECCION</td>
		<th>TELEFONO</td>
		<th>E_MAIL</td>
		<th>Editar</td>
			</tr>
	<?php 
		$obj = new crud();
		$datos = $obj->mostrarDatos(0);

		foreach ($datos as $key) {
	 ?>
	<tr>
		<td><?php echo $key['id_cliente']; ?></td>
		<td><?php echo $key['dni_cliente']; ?></td>
		<td><?php echo $key['nom_cliente']; ?></td>
		<td><?php echo $key['direccion']; ?></td>
		<td><?php echo $key['telefono']; ?></td>
		<td><?php echo $key['e_mail']; ?></td>
		<td><a href="frm_editar_clientes.php?id=<?php echo $key['id_cliente']; ?>"class="text-blue">Editar</a></td>
		
	</tr>
	<?php 
		}
	 ?>
</table></div>
<div class="row align-items-center">
</div>
<center><img src="img/logo.png" alt="logo" class="img-fluid" width="200" height="200"></center>
