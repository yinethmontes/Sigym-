<?php 
include("includes/conexion.php"); 
include("includes/funcionusuarios.php");

$db = new conectar();


$tit_pag= "Registro de Usuarios";
$nom_pag = "registro_usuarios.php";

$tabla = "usuarios";
$orden = "id";
$estado = "activo";

$ti1 = 'REGISTRO DE USUARIOS';
$ti2 = 'Usuario';
$ti3 = 'Usuario';

if($add){	
	$c_1 = md5($c_1); 	
	if($db->consulta("INSERT INTO $tabla (USU_IDE,USU_NOM,USU_CON,USU_EMA,USU_TIU) 
									VALUES ('$id','$nom','$c_1','$ema','2')")){		
		$id = mysql_insert_id();
		if($ctr=="apli"){ header("Location: ?mod=$id&men=6"); exit(); }else{ header("Location: ?men=6"); exit(); }
		header("Location: ?men=6"); exit(); 
	}else{ header("Location: ?men=7"); exit(); }
}


include("encabezado.php");
?>

<?php include("includes/men.php");?>     
<script type="text/javascript">
$().ready(function() {	
	$("#fec").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
							changeMonth: true,changeYear: true});
								
	$("#form1").validate({
		rules: {
			doc: "required",
			nom: "required",
			ape: "required",
			dir: "required",
			cel: "required",
			ema: {
				required: true,
				email: true
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
			doc: "Olvido digitar el Número de Documento",
			nom: "Olvido digitar el Nombre",
			ema: "Digite un email válido",
			c_1: {
				required: "Por favor digite su contraseña",
				minlength: "Su contraseña nueva debe tener al menos 5 caracteres"				
			},

			c_2: {
				required: "Por favor digite la confirmacion de la contraseña",
				minlength: "La confirmación de la contraseña debe tener al menos 5 caracteres",
				equalTo: "La confirmacion debe ser igual a la contraseña nueva"
			}	
		}
	});				
});
</script> 
<?php if($nue){?>   
 <div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Nuevo <?php echo $ti3 ?></h3>  
   <br /> 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="95%" border="0" align="center" id="tabla_form">
        <tr>
          <td>Identificación: * </td>
          <td><input name="TXT_IDE" type="text" id="TXT_IDE" size="15" maxlength="15" /></td>
        </tr>
        <tr>
          <td width="25%">Nombre y Apellidos:* </td>
          <td width="75%"><input name="nom" type="text" id="nom" size="80" maxlength="80" /></td>
        </tr>
        
        
        <tr>
          <td>Correo Electrónico:* </td>
          <td><input name="ema" type="text" id="tip4" size="80" maxlength="100" /></td>
        </tr>
        
        <tr>
          <td>Contraseña:</td>
          <td><input name="c_1" type="password" id="c_1" size="30" maxlength="20" /></td>
        </tr>
        <tr>
          <td>Confirmar Contraseña:</td>
          <td><input name="c_2" type="password" id="c_2" size="30" maxlength="20" /></td>
        </tr>
        <tr>
          <td>Tipo de Usuario: </td>
          <td><?php select("tipo_usuario","select TIU_IDE, TIU_NOM from tipo_usuario",""); ?></td>
        </tr>
        
        
        <tr>
          <td colspan="2" align="center">
          <input type="hidden" name="ctr" id="ctr" />
          <input type="submit" name="add" id="add" value="Registrar" />
          <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='index.php?'" /></td>
        </tr>
      </table>
   </form>
    <br />
</div>
<?php } ?>
<?php include("piedepagina.php") ?>