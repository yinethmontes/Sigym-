<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="5;url='ingreso.php'">
</head>

<body>

<?php 
include("includes/conexion.php"); 
include("includes/func.php");
$db = new conectar();
$tit_pag= "INGRESO AL GIMNASIO";
include("top.php"); // encabezado
include("includes/men.php");

echo '<table width="520px" align="center" class="ui-widget-content">';
			echo'<tr class= "ui-jqgrid-labels" role ="rowheader">';
			echo '<td <h3 align = "left">Identificación:</h3></td>';
			echo '<td <h3 align = "left">'.$identificacion.'</h3></td>';
			echo '</tr>';
			echo'<tr class= "ui-jqgrid-labels" role ="rowheader">';
			echo '<td <h3 align = "left">Nombre:</h3></td>';
			echo '<td <h3 align = "left">'.$nombre ." ".$apellido.'</h3></td>';
			echo '</tr>';
			echo'<tr class= "ui-jqgrid-labels" role ="rowheader">';
			$Hora_I= date('H:i:s',time() - 18000 );
			echo '<td <h3 align = "left">Su hora de ingreso es:</h3></td>';
			echo '<td <h3 align = "left">' .$Hora_I.'</h3></td>';
			echo '</tr>';
			echo '</table>';
//if(isset($_POST['login'])) {
	
	$query = "INSERT INTO ingreso (ING_FHI,DEP_IDE)VALUES(now(),'$identificacion')";
	$grabado = mysql_query($query);
	
	//if($grabado) {	
		echo "<h3 align = 'Center'>Bienvenid@...</h3>";	
	//}
//}
?>
