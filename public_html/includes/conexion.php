<?php 
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start();

$nom_pro = "SIGYM";

class conectar{
	
	public $conexion;
	public function conectar(){
		


                 if(!isset($this->conexion)){
			$this->conexion = (mysql_connect("mysql1.000webhost.com","a2049479_sigym","sigym2015")) 
			or die('Conectando con el servidor . . . . . .' );
			@mysql_select_db("a2049479_sigym",$this->conexion) or die('Conectando con la Base de Datos . . . ');
		}

		/*
		if(!isset($this->conexion)){
			$this->conexion = (mysql_connect("localhost","a2049479_sigym","sigym2015")) 
			or die('Conectando con el servidor . . . ' );
			@mysql_select_db("a2049479_sigym",$this->conexion) or die('Conectando con la Base de Datos . . . ');
		}*/
	}
	public function consulta($consulta){		
		$resultado = mysql_query($consulta,$this->conexion);  				
		if(!$resultado){  
			echo 'MySQL Error: ' . mysql_error(); 			
	   	}		
	    return $resultado;   
	}
	
	public function listar($consulta){   
		return mysql_fetch_array($consulta);  
	}  
	public function contar($consulta){   
		return mysql_num_rows($consulta);  
	} 

	public function actualizar($consulta){		
		$resultado = mysql_query($consulta,$this->conexion);
		if(mysql_affected_rows($this->conexion) >= 1){
			$resultado="1";
		}else{
			$resultado="";
		}	
		return $resultado;
	}
	
	public function ver($consulta){		
		$resultado = mysql_query($consulta,$this->conexion);
		$resultado = mysql_fetch_array ($resultado); 
		return $resultado; 
		
	}
	
	public function mostrar($campo1, $tabla,$campo2,$dato){
		$resultado = mysql_query("SELECT $campo1 FROM $tabla WHERE $campo2 = '$dato'",$this->conexion);
		$row = mysql_fetch_array ($resultado, MYSQL_ASSOC); 
		if ($row) {			
			$resultado = $row[$campo1];
		}else{
			$resultado = "";
		}		
		return $resultado; 
	}
		
	public function permiso($per){		
		session_start(); 
		if ($_SESSION["tipo_u"] != $per) {	
			header("Location: index.php?men=2");    	
			exit(); 			
		}
	}
	
}
/*
$hora = date("H:i:s",time()); 
$fecha = date("Y-m-d"); 
$ip = $_SERVER['REMOTE_ADDR']; 
*/
/// Funcion para escapar los datos y evitar el sql inyection
function escapar($variable) {  
	$variable = mysql_real_escape_string(trim($variable)); 
	return $variable; 
}

?>		