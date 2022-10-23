<!DOCTYPE html>
<html>
<head>
	<title>VENTAS</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/sistema_stock/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
</head> 

<body>

<nav class="navbar fixed-top navbar-dark bg-primary">
  <ul class="nav">
	<form action="home.php">
			
				<button class="btn btn-outline-light" type=submit value='Productos'>volver</button> 
				
				
    </form>




	<form action="index.php">
			
				<button class="btn btn-outline-light" type=submit value='Productos'>Salir</button> 
				
				
    </form>	
	</nav>	
	
		  
<br>
<br>		  
<br> 
<br>		  
	

<div class = "container">	

<h1>PRODUCTOS</h1>
<table class = "table table-sm" style="text-align:center;">
	<tr>
		<center>
		<th>ID PRODUCTOS</td>
		<th>PRODUCTOS</td>
		<th>PRECIO</td>
		<th>STOCK</td>
		<th>VENTA</td>
		
		</center>
	</tr>
	<?php 
		 require_once "modelo/data.php";
  
   $d = new Data();
   $productos = $d->mostrar_productos();

   foreach ($productos as $p) {
   	
   	                  	 ?>
	      <tr>
		
		    <td style="width:15px;"><?php echo $p->id; ?></td>
		    <td><?php echo $p->nom_producto; ?></td>
		    <td><?php echo "$".$p->precio_producto; ?></td>
		    <td><?php echo $p->stock_producto; ?></td>
		    <td>
		      <form action="controlador/agregar.php" method="POST">
		      <input  type="hidden" name="id_producto" value="<?php echo $p->id;?>">
		      <input  type="hidden" name="nom_producto" value="<?php echo $p->nom_producto;?>">
		      <input  type="hidden" name="precio_producto" value="<?php echo $p->precio_producto;?>">
		      <input  type="hidden" name="stock_producto" value="<?php echo $p->stock_producto;?>">
              <input  type="nummber" name="cantidad" value="" placeholder="" required="required" size="5">
              <button class="btn btn-primary btn-sm" type=submit value='Listado'>Añadir</button>
		      </form> 
		     </td>
	     </tr>
	     
	<?php 
		}
	 ?>
	 
</table>
<form action="vistas/ventas.php">
			<center><p>&nbsp;</p>
				<button class="btn btn-default " type=submit value='Productos'>Listado de Ventas</button> 
				<p>&nbsp;</p></center>
				
    </form>	

<?php if(isset($_GET["m"])){
    $m = $_GET["m"];

      switch ($m) {
      	case '1':
      		echo "<script> alert('El producto no tiene stock');</script>";
      		break;
      		case '2':
      		echo "<script> alert('No se puede ingresar Cantidades Negativas y valores que no sean numericos');</script>";
      		break;
      	    }

      }?>

	<?php session_start();

    if(isset($_SESSION["venta"]))
    {
        $venta = $_SESSION["venta"];
        echo "<h1>Listado de Compras</h1>";
        
       include('db.php');
       $query = "select * from clientes";
       $rs = mysqli_query($conexion, $query);?>
       <form name= "compras" action="controlador/genera_venta.php" metod="GET">
       <td><label>Cliente</label></td>	
       <td><select name = "id_cliente" id='id_cliente'><option value="0" >selecione</option>
				<?php  while ($valores = mysqli_fetch_array($rs)) 
				  {?>
					<option value="<?php echo $valores['id_cliente']?>"><?php echo $valores['nom_cliente']?></option>	   
						   
			<?php } 
            
             ?>
                        
					</select></tr>
					
      </td>


         <table class = "table table-sm">
	       <tr>
		
		     <th>PRODUCTOS</td>
		     <th>PRECIO</td>
		     <th>CANTIDAD</td>
		     <th>SUBTOTOAL</td>
		     <th>ELIMINAR</td>		
		
		
	        </tr>
	

	        <?php 

	      $total=0;
	      $i=0;
		
           foreach ($venta as $p) {
   	
   	                  	 ?>
	             <tr>
		
		           <td><?php echo $p->nom_producto; ?></td>
		           <td><?php echo $p->precio_producto; ?></td>
		           <td><?php echo $p->cantidad; ?></td>
		           <td><?php echo "$".$p->subtotal; ?></td>
		           <td><?php echo "<a href='controlador/eliminarProdventa.php?in=$i'> Eliminar</a>"?></td>
                   <?php $total += $p->subtotal; 
                   $i++;
                   ?>

	             </tr>
	     
	                            <?php 
		                          }
	                             ?>
	             <tr>
		          <td colspan="5">Total</td>
		          <td colspan="2"> $<?php echo $total; 
                  $_SESSION["total"] = $total;

		           ?></td>
		          <?php  ?>
	             </tr>

	             <tr>
		          <td colspan="7">
               	
              
		    	 <button class="btn btn-outline" type=button onclick = "validarCliente()" value='Comprar' >Comprar</button>
               	
                  </form >
		    	   </td>
		    	
	            </tr>

                  </table>
   <?php
    }
   ?>
</ul>

</body>
<center><img src="img/logo.png" alt="logo" class="img-fluid" width="200" height="200"></center>
</html>   

<script>
	function validarCliente()

	{ 
		var v=document.getElementById("id_cliente").value;
     

          if(v==0)
          {alert("debe ingresar cliente");
          return false;}
          else{document.forms["compras"].submit();


               } 
      

	}


</script>