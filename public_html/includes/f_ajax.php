<?php 
include("cone.php"); 
include("segu.php");

$action = $_POST['action'];


if ($action == "ordenar"){
	
	$lista = $_POST['list'];
	$tabla = $_POST['tabla'];
	$campo = $_POST['campo'];
	
	$listingCounter = 1;
	foreach ($lista as $recordIDValue) {
		
		$query = "UPDATE $tabla SET $campo = " . $listingCounter . " WHERE i = " . $recordIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}	
}
if($action == "estado"){
	$tabla = $_POST['tabla'];
	$campo = $_POST['campo'];
	$idd = $_POST['idd'];
	$valor = $_POST['valor'];
	$query = "UPDATE $tabla SET $campo = " . $valor. " WHERE id = " . $idd;
	mysql_query($query) or die(' Error, insert query failed');	
}

?>