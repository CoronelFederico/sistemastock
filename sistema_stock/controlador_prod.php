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
			$sql = "SELECT * FROM productos";
			$rs = mysqli_query($con, $sql);
			return $fila = mysqli_fetch_all($rs, MYSQLI_ASSOC);
		}
		else {
			$sql = "SELECT * FROM productos WHERE id=$id";
			$rs = mysqli_query($con, $sql);
			return $fila = mysqli_fetch_array($rs, MYSQLI_ASSOC);
		}
	}

	public function insertarDatos($datos){
		$con = $this->conectar();
		$sql = "INSERT INTO productos(nom_producto, precio_producto, stock_producto, id_proveedor) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]')";
		$rs = mysqli_query($con, $sql);
			}

	public function actualizarDatos($id, $datos){
		$con = $this->conectar();
		$sql = "UPDATE productos SET nom_producto = '$datos[0]', precio_producto = '$datos[1]', stock_producto = '$datos[2]', id_proveedor = '$datos[3]' WHERE id=$id";
		$rs = mysqli_query($con, $sql);
	}

	public function eliminarDatos($id){
		$con = $this->conectar();
		$sql = "DELETE FROM productos WHERE id=$id";
		$rs = mysqli_query($con, $sql);
	}
}

 ?>