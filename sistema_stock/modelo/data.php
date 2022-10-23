<?php 
require_once "conexion.php";	
require_once "producto.php";
require_once "venta.php";
require_once "detalle.php";
/**
 *  
 */

  
if (class_exists('Producto')) 
   {
      $o_miClase = new Producto();
    }
else
    {
        echo "La clase no se ha cargado correctamente";
        die;
    }
class Data
  {
      private $con;	
	  function __construct()
	     { $this->con = new Conexion("localhost","stock","root","");
		
	     }

    public function mostrar_productos()
         {
          $productos = array();
          $query = "select * from productos";
          $rs = $this->con->ejecutar($query);

          while ($reg = mysql_fetch_array($rs))
           {
     		$p = new Producto();
     		$p->id = $reg[0];
     		$p->nom_producto = $reg[1];
     		$p->precio_producto = $reg[2];
     		$p->stock_producto = $reg[3];
     		$p->id_proveedor = $reg[4];

     		array_push($productos, $p);

           }
     
            return $productos;



         }
         public function mostrar_ventas()
         {
          $ventas = array();
          $query = "select * from ventas";
          $rs = $this->con->ejecutar($query);

          while ($reg = mysql_fetch_array($rs))
           {
     		$v = new Venta();
     		$v->id_ventas = $reg[0];
     		$v->fecha = $reg[1];
     		$v->monto = $reg[2];
        $v->id_cliente = $reg[3];
     		

     		array_push($ventas, $v);

           }
           return $ventas;
          }

    public function mostrar_detalles($id_venta)
         {
          
          $query = "select d.id_detalle, p.nom_producto, d.cantidad, d.subtotal, p.precio_producto from  detalles d, productos p where p.id = d.producto and d.id_venta = $id_venta";
          $rs = $this->con->ejecutar($query);

          $detalles = array();

          

        while ($reg = mysql_fetch_array($rs))
           { 

     		$det = new Detalle();  

     		$det->id_detalle = $reg[0];
     		$det->nom_producto = $reg[1];
     		$det->cantidad = $reg[2];
     		$det->subtotal = $reg[3];
     		$det->precio = $reg[4];
     		

     		array_push($detalles, $det);

           }
     
           return  $detalles;


         }


    public function crear_venta($lista_Productos, $total, $id_cliente)
        {//crear la venta 
	         
            
	      $query = "insert into ventas values(null, now(), $total, $id_cliente)";
          $this->con->ejecutar($query);
          

          //rescatar laultima venta
          $query = "select max(id_ventas) from ventas";
          $rs = $this->con->ejecutar($query);

          $id_ultimaventa = 0;
          if ($reg = mysql_fetch_array($rs))
           {
    	      $id_ultimaventa = $reg[0];
           }

          foreach ($lista_Productos as $p)
           {
    	    $query = "insert into detalles values(null,
    	    '".$id_ultimaventa."',
    	    '".$p->id."',
    	    '".$p->cantidad."',	
    	    '".$p->subtotal."')";

            
            $this->con->ejecutar($query);
            $this->actualizar_stock($p->id, $p->cantidad);
            
            }

           
           
        }

 // descontar stock
    public function actualizar_stock($id, $stock_descontar)
        { 

          $stock_actual = 0;
        	$query = "select stock_producto from productos where id = $id";
        	$rs = $this->con->ejecutar($query);

        	
        	if ($reg = mysql_fetch_array($rs)){
        		$stock_actual = $reg[0];
        	}

        $stock_actual -=  $stock_descontar;  
        $query = "update productos set stock_producto = $stock_actual where id = $id";
        $this->con->ejecutar($query);
         
        }

        

}

?>