<?php 
	
require_once "../modelo/data.php";

$p = new Producto();	
$p->cantidad= $_POST["cantidad"];
 
 if($p->cantidad >0){

	$p->id = $_POST["id_producto"];
$p->nom_producto = $_POST["nom_producto"];
$p->precio_producto = $_POST["precio_producto"];
$p->stock_producto = $_POST["stock_producto"];
$p->subtotal = $p->precio_producto*$p->cantidad;

//agregar el product a la venta
$d = new Data();
   
   
        session_start();

       if(isset($_SESSION["venta"])){
         $venta = $_SESSION["venta"];
         }
       else{
         $venta =array();
         }

         $suma_cantidades = 0;
         foreach ($venta as $prod) {
         	if($prod->id == $p->id){
         	   $suma_cantidades += $prod->cantidad;		
         	}
         }
          $suma_cantidades += $p->cantidad;

         if($p->stock_producto >= $suma_cantidades){
         	//tengo stock
       array_push($venta, $p);
       $_SESSION["venta"] = $venta;
       header("location:../home1.php");
       }else{
    	//no tiene stock
    	header("location:../home1.php?m=1");
             }
}else{
    	//no tiene stock
    	header("location:../home1.php?m=2");
             }

    


//redirigir hacia index	   
?>	