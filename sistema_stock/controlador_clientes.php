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
			$sql = "SELECT * FROM clientes";
			$rs = mysqli_query($con, $sql);
			return $fila = mysqli_fetch_all($rs, MYSQLI_ASSOC);
		}
		else {
			$sql = "SELECT * FROM clientes WHERE id_cliente = $id";
			$rs = mysqli_query($con, $sql);
			return $fila = mysqli_fetch_array($rs, MYSQLI_ASSOC);
		}
	}

	public function insertarDatos($datos){
		$con = $this->conectar();
		$sql = "INSERT INTO clientes (dni_cliente, nom_cliente, direccion, telefono, e_mail) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]')";
		$rs = mysqli_query($con, $sql);
			}

	public function actualizarDatos($id, $datos){echo $id; echo "<br>";

		foreach ($datos as $d) {
			echo $d;
		}
		$con = $this->conectar();
		$sql = "UPDATE clientes SET   dni_cliente = '$datos[0]', nom_cliente = '$datos[1]', direccion = '$datos[2]', telefono ='$datos[3]', e_mail = '$datos[4]' WHERE id_cliente = $id";
		$rs = mysqli_query($con, $sql);
	}

	public function eliminarDatos($id){
		$con = $this->conectar();
		$sql = "DELETE FROM clientes WHERE id_cliente = $id";
		$rs = mysqli_query($con, $sql);
	}
}

 ?>