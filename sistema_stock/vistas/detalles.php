<!DOCTYPE html>
<html>
<head><title>Detalles</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
<body >
	<nav class="navbar fixed-top navbar-blue bg-primary">
  <ul class="nav">	
  	
	<form action="ventas.php">
			
				<button class="btn btn-outline-light" type=submit value='Productos'>volver</button> 
				
				
    </form>			
    
</ul>
</nav>
<?php
require_once "../modelo/data.php";

$id_venta = $_GET["id"];
$d = new Data();


$detalles = $d ->mostrar_detalles($id_venta);

	
   	                  	 ?>
   	                  	 <br>
   	                  	 <br>

   	                  	 <br>
   	       <div class = "container">
   	       <h1>Detalle de Venta ID: <?php echo $id_venta ?> </h1>           	 
   	      <table class = "table table-sm">
   	      	<tr>
		    
		    <th>ID</td>
		    <th>PRODUCTO</td>
		    <th>CANTIDAD</td>
		    <th>SUBTOTAL</td>
		    
		   
	       </tr>
	       
	      
<?php       	
        $total = 0;
		foreach ($detalles as $det) 	
           { ?>
           	<tr>
		    <td><?php echo $det->id_detalle; ?></td>
		    <td><?php echo $det->nom_producto; ?></td>
		    <td><?php echo $det->cantidad." x $".$det->precio; ?></td>
		    <td><?php echo "$".$det->subtotal; ?></td> 
		    <?php $total += $det->subtotal;?>
		    </tr>
   <?php   } ?> 
            <tr>      
		    <td colspan="3"><b>TOTAL</b></td>
		    <td><b><?php echo "$".$total; ?></b></td>
            </tr> 
	       </tr>
	   </table>
	   	
    
    </table>

</div>
<center><img src="../img/logo.png" alt="logo" class="img-fluid" width="200" height="200"></center>

</body>
</html>