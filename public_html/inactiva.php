<?php 
include("includes/conexion.php");
//include("includes/segu.php"); 
include("includes/func.php");

$db = new conectar();

if($db->consulta("update deportista set dep_esd='0' where dep_ide = $dep_ide")){
		header("Location: index_admin.php?#modal1"); exit();
	}else{
    header("Location: index_admin.php?#modal1"); exit();
    }


?>

