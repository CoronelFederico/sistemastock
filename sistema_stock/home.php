<?
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
session_start();
$_SESSION['usuario']=$usuario;

include('db.php');
include('controlador.php');
include('controlador_prov.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>SISTEMA STOCK</title>
	<meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
</head>

<body>
 <nav class="navbar navbar fixed-top bg-primary navbar-collapse" >

<ul class="nav" >
		
		<p>&nbsp;</p>	
	<form action="index_prod.php">
			<p>&nbsp;</p>
				<button class="btn btn-outline-light" type=submit value='Productos'>Productos</button> 
				<p>&nbsp;</p>
				
    </form>
  <p>&nbsp;</p>
  
	<form action="index_prov.php">
  <p>&nbsp;</p>
	  <button class="btn btn-outline-light" type=submit value='Proveedore'>Proveedores</button> 
		<p>&nbsp;</p>		 
				
	  </form>
	  <p>&nbsp;</p>
	<form action="home1.php"> 
  <p>&nbsp;</p>
	  <button class="btn btn-outline-light" type=submit  value='Ventas'>Ventas</button> 
				<p>&nbsp;</p>
	  </form>
	<p>&nbsp;</p>	
	<form action="index_clientes.php">
			<p>&nbsp;</p>
				<button class="btn btn-outline-light" type=submit value='Clientes'>Clientes</button> 
				<p>&nbsp;</p>
				
    </form>
    
  <p>&nbsp;</p>

<form action="index.php">
			<p>&nbsp;</p>
				<button class="btn btn-outline-light" type=submit value='Productos'>Salir</button> 
				
			<p>&nbsp;</p>	
    </form>	

     
    	
    	</ul><img src="img/logo.png" alt="logo" class="img-fluid"  width="200" height="200" align="right">

</nav>
	

	
</html>












