<?php 
include('controlador.php');
  include('db.php');
$sql = "SELECT * FROM proveedores";
	                   $rs = mysqli_query($conexion, $sql);
	                  
                   				


?>




<!DOCTYPE html>
<html>
<head>
	<title>NUEVO PRODUCTO</title>
	<meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
</head>
<body>
<nav class="navbar fixed-top navbar-dark bg-primary">
  <ul class="nav">
	<form action="index_prod.php">
	    <button class="btn btn-outline-light" type=submit value='Volver'>Volver</button>
  </form>
  
  <form action="index.php">
			
				<button class="btn btn-outline-light" type=submit value='Productos'>Salir</button> 
				
			
    </form>
</nav>
<div class = "container">
<br>
<br>
<br>
<div class="col-md-12"> 
	<form method="POST" action="insertar.php"  >
		<table class = "table table-bordered">
			<tr>
				<td><label>Nombre</label></td>
				<td><input type="text" name="nom_producto"></td>
			</tr>
			<tr>
				<td><label>Precio_compra</label></td>
				<td><input type="text" id="precio_compra" name="precio_compra" onblur="calcularprecio()"></td>
			</tr>
			<tr>
				<td><label>Precio con IVA</label></td>
				<td><input type="text" id="precio_producto" name="precio_producto" ></td>
			</tr>
			<tr>
				<td><label>Stock</label></td>
				<td><input type="text" name="stock_producto"></td>
			</tr>
			<tr>
				<td><label>Proveedor</label></td>
				<?php //<td><input type="text" name="id_proveedor"></td>
				?>
				<td><select name = "id_proveedor"><option value="0">Seleccione</option>
				<?php  while ($valores = mysqli_fetch_array($rs)) {?>
					<option value="<?php echo $valores['id_proveedor']?>"><?php echo $valores['nom_proveedor']?></option>	   
						   
					<?php   } ?>
                        
					</select></tr>
			<tr>
				<td><input type="submit" name="Guardar" value="Guardar"></td>
			</tr>
		</table>
	</form>
</div>
<center><img src="img/logo.png" alt="logo" class="img-fluid" width="200" height="200"></center>

</div>

</head>


</body>
<script>
	function calcularprecio()
	{ var v=parseInt(document.getElementById("precio_compra").value);

          document.getElementById("precio_producto").value=v+(v*21/100);
      

	}


</script>
</html>