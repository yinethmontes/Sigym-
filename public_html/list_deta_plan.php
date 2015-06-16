<?php 
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();

?>

<script type="text/javascript">
$().ready(function() {
	
	$("#DPE_DIA").val("<?php echo $dia; ?>");

});
</script>
<p>PLAN ENTRENAMIENTO DEL DIA</p>
<table width="773" border="0" align="center" cellpadding="0" cellspacing="0" class="ui-widget-content">
  <tr class="ui-widget-header">
    <td width="265" height="24" align="center">Ejercicio</td>
    <td width="239" align="center">Maquina</td>
    <td width="44" align="center">Series</td>
    <td width="98" align="center">Repeticiones</td>
    <td width="62" align="center">Tiempo</td>
    <td width="65" align="center">Acciones</td>
  </tr>
  <?php 
    $que= "SELECT a.DET_IDE as id, b.EJE_NOM as ejercicio2, a.DPE_SER as series, a.DPE_REP as repeticiones, a.DPE_TIE as tiempo, c.MAQ_NOM as maquina
				FROM detallepe a, ejercicio b, maquina c 
				WHERE a.EJE_IDE = b.EJE_COD AND 
				a.DPE_DIA = $dia AND 
				b.MAQ_IDE = c.MAQ_IDE AND 
				a.PLE_IDE = $ide ORDER BY a.DET_IDE";
	$consulta = $db->consulta($que);	
	while($row = $db->listar($consulta)){		
		
  ?>
  <tr class ="ui-widget-content jqgrow" role = "gridcell">
    <td height="21" role="gridcell"><?php echo $row['ejercicio2'] ?></td>    
    <td align="left"><?php echo $row['maquina'] ?></td>
    <td align="center"><?php echo $row['series'] ?></td>
    <td align="center"><?php echo $row['repeticiones'] ?></td>
    <td align="center"><?php echo $row['tiempo'] ?></td>
	<td align="center"><a href="#">
	<img src="images/delete.gif" class="img_del" id="<?php echo $row['id'] ?>" name="<?php echo $dia ?>" alt="Eliminar Rutina" title="Eliminar Rutina" width="16" height="16" border="0" /></a></td>
  </tr>
  <?php } ?>
</table>
<p>&nbsp;</p>
<p align="center">
  <input name="btn_ruti2" type="button" id="btn_ruti2" class="btn_ruti" value="Agregar Rutina" alt="<?php echo $dia ?>" title="<?php echo $ide ?>" />
</p>

