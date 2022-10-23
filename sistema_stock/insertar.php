<?php
include('controlador_prod.php');


$datos = array($_POST['nom_producto'], $_POST['precio_producto'], $_POST['stock_producto'], $_POST['id_proveedor']);

$ins = new crud();
$ins->conectar();
$ins->insertarDatos($datos);

//if($ins->insertarDatos($datos)){
	header('Location:index_prod.php');
/*}
else{
	echo "error al guardar";
}*/

 ?>