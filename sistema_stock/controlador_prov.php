<?php 
class crud{
	private $servidor = "localhost";
	private $usuario = "root";
	private $bd = "stock";
	private $password = "";

	public function conectar(){
		$conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);
		return $conexion;
	}

	public function mostrarDatos($id){
		$con = $this->conectar();
		if ($id==0) {
			$sql = "SELECT * FROM proveedores";
			$rs = mysqli_query($con, $sql);
			return $fila = mysqli_fetch_all($rs, MYSQLI_ASSOC);
		}
		else {
			$sql = "SELECT * FROM proveedores WHERE id_proveedor=$id";
			$rs = mysqli_query($con, $sql);
			return $fila = mysqli_fetch_array($rs, MYSQLI_ASSOC);
		}
	}

	public function insertarDatos($datos){
		$con = $this->conectar();
		$sql = "INSERT INTO proveedores(nom_proveedor, direccion, e_mail, telefono) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]')";
		$rs = mysqli_query($con, $sql);
			}

	public function actualizarDatos($id, $datos){

	
		$con = $this->conectar();
		$sql = "UPDATE proveedores SET nom_proveedor = '$datos[0]', direccion = '$datos[1]', e_mail = '$datos[2]', telefono = '$datos[3]' WHERE id_proveedor = $id";
		$rs = mysqli_query($con, $sql);
	}

	public function eliminarDatos($id){
		$con = $this->conectar();
		$sql = "DELETE FROM proveedores WHERE id_proveedor=$id";
		$rs = mysqli_query($con, $sql);
	}
}

 ?>