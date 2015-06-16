<?php 
include("includes/conexion.php"); 
include("includes/func.php");
$db = new conectar();
$sql = "select DEP_IDE from deportista where DEP_IDE = '$ide'";
if($db->actualizar($sql)){		
	echo "false";
}else{ 
	echo "true";
}

?>