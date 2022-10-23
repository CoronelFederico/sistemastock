<!DOCTYPE html>
<html>
<head><title>PRODUCTOS</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
<body >
<nav class="navbar fixed-top navbar-dark bg-primary">
  <ul class="nav">	
  	<form action="../home1.php">
			
				<button class="btn btn-outline-light" type=submit value='Productos'>volver</button> 
				
				
    </form>

</nav>
<?php 
require_once('../db.php');
$query = "select * from clientes";
$rs = mysqli_query($conexion, $query);
require_once "../modelo/data.php";
$d = new Data();

$ventas = $d->mostrar_ventas();


   	                  	 ?>
   	 <br>
   	 <br>
   	 <br>                 	
<div class = "container">

   	       <h1>ventas</h1>           	 
   	      <table class = "table table-sm">
   	      	<tr>
		    <center>
		    <th>CLIENTE</td>
		    <th>FECHA</td>
		    <th>TOTAL</td>
		    
		    <th>DETALLES</td>
		    
		    </center>
		   
	       </tr>
	       <tr>
<?php  

    	
		foreach ($ventas as $v) 
			
   {$valores = mysqli_fetch_array($rs) ?>
		    <td><?php if ($valores['id_cliente']= $v->id_cliente)
		    echo $valores['nom_cliente']; ?></td>
		    <td><?php echo $v->fecha; ?></td>
		    <td><?php echo $v->monto; ?></td>
		    
		    <td ><?php echo "<a href='detalles.php?id=$v->id_ventas'style='color:#FF0000;''>Ver Detalles</a>"?></td>
		    
	       </tr>
	  

      
<?php   }
?>
 
    
 </table>
  <center><img src="../img/logo.png" alt="logo"  class="img-fluid" width="200" height="200"></center>
    </div>	
   
	</ul>	
   
</body>
</html>