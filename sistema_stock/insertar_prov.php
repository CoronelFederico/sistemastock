<?php
include('controlador_prov.php');

$datos = array($_POST['nom_proveedor'], $_POST['direccion'], $_POST['e_mail'], $_POST['telefono']);

$ins = new crud();
$ins->conectar();
$ins->insertarDatos($datos);

//if($ins->insertarDatos($datos)){
	header('Location:index_prov.php');
/*}
else{
	echo "error al guardar";
}*/

 ?>