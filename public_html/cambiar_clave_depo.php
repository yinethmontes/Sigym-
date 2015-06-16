<?php 
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();

$tit_pag= "Actualizar Contraseña";
$nom_pag = "cambiar_clave_depo.php";

$tabla = "deportista";
$orden = "";
$estado = "";

$ti1 = 'CAMBIAR CONTRASEÑA';
$ti2 = 'Cambiar Contraseña';
$ti3 = 'Contraseña';


if(@$_POST['edit']){
	$usu = $_SESSION["ide"]; 
	$cla = $_POST['cla']; //encriptar clave con md5
	$c_1 = $_POST['c_1']; //encriptar clave con md5
	
	$sel="SELECT DEP_IDE FROM $tabla WHERE DEP_IDE = '$usu' and DEP_CON = '$cla'";
	$query = mysql_query($sel);
	if(mysql_num_rows($query) > 0){
		$sel = "update $tabla set DEP_CON = '$c_1' where DEP_IDE = '$usu' ";
		$edi =  mysql_query($sel);		
		
		header("Location: index_deportista.php?logout=1&men=5");    
		exit(); 	
	}else{
		header("Location: ?men=4");    
		exit(); 	
	}
	
}
include("encabezado.php"); // Encabezado de la Pagina
?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_deportista.php" class="btn-slide">Inicio</a>
<!-- INICIO CONTENIDO -->
<script type="text/javascript">
$().ready(function() {	
	$("#form1").validate({
		rules: {
			cla: {
				required: true,
				minlength: 5
			},
			c_1: {
				required: true,
				minlength: 5
			},
			c_2:  {
				required: true,
				minlength: 5,
				equalTo: "#c_1"
			}
						
		},
		messages: {
			cla: {
				required: "Por favor digite clave actual",
				minlength: "Su clave debe tener al menos 5 caracteres"			
			},

			c_1: {
				required: "Por favor digite su nueva contraseña",
				minlength: "Su nueva contraseña debe tener al menos 5 caracteres"				
			},

			c_2: {
				required: "Por favor digite la confirmacion de la nueva contraseña",
				minlength: "La confirmación de la nueva contraseña debe tener al menos 5 caracteres",
				equalTo: "La confirmacion debe ser igual a la nueva contraseña"
			}

		}
	});	
	
		
});
</script>
  <p>
    <?php include("includes/men.php");?>
</p>
  <div id="conte" class="ui-widget-content ui-corner-all" style="width:50%; margin:auto" >
    <h3 class="ui-widget-header ui-corner-all"><?php echo $ti2 . " ". $nom_pro ?></h3>   
  <br>  
  <form action="" method="post" id="form1">
  <table border="0" width="95%" align="center">
  <tr>
    <td width="46%" align="right"><strong>
      <input name="usu" type="hidden" id="usu" value="<?php echo $_SESSION['nombre'];?>" />
      Usuario:</strong></td>
    <td width="6%">&nbsp;</td>
    <td width="48%"><strong><?php echo $_SESSION['nombre']." ". $_SESSION['apellido'];?></strong></td>
  </tr>
  <tr>
    <td align="right"><strong>Contraseña  Actual: (*)</strong></td>
    <td>&nbsp;</td>
    <td><input name="cla" type="password" id="cla" value="" size="30" /></td>
  </tr>
  <tr>
    <td align="right"><strong>Nueva Contraseña: (*)</strong></td>
    <td>&nbsp;</td>
    <td><input name="c_1" type="password" id="c_1" size="30" maxlength="20" /></td>
  </tr>
  <tr>
    <td align="right"><strong>Confirmar Contraseña:(*)</strong></td>
    <td>&nbsp;</td>
    <td><input name="c_2" type="password" id="c_2" size="30" maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="edit" id="edit" value=" Actualizar" <?php echo $ti3; ?> " /> <input type="button" name="cancelar2" id="cancelar2" value="   Cancelar   " onclick="location='index_deportista.php'" /></td>
    </tr>
</table>
</form>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
   <p>&nbsp;</p>  
  <p>&nbsp;</p>
<!-- FIN CONTENIDO -->
<?php //include("admfooter.php") ?>