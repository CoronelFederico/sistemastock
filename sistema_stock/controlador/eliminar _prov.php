<?php
include('controlador_prod.php');

$id = $_REQUEST['id'];

$ins = new crud();
$ins->eliminarDatos($id);

header('Location:index_prov.php');

 ?>