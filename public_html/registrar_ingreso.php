<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script type='text/javascript' src='js/jquery.js'></script> 
</head>

<body>
  <?php
  //include ('includes/plantilla_top.html');
 include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");
include("encabezado.php");
?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_admin.php" class="btn-slide">Inicio</a>
<?php
$db = new conectar();
 
 // una hora es 3600 
$Fecha_I= date('Y-m-d',time() -  18000);
$Hora_I= date('H:i:s',time() - 18000 );
$Fecha_S= date('Y-m-d',time() -  18000);
$Hora_S= date('H:i:s',time() - 18000 + 4500 );

?>

<div align="center">
<form id="form" name="form" method="post" action="">

<table width="315" align="center">
<tr>
      <td width="90">Identificaci&oacute;n:</td>
      <td width="98"><input name="TXT_IDE" type="text" id="TXT_IDE" value="<?php if (isset($_POST['TXT_IDE'])) echo $_POST['TXT_IDE']; ?>"Size="15" maxlength="15" /></td>
      <td width="14">&nbsp;</td>
      <td width="93"><input name="btn_con" type="submit" id="btn_con" value="Consultar" /></td>
    </tr>
  </table>
<!--</form>-->
</div>

  <?php
if(isset($_POST['btn_con'])){
	
		if(!is_numeric($_POST['TXT_IDE'])){
			$errores[] = "Campo identificacion debe ser numerico";	
		}else{
		$identificacion1 = ($_POST['TXT_IDE']);
		}
		
		if(empty($errores)){
			
			$consulta = "Select DEP_IDE, DEP_NOM, DEP_APE ,DEP_SEX FROM DEPORTISTA WHERE DEP_IDE = '$identificacion1'";
			$result = mysql_query($consulta);
			if(mysql_num_rows($result)== 1){
				
				echo '<table width="699" align="center" cellpadding="2" cellspacing="2" class="display" border="1">
				<tr>
				<th width="133">IDENTIFICACION</a></th>
				<th width="133">APELLIDOS</a></th>	
				<th width="230">NOMBRES</a></b></th>
				<th width= "230">GENERO </a> </b></th>
				</tr>';

			// Trae e imprime los registros
			$bg = 'ffffff'; // Color de fondo
			while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $identificacion = $fila['DEP_IDE'];
				$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Alterna el color de fondo.
				echo '<tr bgcolor="' . $bg . '">
			
				<td align="center">' . $fila['DEP_IDE'] . '</td>
				<td align="center">' . $fila['DEP_APE'] . '</td>
				<td align="center">' . $fila['DEP_NOM'] . '</td>
				<td align="center">' . $fila['DEP_SEX'] . '</td>
				</tr>';
			}

			echo '</table>';
			
									
			}else{
				echo "Registro no encontrado";
			
			}
	
		}else{
			
			echo "<h1>Error!</h1>";
 		    echo "<p>Se presentaron los siguientes errores al llenar el fomulario:</p>";
  		    foreach($errores as $mensaje){
 	        echo '<div class="error">'.$mensaje."</div><br>"   ;
		}
	
	}
    
	}
?>

  <?php
if(@$identificacion = $identificacion);
	
if(isset($_POST['btn_reg'])){
  $identificacion= $_POST['id'];
	echo $registro = "INSERT INTO INGRESO(ING_FHE ,ING_FHS,DEP_IDE) VALUES('$Fecha_I $Hora_I','$Fecha_S $Hora_S','$identificacion')";
		$result = mysql_query($registro);

	}

?>

  
</p>
<!--<form id="form1" name="form1" method="post" action="">-->
    <input type="hidden" name="id" id="id" value="<?=$identificacion?>">
  <table width="714" height="115" border="0" align="center" >
    
	 <tr>
      <td width="102">&nbsp;</td>
      <td width="155">&nbsp;</td>
      <td width="115">&nbsp;</td>
      <td width="131">&nbsp;</td>
      <td width="189">&nbsp;</td>
    </tr>
    <tr>
      <td>Fecha Ingreso: </td>
      <td>
      <input name="textfield" type="text" value="<?php echo $Fecha_I; ?>" /></td>
      <td>&nbsp;</td>
      <td>Hora Ingreso:</td>
      <td><input name="textfield2" type="text" value="<?php echo $Hora_I;?>" /></td>
    </tr>
    <!--<tr>
      <td>Fecha Salida: </td>
      <td>
        <input name="textfield3" type="text" value="<?php echo $Fecha_S;?>" />      </td>
      <td>&nbsp;</td>
      <td>Hora Salida: </td>
      <td><input name="textfield4" type="text" value="<?php echo $Hora_S;?>" /></td>
    </tr>-->
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div id='confirm-dialog'>
	    <div align="center">
	      <input type='submit' name='btn_reg' id="btn_reg" class='confirm' value='Registrar ingreso'/>
	    </div>
      </div></td>
      <td><label></label></td>
      <td>&nbsp;</td>
    </tr>
  </table>

</form>
    
</body>

</html>
