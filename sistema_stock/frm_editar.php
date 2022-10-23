<?php 
include('controlador.php');
$id = $_REQUEST['id'];
$editar = new crud();
$fila = $editar->mostrarDatos($id);
 include('db.php');//<td><input type="text" name="id_proveedor"></td>
      
$sql = "SELECT * FROM proveedores";
$a=0;	                  
 $rs = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDITAR PRODUCTOS</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
</head>

<body class="bg-secondary">
<nav class="navbar fixed-top navbar-dark bg-primary"><!--boton de altas de libros-->
	<form action="index_prod.php">
	    <button class="btn btn-outline-light" type=submit value='Listado'>Listado</button>
  </form>
  
</nav>
<div class = "container">
<br>
<br>
<br>
<div class="col-md-12">
	<form method="POST" action="actualizar.php">
		<table class = "table table-bordered">
			<tr>
				<td><label>id</label></td>
				<td><input type="text" name="id" value="<?php echo $fila['id']; ?>"></td>
			</tr>

			<tr>
				<td><label>Nombre</label></td>
				<td><input type="text" name="nom_producto" value="<?php echo $fila['nom_producto']; ?>"></td>
			</tr>
			<tr>
				<td><label>Precio</label></td>
				<td><input type="text" name="precio_producto" value="<?php echo $fila['precio_producto']; ?>"></td>
			</tr>
			<tr>
				<td><label>Stock</label></td>
				<td><input type="text" name="stock_producto" value="<?php echo $fila['stock_producto']; ?>"></td>
			</tr>
			<tr>
				<td><label>Proveedor</label></td>
				
				 <td><select name = "id_proveedor">	
				 
				<?php  
				
				  while ($valores = mysqli_fetch_array($rs)) {?>
					
					  <option value="<?php echo $valores['id_proveedor']?>" <?php if($valores['id_proveedor']== $fila['id_proveedor'])
					{ echo 'selected';
					        }?>>
					        <?php echo $valores['nom_proveedor']?></option>
					<?php	}?>
						
					
                        
					</select></td>
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