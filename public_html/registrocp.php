<?php 
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
$ti3 = 'Usuario';

if($add){	
	$c_1 = md5($c_1); 	
	if($db->consulta("INSERT INTO $tabla (DEP_IDE,DEP_TID,DEP_APE,DEP_NOM,DEP_SEX,DEP_FEN,DEP_EST,DEP_PES,DEP_GRS,DEP_EMA,DEP_DIR,DEP_TEL,DEP_CEL,DEP_ESD) 
	VALUES ('id','tid','ape','nom','sex','fec','est','pes','gru','dir','tel','cel','ema','c_1','c_2')")){		
		$id = mysql_insert_id();
		if($ctr=="apli"){ header("Location: ?mod=$id&men=6"); exit(); }else{ header("Location: ?men=6"); exit(); }
		header("Location: ?men=6"); exit(); 
	}else{ header("Location: ?men=7"); exit(); }
}

//$_SESSION['usua'] = "";
include("encabezado.php");
?>

<?php include("includes/men.php");?>     
<script type="text/javascript">
$().ready(function() {	
	$("#fec").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
							changeMonth: true,changeYear: true});
			
});
</script> 


<?php //if($nue){?>   
 <div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Nuevo <?php echo $ti3 ?></h3>  
   <br /> 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="79%" border="0" align="center" id="tabla_form">
        <tr>
          <td>Nombre * </td>
          <td><input name="nom" type="text" id="nom" size="80" maxlength="80" /></td>
        </tr>
        <tr>
          <td>Apellido * </td>
          <td><input name="ape" type="text" id="ape" size="80" maxlength="80" /></td>
        </tr>
        <tr>
          <td width="20%">Tipo de Documento </td>
          <td width="80%"><select name="tid" id="select">
              <option value="T" selected="selected">Tarjeta de Identidad</option>
              <option value="C">Cedula de Ciudadania</option>
              <option value="P">Pasaporte</option>
              
            ';		 
            
          
          </select></td>
        </tr>
        <tr>
          <td>Documento</td>
          <td><input name="id" type="text" id="id" size="15" maxlength="11" /></td>
        </tr>
        <tr>
          <td>Sexo</td>
          <td><select name="sex" id="sex">
              <option value="M" selected="selected">Masculino</option>
	          <option value="F">Femenino</option>';		 
            </select>          </td>
        </tr>
        <tr>
          <td>Fecha de Nacimiento </td>
          <td><input name="fec" type="text" id="fec" size="12" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Estatura</td>
          <td><input name="est" type="text" id="est" size="12" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Peso</td>
          <td><input name="pes" type="text" id="pes" size="12" maxlength="10" /></td>
        </tr>
        <tr>
          <td>Grupo Sanguineo </td>
          <td><select name="gru" id="select2">
            <option value="A" selected="selected"></option>
            <option value="B"></option>
            ';		 
            
          </select></td>
        </tr>
        <tr>
          <td>Dirección * </td>
          <td><input name="dir" type="text" id="tip" size="90" maxlength="200" /></td>
        </tr>
        <tr>
          <td>Teléfono </td>
          <td><input name="tel" type="text" id="tip2" size="20" maxlength="20" /></td>
        </tr>
        <tr>
          <td>Celular * </td>
          <td><input name="cel" type="text" id="tip3" size="20" maxlength="20" /></td>
        </tr>
        <tr>
          <td>Correo * </td>
          <td><input name="ema" type="text" id="tip4" size="80" maxlength="100" /></td>
        </tr>
        
        <tr>
          <td>Contraseña</td>
          <td><input name="c_1" type="password" id="c_1" size="30" maxlength="20" /></td>
        </tr>
        <tr>
          <td>Confirmar Contraseña </td>
          <td><input name="c_2" type="password" id="c_2" size="30" maxlength="20" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        
        <tr>
          <td colspan="2" align="center">
          <input type="hidden" name="ctr" id="ctr" />
          <input type="submit" name="add" id="add" value="Registrar" />
          <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='../index.php'" /></td>
        </tr>
      </table>
   </form>
    <br />
</div>
<?php //} ?>
<?php include("piedepagina.php") ?>