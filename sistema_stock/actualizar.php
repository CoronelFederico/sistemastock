<?php
include('controlador_prod.php');

$id = $_POST['id'];
$datos = array($_POST['nom_producto'], $_POST['precio_producto'], $_POST['stock_producto'], $_POST['id_proveedor']);

$ins = new crud();
$ins->actualizarDatos($id, $datos);

header('Location:index_prod.php');
 ?>