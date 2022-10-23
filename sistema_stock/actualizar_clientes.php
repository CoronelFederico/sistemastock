<?php
include('controlador_clientes.php');

$id = $_POST['id_cliente'];
$datos = array($_POST['dni_cliente'], $_POST['nom_cliente'], $_POST['direccion'], $_POST['telefono'], $_POST['e_mail']);

$ins = new crud();
$ins->actualizarDatos($id, $datos);

header('Location:index_clientes.php');

 ?>