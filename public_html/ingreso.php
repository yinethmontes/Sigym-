<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?php 
include("includes/conexion.php"); 
include("includes/func.php");
$db = new conectar();
$tit_pag= "INGRESO AL GIMNASIO";

include("top.php"); // encabezado

?>

<script type="text/javascript">
$().ready(function() {	

	$("#form1").validate({
		rules: {
			usu: "required",
			cla: "required"
						
		},
		messages: {
			usu: "Por favor digite su Usuario",
			cla: "Por favor digite su Contraseña"
		}
	});			
	
});
</script>

<div id="conte" class="ui-widget-content ui-corner-all" style="width:40%;  margin:auto">

<h3 class="ui-widget-header ui-corner-all">Ingreso al Gimnasio  <?php echo $nom_pro ?></h3>
  <br />
  <form action="" method="post" id="form1">
    <table border="0" width="71%">
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td width="32%" align="right"><strong>Usuario: </strong></td>
        <td width="13%">&nbsp;</td>
        <td width="55%" align="left"><input name="usu" type="text" id="usu" size="20" maxlength="20" /></td>
      </tr>
      <tr>
        <td align="right"><strong>Contraseña: </strong></td>
        <td>&nbsp;</td>
        <td align="left"><input name="cla" type="password" id="cla" value="" size="20" maxlength="20" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="44" colspan="3" align="center" valign="top">
        <input type="submit" name="login" id="login" value="Ingresar  " /></td>
      </tr>
      <tr>
       </tr>
    </table>
 </form>
</div>
</div>
</div>
<?php
include("includes/men.php");

if($login){
	$cla = md5($cla);

	$sel="SELECT * FROM deportista WHERE DEP_IDE = '$usu' and DEP_CON = '$cla'";
	$row=$db->ver($sel);
	if($row){
			$identificacion = $row['DEP_IDE'];
			$nombre = $row['DEP_NOM'];
			$apellido = $row['DEP_APE'];
			header ("Location:confirmaingreso.php?identificacion=".$identificacion."&nombre=".$nombre."&apellido=".$apellido);
			exit();
	}else{
		header ("Location:?men=1"); exit();
	}
}

?>


<p>
