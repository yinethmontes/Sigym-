<?php 
include("includes/conexion.php"); 
include("includes/func.php");

$db = new conectar();

$tit_pag= "Inicio de Sesión";

if($login){
	$cla = md5($cla); 
	
	$sel="SELECT * FROM deportista WHERE DEP_IDE = '$usu' and DEP_CON = '$cla'";
	$row=$db->ver($sel);
	if($row){		
		$_SESSION["ide"] = $row['DEP_IDE'];
		$_SESSION["nombre"] = $row['DEP_NOM'];
		$_SESSION["tipousuario"] = $row['DEP_TIU'];
				
		switch($_SESSION["tipousuario"]){
		
		case 1:
			header ("Location: index_admin.php"); 
			break;
		
		case 2:
			header ("Location: index_deportista.php"); 
			break;
		default:
			  	header ("Location: inicio.php"); 

		}
		//$_SESSION["aute"] = "1";		
		//header ("Location: facultades.php"); exit();
	}else{
		header ("Location: ?men=1"); exit();	
	}	
}
if($logout){
	// destruye la sessiones
	session_start();
	$_SESSION = array();
	session_destroy();
	header ("Location: template_principal.php"); exit();	
}

include("encabezado.php"); // encabezado
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
			cla: "Por favor digite su Password"
		}
	});			
	
});
</script>
<br />
<br />
<br />
<br />
<br />
<?php include("includes/men.php")// Mensajes ?>
<div id="conte" class="ui-widget-content ui-corner-all" style="width:40%;  margin:auto" >
  <h3 class="ui-widget-header ui-corner-all">Inicio de Sesión  <?php echo $nom_pro ?></h3>
  <br />
  <form action="" method="post" id="form1">
    <table border="0" width="83%" align="center">
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td width="34%" align="right"><strong>Usuario: </strong></td>
        <td width="5%">&nbsp;</td>
        <td width="61%" align="left"><input name="usu" type="text" id="usu" size="20" maxlength="20" /></td>
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
        <td height="21" colspan="3" align="right" valign="top"><a href="registro.php?nue=1">Deseo registrarme</a></td>
      </tr>
    </table>
  </form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php include("piedepagina.php") ?>