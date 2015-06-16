<html>
    <head>
<?php
include("includes/conexion.php");
include("includes/func.php");
include('encabezado.php');
?>
        <title>Plan de Entrenamiento</title>
</head>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_deportista.php" class="btn-slide">Inicio</a><?php
function imprimirCabecera($dia){
		echo '<div align = "center"><div style= "width:700px"  class= "ui-jqgrid-titlebar ui-widget-header 
		ui-corner-tl ui-corner-tr ui-helper-clearfix">';
		echo '<span class="ui-jqgrid-title"><div align = "left">'.$dia.'</div></span>';
		echo '</div></div>';
  		echo '<tr class= "ui-jqgrid-labels" role ="rowheader">';
		echo "<th class= 'ui-state-default ui-th-column' role = 'columnheader' style width = 'width: 148px;' 
		aria-selected = 'true'>Ejercicio</th>";
		echo "<th class= 'ui-state-default ui-th-column' role = 'columnheader' style width = 'width: 148px;' 
		aria-selected = 'true'>Máquina</th>";
		echo "<th class= 'ui-state-default ui-th-column' role = 'columnheader' style width = 'width: 148px;' 
		aria-selected = 'true'>Series</th>";
		echo "<th class= 'ui-state-default ui-th-column' role = 'columnheader' style width = 'width: 148px;' 
		aria-selected = 'true'>Repeticiones</th>";
		echo "<th class= 'ui-state-default ui-th-column' role = 'columnheader' style width = 'width: 148px;' 
		aria-selected = 'true'>Tiempo</th>";
		echo '</tr>';
}
function imprimirColumna($fila){
	echo '<tr class= "ui-jqgrid-labels" role ="rowheader">';
    echo "<td>".$fila['EJERCICIO']."</td>";
	echo "<td>".$fila['MAQUINA']."</td>";
	echo "<td align = 'center'>".$fila['SERIES']."</td>";
	echo "<td align = 'center'>".$fila['REPETICIONES']."</td>";
	echo "<td align = 'center'>".$fila['TIEMPO']."</td>";
    echo '</tr>';
}
$db = new conectar();

$identificacion =$_SESSION["ide"];
$nomdeportista= $_SESSION["nombre"]. " ". $_SESSION["apellido"];
$query = "SELECT A.DEP_IDE AS IDENTIFICACION, DEP_NOM AS NOMBRES, DEP_APE AS APELLIDOS, B.PLE_IDE AS NUMERO_PLAN, B.PLE_FEI AS FECHA_INICIO, PLE_FEF AS FECHA_FINAL, C.DPE_DIA AS DIA, DPE_SER AS SERIES, DPE_REP AS REPETICIONES, DPE_TIE AS TIEMPO, D.EJE_NOM AS EJERCICIO, E.MAQ_NOM AS MAQUINA FROM deportista A, planentrenamiento B, detallepe  C, ejercicio D, maquina E
  WHERE A.DEP_IDE = $identificacion AND
  A.DEP_IDE = B.DEP_IDE AND
  B.PLE_IDE = C.PLE_IDE AND
  C.EJE_IDE = D.EJE_COD AND
  D.MAQ_IDE = E.MAQ_IDE ORDER BY DPE_DIA";
  $consulta=$db->consulta($query);
  $dia = 0;
function maestro($fechaini,$fechafin,$numplan){
$identificacion =$_SESSION["ide"];
$nomdeportista= $_SESSION["nombre"]. " ". $_SESSION["apellido"];
echo '<p>';
echo '<p>';

echo '<table width="700px" align="center" class="ui-widget-content" border="1">';
echo'<tr class= "ui-jqgrid-labels" role ="rowheader">';
echo '<td <h3 align = "left"><b>Plan de Entrenamiento No.' .$numplan. '</h3></b></td>';
echo '<td><a href=""><p onclick="window.print()"><b>Imprimir Plan</b></p></td>';
echo '<td><a href="index_deportista.php"><b>Regresar</b></td>';
echo '</tr>';

echo '</table>';

echo '<p>';

?>
    
    
    <?php
echo '<div align = "center"><div style= "width:700px"  class= "ui-jqgrid-titlebar ui-widget-header 
		ui-corner-tl ui-corner-tr ui-helper-clearfix">
        <div align  = "left"><font size=3px;> Identificación: '  .$identificacion. '<br> Deportista: '.$nomdeportista. '<br> Fecha de Inicio: '.$fechaini.'<br> Fecha Final '.$fechafin.'</font></div></div>';
echo "<br>";

}
while($fila = mysql_fetch_assoc($consulta)){
  if ($dia == 0)
  	{
		maestro($fila['FECHA_INICIO'],$fila['FECHA_FINAL'],$fila['NUMERO_PLAN']);
	}
  if(1 == $fila['DIA']){
    if($dia!= $fila['DIA']){
	echo '<table width="700px" align="center" class="ui-widget-content" >';
		echo "<font size=3px;>";imprimirCabecera("Lunes"); echo "</font>";
	}
    imprimirColumna($fila);
	$dia = $fila['DIA'];
  } else if(2 == $fila['DIA']){
    if($dia!= $fila['DIA']){
	echo '</table>  <br>';
	echo '<table width="700px" border="0" align="center" class="ui-widget-content">';
		echo "<font size=3px;>";imprimirCabecera("Martes"); echo "</font>";
	}
    imprimirColumna($fila);
	$dia = $fila['DIA'];
  } else if(3 == $fila['DIA']){
    if($dia!= $fila['DIA']){
	echo '</table> <br>';
	echo '<table width="700px" border="0" align="center" class="ui-widget-content">';
		echo "<font size=3px;>";imprimirCabecera("Miercoles"); echo "</font>";
	}
    imprimirColumna($fila);
	$dia = $fila['DIA'];
  } else if(4 == $fila['DIA']){
    if($dia!= $fila['DIA']){
	echo '</table> <br>';
	echo '<table width="700px" border="0" align="center" class="ui-widget-content">';
		echo "<font size=3px;>";imprimirCabecera("Jueves"); echo "</font>";
	}
    imprimirColumna($fila);
	$dia = $fila['DIA'];
  } else if(5 == $fila['DIA']){
    if($dia!= $fila['DIA']){
	echo '</table> <br>';
	echo '<table width="700px" border="0" align="center" class="ui-widget-content">';
		echo "<font size=3px;>";imprimirCabecera("Viernes"); echo "</font>";
	}
    imprimirColumna($fila);
	$dia = $fila['DIA'];
  } else if(6 == $fila['DIA']){
    if($dia!= $fila['DIA']){
	echo '</table> <br>';
	echo '<table width="700px" border="0" align="center" class="ui-widget-content">';
		echo "<font size=3px;>";imprimirCabecera("Sabado"); echo "</font>";
	}
    imprimirColumna($fila);
	$dia = $fila['DIA'];
  } else if(7 == $fila['DIA']){
    if($dia!= $fila['DIA']){
	echo '</table> <br>';
	echo '<table width="700px" border="1" align="center" class="ui-widget-content">';
		echo "<font size=3px;>";imprimirCabecera("Domingo"); echo "</font>";
	}
    imprimirColumna($fila);
	$dia = $fila['DIA'];
  } 
 }
echo '</table>';
?>
   <!-- <h1>EN CONSTRUCCION </h1>-->
<?php include("piedepagina.php") ?>
    </html>