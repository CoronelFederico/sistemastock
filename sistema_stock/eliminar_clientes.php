<?php
include('controlador_clientes.php');

$id = $_REQUEST['id'];

$ins = new crud();
$ins->eliminarDatos($id);

header('Location:index_clientes.php');

 ?>