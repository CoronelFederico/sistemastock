<?php 
//echo $_GET["id_cliente"];
require_once "../modelo/data.php";
 session_start();
  $venta = $_SESSION["venta"];
  $total = $_SESSION["total"];
  $id_cliente = $_GET["id_cliente"];
 // if($id_cliente>0){
$d = new Data();

$d->crear_venta($venta, $total, $id_cliente);

//remover venta
session_unset($venta);
//remover total
session_unset($total);
header("location: ../home1.php");//}
//else {echo "debe ingresar cliente";
//header("location: ../home1.php");}

?>