<?php


$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
session_start();
$_SESSION['usuario']=$usuario;

include('db.php');

$consulta="SELECT * FROM usuarios where usuario='$usuario' and clave='$clave'";


$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
 
$filas=mysqli_num_rows($resultado);

if($filas){
	header("location:home.php");
	}
   else{
   	    echo "<script> alert('Usuario o contraseña mal ingresados');</script>";
   
       include("index.php");
   ?>	   
	      
  <?php  
}

mysqli_free_result($resultado);
mysqli_close($conexion);
	   	
	   
	   