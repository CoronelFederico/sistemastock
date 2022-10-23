<?php

$index = $_GET["in"];

session_start();	

	

if(isset($_SESSION["venta"])){
	 $venta = $_SESSION["venta"];
     unset($venta[$index]);
     $venta = array_values($venta);
     $_SESSION["venta"] = $venta;
    
 
 if(count($venta) == 0){

 	session_unset($venta);
 }
  
}
     header("location: ../home1.php");

?>