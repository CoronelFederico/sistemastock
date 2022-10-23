<!DOCTYPE html>
<html>
<head>
	<title>AGREGAR PROVEEDORES</title>
	<meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
</head>

<body>
<nav class="navbar fixed-top navbar-dark bg-primary">
	<ul class="nav">
		<li class="nav-item">
			
			<form action="index_prov.php">
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
	<form method="POST" action="insertar_prov.php">
		<table class = "table table-bordered">
			<tr>
				<td><label>Nombre</label></td>
				<td><input type="text" name="nom_proveedor"></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td><input type="text" name="direccion"></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="e_mail"></td>
			</tr>
			<tr>
				<td>telefono</td>
				<td><input type="text" name="telefono"></td>
			</tr>
			<tr>
				<td><input name="Guardar" type="submit" value="Guardar"></td>
			</tr>
		</table>
	</form>
</div>
<center><img src="img/logo.png" alt="logo" class="img-fluid" width="200" height="200"></center>

</div>

</body>
</html>