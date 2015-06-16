<?php 
setlocale(LC_ALL,'es_CO','esp_esp');
include("includes/conexion.php"); 
include("includes/func.php");

$db = new conectar();

$tit_pag= "Registro de Deportista";
$nom_pag = "registro.php";

$tabla = "deportista";
$orden = "id";
$estado = "activo";

$ti1 = 'REGISTRO DE DEPORTISTAS';
$ti2 = 'Usuario';
$ti3 = 'Deportista';



//$_SESSION['usua'] = "";
include("encabezado.php");

if(@$add){	

		//$c_1 = md5($c_1); 
   
   
		if($db->consulta("INSERT INTO deportista (DEP_IDE,DEP_APE,DEP_NOM,TID_IDE,PRO_IDE,DEP_SEX,DEP_FEN,DEP_EST,
			DEP_PES,DEP_GRS,DEP_DIR,DEP_TEL,DEP_CEL,DEP_EMA,DEP_CON,DEP_ESD,DEP_TIU,DEP_FHR,DEP_TID,MOD_IDE) 
			VALUES ('$ide','$ape','$nom','$com_tid','$com_pro','$sex','$fec','$est','$pes','$gru','$dir','$tel','$cel','$ema','$c_1',0,2,NOW(),'$tid','0006')")){

			header("Location: ?men=6"); exit(); 
		}else{ 
           
			header("Location: ?men=7"); exit(); 
		}
}

?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<?php
if(isset($_SESSION["ide"]))
{
?>
<p class="slide"><a href="index_admin.php" class="btn-slide">Inicio</a>
<?php
}
?>

<?php include("includes/men.php");?>     
<script type="text/javascript">
$().ready(function() {	
	$("#fec").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
							changeMonth: true,changeYear: true,  yearRange: '1920:2000'});
								
	$("#form1").validate({
		rules: {
			
			nom: "required",
			ape: "required",
			dir: "required",
			sex: "required",
			cel: "required",
			security_code: {
				required: true,
				remote: "proceso_captcha.php"
			},
			ide:{
				required: true,
				remote: "valida_depo.php"
			},
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
			ide: {
				required: "Olvido digitar el Número de Documento",
				remote: "Este Numero de Documento ya Existe"
			},
			nom: "Olvido digitar el Nombre",
			ape: "Olvido digitar el Apellido",
			dir: "Olvido digitar la Dirección",
			cel: "Olvido digitar el numero de Celular",
			security_code: {
				required: "Digite código de seguridad",	
				remote: "El Codigo de seguridad Incorrecto"				
			},
					
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
<br /><br />
<?php // if($nue){?> 

<?php /*
session_start();

if(isset($_POST['submit'])) {
   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
		echo 'Thank you. Your message said "'.$_POST['message'].'"';
		unset($_SESSION['security_code']);
   } else {
		// Insert your code for showing an error message here
		echo 'Código de Seguridad no es válido';
   }
} else {
*/
?>


  
<div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Registro de Nuevo <?php echo $ti3 ?></h3>  
   <br /> 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="84%" border="0" align="center" id="tabla_form">
        <tr>
          <td>Nombres: * </td>
          <td colspan="3"><input name="nom" type="text" id="nom" size="50" maxlength="50" /></td>
        </tr>
        <tr>
          <td>Apellidos: * </td>
          <td colspan="3"><input name="ape" type="text" id="ape" size="50" maxlength="50" /></td>
        </tr>
        <tr>
          <td width="44%">Tipo de Documento: </td>
          <td colspan="3"><select name="tid" id="select">
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="TI">Tarjeta de identidad</option>
            <option value="CE">Cédula de Extranjeria</option>
            <option value="PA">Pasaporte</option>
			<option value="CO">Codigo</option>
          
		    ';		
              
        </select></td>
        </tr>
        <tr>
          <td>Identificación:</td>
          <td colspan="3"><input name="ide" type="text" id="ide" size="15" maxlength="11" /></td>
        </tr>
        <tr>
          <td>Tipo de Deportista: * </td>
          <td width="2%"><?php select("com_tid","select TID_IDE, TID_NOM from tipodeportista",""); ?></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>Programa:*</td>
          <td colspan="3"><?php select("com_pro","select PRO_IDE, PRO_NOM from programa",""); ?></td>
        </tr>
        <tr>
          <td>Sexo:</td>
          <td colspan="3"><select name="sex" id="sex">
              <option value="M" selected="selected">Masculino</option>
	          <option value="F">Femenino</option>';		 
            </select>          </td>
        </tr>
        <tr>
          <td>Fecha de Nacimiento:</td>
          <td colspan="3"><input name="fec" type="text" id="fec" size="12" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Estatura:</td>
          <td colspan="3"><input name="est" type="text" id="est" size="12" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Peso:</td>
          <td colspan="3"><input name="pes" type="text" id="pes" size="12" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Grupo Sanguineo:</td>
          <td colspan="3"><select name="gru" id="select2">
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A-">A-</option>
            <option value="A+">A+</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
            
            
            ';		 
            
          
          </select></td>
        </tr>
        <tr>
          <td>Dirección: * </td>
          <td colspan="3"><input name="dir" type="text" id="tip" size="50" maxlength="50" /></td>
        </tr>
        <tr>
          <td>Teléfono: </td>
          <td colspan="3"><input name="tel" type="text" id="tip2" size="20" maxlength="20" /></td>
        </tr>
        <tr>
          <td>Celular: </td>
          <td colspan="3"><input name="cel" type="text" id="tip3" size="20" maxlength="20" /></td>
        </tr>
        <tr>
          <td>E-mail: * </td>
          <td colspan="3"><input name="ema" type="text" id="tip4" size="50" maxlength="50" /></td>
        </tr>
        
        <tr>
          <td>Contraseña:</td>
          <td colspan="3"><input name="c_1" type="password" id="c_1" size="30" maxlength="20" /></td>
        </tr>
        <tr>
          <td>Confirmar Contraseña:</td>
          <td colspan="3"><input name="c_2" type="password" id="c_2" size="30" maxlength="20" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td>Observaciones</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td><label>
            <input type="checkbox" name="checkbox" value="checkbox" />
          Discapacidad </label></td>
          <td colspan="3"><input type="checkbox" name="checkbox3" value="checkbox" />
            Problemas Cardiovasculares          </td>
        </tr>
        
        <tr>
          <td><input type="checkbox" name="checkbox2" value="checkbox" />
            Hipertensión</td>
          <td colspan="2"><input type="checkbox" name="checkbox4" value="checkbox" />
          Problemas musculares </td>
          <td valign="middle"><input type="checkbox" name="checkbox42" value="checkbox" />
            Lesiones</td>
        </tr>
        
        
        
        <tr>
          <td colspan="4" align="center">
          <input type="hidden" name="add" id="add"  />
          <input type="submit" name="add" id="add" value="Registrar" />
              <?php
              if(!isset($_SESSION["ide"])){
          ?>    
              <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='index.php'" /></td>
            <?php
            }else{
                  ?>
              <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='index_admin.php'" /></td>
            <?php
              }
              
              ?>
        </tr>
      </table>
   </form>
    <br />
</div>
<?php // }

 ?>
<?php include("piedepagina.php") ?>