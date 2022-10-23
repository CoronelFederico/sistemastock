<?php
include('controlador_prov.php');

$id = $_REQUEST['id'];

$ins = new crud();
$ins->eliminarDatos($id);

header('Location:index_prov.php');

 ?>