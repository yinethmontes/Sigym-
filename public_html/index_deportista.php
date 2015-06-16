<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deportista-SIGYM</title>
<META NAME="ROBOTS" CONTENT="noall,noindex,nofollow">
<link rel="stylesheet"href="css/style.css"  type="text/css" media="screen" />
<link href="css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
<link href="css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />

<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<script src="js/i18n/grid.locale-sp.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="js/jquery.tablednd.js" type="text/javascript"></script>
<script src="js/ui.datepicker-es.js" type="text/javascript"></script>

<style type="text/css">
<!--
.Estilo3 {color: #FFFFFF; font-size: 12px; }
.Estilo4 {color: #000000}
-->
</style>
</head>
<body>

<div id="wrapper">
  <div id="header">
	  <div id="logo"><img src="images/sigym.jpg" alt="" width="297" height="79" />
	    <p>&nbsp;</p>
    </div>
	
  </div>
	<!-- end #header -->
	
<?php 
include("includes/conexion.php");
//include("includes/segu.php"); 
include("includes/func.php");

$db = new conectar();
?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_deportista.php" class="btn-slide">Menú</a>
   <?php  if($_SESSION['ide']){ ?> 
              USUARIO:  <?php echo $_SESSION['nombre'] ." ". $_SESSION['apellido'] ?> 
              <a href="template_principal.php?logout=1">[ Salir ]</a>          
        <?php }?>
      </h4>
</td>
</tr>   
</table>

<div align="center">
  <table width="822" border="0">
    <tr>
      <td width="76">&nbsp;</td>
      <td width="275"><a href="http://cibersoft07.galeon.com/"></a></td>
      <td width="192"><div align="right"><a href="listados_pdf/Manual_de_Usuario.pdf" target="_blank"><img src="images/cpanel/ayuda.png" name="Ayuda" width="49" height="40" id="Ayuda" /></a>
      </div>
      <div align="center"><a href="datos/Manual_usuario_SIGYM.docx" target="_blank"></a></div></td>
      <td width="261"><a href="datos/Manual_usuario_SIGYM.docx" target="_blank"><img src="images/cpanel/bboton - copia.png" width="261" height="34" /></a></td>
    </tr>
  </table>
</div>

<p>
  <?php include("includes/men.php")// Mensajes ?>
</p>
<table width="900px" border="0" align="center">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center">
      
      <tr>
        <td width="14%" rowspan="2"><div align="right"><img src="images/cpanel/agenda.png" width="59" height="70" /></div></td>
        <td width="36%" bgcolor="#F7F7F7"><img src="images/cpanel/btn_actualizar.png" width="261" height="44" /></td>
        <td width="6%">&nbsp;</td>
        <td width="10%" rowspan="2"><div align="right"><img src="images/cpanel/calendario_plan.png" width="57" height="69" /></div></td>
        <td width="34%" bgcolor="#F7F7F7"><a href="plan_de_entrenamiento.php"><img src="images/cpanel/btn_plan_entrenamiento.png" width="261" height="44" border="0" /></a></td>
      </tr>
      <tr>
        <td valign="top"><div align="justify" class="Estilo4">
          <ul>
            <li><a href="actualizar_dep.php">Permite actualizar la información de los datos básicos del deportista </a></li>
          </ul>
        </div></td>
        <td>&nbsp;</td>
        <td valign="top"><div align="justify" class="Estilo4">
          <ul>
            <li><a href="plan_de_entrenamiento.php">Permite al deportista conocer el plan de entrenamiento programado por su instructor</a> </li>
          </ul>
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="2"><div align="right"><a href="cambiar_clave_depo.php"><img src="images/cpanel/cambio_clave.png" width="59" height="70" border="0" /></a></div></td>
        <td bgcolor="#F7F7F7"><div align="left"><a href="cambiar_clave_depo.php"><img src="images/cpanel/btn_cambiar_clave.png" width="261" height="44" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td rowspan="2"><!--<div align="right"><img src="images/cpanel/estadisticas.png" width="57" height="69" /></div>--></td>
        <td bgcolor="#F7F7F7"><!--<img src="images/cpanel/btn_estadisticas.png" width="261" height="44" />--></td>
      </tr>
      <tr>
        <td valign="top"><div align="justify" class="Estilo4">
          <ul>
            <li><a href="cambiar_clave_depo.php">Permite actualizar la contraseña del deportista </a></li>
          </ul>
        </div></td>
        <td>&nbsp;</td>
        <td valign="top"><div align="justify" class="Estilo4">
          <!--<ul>
            <li><a href="dep_grafico.php">Ingresos semanales al gimnasio </a></li>
            <li><a href="dep_grafico2.php">Avance </a></li>
          </ul>-->
        </div></td>  
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
