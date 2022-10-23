<?php 
/**
 * 
 */
class Conexion
{
	
	function __construct($server, $bdname, $user, $pass)
	{
   //$con = new mysqli("$server", "user", "pass", "$bdname");
		$con = mysql_connect($server, $user, $pass);
			
          if (!$con) {
          	die("Error al conectar BD: ".mysql_error());
                    }
          $selbd= mysql_select_db($bdname);

          if (!$selbd) {
          	die("Error al conectar BD: ".mysql_error());
			           }
	}		           
   public function ejecutar($query){
        return mysql_query($query);
                            }	

}