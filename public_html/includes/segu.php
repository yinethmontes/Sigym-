<?php 
$db1 = new conectar();
session_start(); 

if ($_SESSION["aute"] != "1") {
   	header("Location: index.php?logout=1&men=2");    	
   	exit(); 
}else{	
	$sel="SELECT DEP_IDE FROM deportista WHERE DEP_IDE = '".$_SESSION['ide'] ."'";
	$row=$db1->ver($sel);
	if(!$row){				
		header ("Location: inicio.php?logout=1&men=2"); exit();	
	}	
}
?>