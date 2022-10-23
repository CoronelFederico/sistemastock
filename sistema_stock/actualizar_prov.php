<?php
include('controlador_prov.php');

$id = $_POST['id'];
$datos = array($_POST['nom_proveedor'], $_POST['direccion'], $_POST['e_mail'], $_POST['telefono']);

$ins = new crud();
$ins->actualizarDatos($id, $datos);

header('Location:index_prov.php');

 ?>