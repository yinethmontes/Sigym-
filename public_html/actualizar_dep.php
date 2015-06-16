<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actualizar-Deportista</title>
</head>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />

<?php 
setlocale(LC_ALL,'es_CO','esp_esp');
include("includes/conexion.php"); 
include("includes/func.php");

$db = new conectar();

$tit_pag= "Actualizacion de Deportista";
$nom_pag = "registro.php";

$tabla = "deportista";
$orden = "id";
$estado = "activo";

$ti1 = 'ACTUALIZAR DEPORTISTAS';
$ti2 = 'Usuario';
$ti3 = 'Deportista';

if(isset($_POST['edi'])){ 
		$sel="Select DEP_IDE from $tabla WHERE DEP_IDE='$ide'";
		$query=mysql_query($sel);
		if(mysql_num_rows($query)>0){
		echo $sel="UPDATE $tabla SET DEP_APE = '$ape',DEP_NOM = '$nom',TID_IDE = '$com_tid',PRO_IDE = '$com_pro',DEP_SEX = '$sex',DEP_FEN 					= '$fec',DEP_EST = '$est',DEP_PES = '$pes',DEP_GRS = '$gru',DEP_DIR = '$dir',DEP_TEL= '$tel',DEP_CEL ='$cel',DEP_EMA ='$ema', DEP_ESD =0,DEP_TIU =2,DEP_FHR=NOW() WHERE DEP_IDE ='$ide'";
            exit();
		$act= mysql_query($sel);
		header("Location: ?men=17"); exit(); 
			 }else{
		
		header("Location: ?men=16"); exit(); 
				}
		}
		


include("encabezado.php");
?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_deportista.php" class="btn-slide">Inicio</a>

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
			ide:{
				required: true,
				remote: "valida_depo.php"
			},
			ema: {
				required: true,
				email: true
			},
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
			
		}
	});
					
});
</script> 
<div  align="right">
<table  border="0">
<tr> <td>

  <h4>
        <?php  if($_SESSION['ide']){ ?> 
              USUARIO:  <?php echo $_SESSION['nombre'] ." ". $_SESSION['apellido'] ?> 
              <a href="template_principal.php?logout=1">[ Salir ]</a>          
        <?php }?>
      </h4></td>
</tr>   
</table></div>
<br /><br />

<?php
$sql= "select * from deportista where DEP_IDE='".$_SESSION['ide']."'";    
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
    
?>
  
 <div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Actualizaci&oacute;n   <?php echo $ti3 ?></h3>  
    <br /> 
    <form action="" method="post" name="form1" id="form1">
      <table width="84%" border="0" align="center" id="tabla_form">
        <tr>
          <td>Nombres: * </td>
          <td colspan="3"><input name="nom" type="text" id="nom" size="50" maxlength="50" value="<?= $row['DEP_NOM']?>" required/></td>
        </tr>
        <tr>
          <td>Apellidos: * </td>
          <td colspan="3"><input name="ape" type="text" id="ape" size="50" maxlength="50" value="<?=$row['DEP_APE']?>" required/></td>
        </tr>
        <tr>
          <td width="44%">Tipo de Documento: </td>
          <td colspan="3"><select name="tid" id="select" required>
            <option value="CC">C&eacute;dula de Ciudadan&iacute;a</option>
            <option value="TI">Tarjeta de identidad</option>
            <option value="CE">C&eacute;dula de Extranjeria</option>
            <option value="PA">Pasaporte</option>
          
		    ';		
              
        </select></td>
        </tr>
        <tr>
          <td>Identificaci&oacute;n:</td>
          <td colspan="3"><input name="ide" type="text" id="ide" value="<?php echo $_SESSION['ide'] ?>" size="15" maxlength="11" required/></td>
        </tr>
        <tr>
          <td>Tipo de Deportista: * </td>
          <td width="2%"><?php 
                $t_deportista = mysql_query("select TID_IDE, TID_NOM from tipodeportista");
                echo "<select name='com_tid' id='com_tid' required>";
                    while($row1 = mysql_fetch_array($t_deportista)){
                    echo "<option value='".$row1['TID_IDE']."'>".$row1['TID_NOM']."</option>";
                }
                echo "</select>";
             ?>
          </td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>Programa:*</td>
          <td colspan="3"><?php 
                    $programa = mysql_query("select PRO_IDE, PRO_NOM from programa");
                    echo "<select name='com_pro' id='com_pro' required>";
                    while($row2 = mysql_fetch_array($programa)){
                    echo "<option value='".$row2['PRO_IDE']."'>".$row2['PRO_NOM']."</option>";
                }
                echo "</select>";
                ?>
          </td>
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
          <td colspan="3"><input name="fec" type="text" id="fec" size="12" maxlength="10" value="<?=$row['DEP_FEN']?>" /></td>
        </tr>
        <tr>
          <td>Estatura:</td>
          <td colspan="3"><input name="est" type="text" id="est" size="12" maxlength="10" value="<?=$row['DEP_EST']?>" /></td>
        </tr>
        <tr>
          <td>Peso:</td>
          <td colspan="3"><input name="pes" type="text" id="pes" size="12" maxlength="10" value="<?=$row['DEP_PES']?>"/></td>
        </tr>
        <tr>
          <td>Grupo Sanguineo:</td>
          <td colspan="3"><select name="gru" id="select2">
            <option value="O+"  <?=($row['DEP_GRS']=='O'   ? 'SELECTED' : '')?>>O+</option>
            <option value="O-"  <?=($row['DEP_GRS']=='O-'  ? 'SELECTED' : '')?>>O-</option>
            <option value="A-"  <?=($row['DEP_GRS']=='A-'  ? 'SELECTED' : '')?>>A-</option>
            <option value="A+"  <?=($row['DEP_GRS']=='A'   ? 'SELECTED' : '')?>>A+</option>
            <option value="B-"  <?=($row['DEP_GRS']=='B-'  ? 'SELECTED' : '')?>>B-</option>
            <option value="B+"  <?=($row['DEP_GRS']=='B'   ? 'SELECTED' : '')?>>B+</option>
            <option value="AB-" <?=($row['DEP_GRS']=='AB-' ? 'SELECTED' : '')?>>AB-</option>
            <option value="AB+" <?=($row['DEP_GRS']=='AB'  ? 'SELECTED' : '')?>>AB+</option> 
          </select></td>
        </tr>
        <tr>
          <td>Direcci&oacute;n: * </td>
          <td colspan="3"><input name="dir" type="text" id="tip" size="50" maxlength="50" value="<?= $row['DEP_DIR']?>" required /></td>
        </tr>
        <tr>
          <td>Tel&eacute;fono: </td>
          <td colspan="3"><input name="tel" type="text" id="tip2" size="20" maxlength="20" value="<?= $row['DEP_TEL']?>"  /></td>
        </tr>
        <tr>
          <td>Celular: </td>
          <td colspan="3"><input name="cel" type="text" id="tip3" size="20" maxlength="20" value="<?= $row['DEP_CEL']?>"/></td>
        </tr>
        <tr>
          <td>E-mail: * </td>
          <td colspan="3"><input name="ema" type="text" id="tip4" size="50" maxlength="50" value="<?= $row['DEP_EMA']?>" required /></td>
        </tr>     
       
       
        
        
        <tr>
          <td colspan="4" align="center"><input type="hidden" name="agregar" id="agregar" value="1" />
            <input type="submit" name="edi" id="edi" value="Actualizar" />
          <input type="reset" name="cancelar" id="cancelar" value="Cancelar" onclick="location='index.php'" /></td>
        </tr>
      </table>
   </form>
    <br />
</div>
<?php 

 ?>
<?php include("piedepagina.php") ?>
