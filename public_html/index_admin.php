<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Administrador-SIGYM </title>
<META NAME="ROBOTS" CONTENT="noall,noindex,nofollow">
<link rel="stylesheet"href="css/style.css"  type="text/css" media="screen" />
<link href="css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
<link href="css/ui.jqgrid.css" rel="stylesheet" type="text/css" />

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
<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script>
<?php

function validar_ingresos(){
    ?>
<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="resources/demo.js"></script>
<?php
    
    
$db = new conectar();
    

$mes = date('m') - 1;
$year = date('Y');        
$sql= "SELECT a.ing_fhe,b.dep_ape,b.dep_nom,b.dep_ema,b.dep_cel,c.pro_nom,d.mod_nom,b.dep_ide
FROM ingreso a 
INNER JOIN deportista b on a.dep_ide=b.dep_ide 
INNER JOIN programa c on b.pro_ide=c.pro_ide
INNER JOIN modalidad d on b.mod_ide=d.mod_ide
WHERE month(ING_FHE)<'$mes' AND year(ING_FHE)='$year' AND b.dep_esd=1";
    $res=mysql_query($sql);
    $filas = mysql_num_rows($res);
    if($filas>0){
    echo "<form action='inactiva.php' method = 'POST'>";
    echo "<table class='display' border='1'>";
    echo "<tr bgcolor='#81DAF5'>";
        echo "<td><b>Ultima Fecha de Ingreso</b></td>";
        echo "<td><b>Nombre Deportista</b></td>";
        echo "<td><b>Correo Electronico</b></td>";
        echo "<td><b>Celular</b></td>";
        echo "<td><b>Programa</b></td>";
        echo "<td><b>Modalidad</b></td>";
        echo "<td><b>Accion</b></td>";
    echo "</tr>";
    while($row = mysql_fetch_array($res)){
        echo "<tr>";
            echo "<input type='hidden' name='dep_ide' value='".$row['dep_ide']."'>";
            echo "<td>".$row['ing_fhe']."</td>";
            echo "<td>".utf8_encode($row['dep_nom'])."  ".utf8_decode($row['dep_ape'])."</td>";
            echo "<td>".$row['dep_ema']."</td>";
            echo "<td>".$row['dep_cel']."</td>";
            echo "<td>".utf8_encode($row['pro_nom'])."</td>";
            echo "<td>".$row['mod_nom']."</td>";
            echo '<td><button name="eli">Inactivar</button></td>';
    echo "</tr>";
    
    }
    echo "</table>";
    echo "</form>";
    }else{
        echo "No existen Ausencias mayores a un mes. ";
    }
}    
    
?>

<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
    .modalmask {
    position: fixed;
    font-family: Arial, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0,0,0,0.8);
    z-index: 99999;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
}
.modalmask:target {
    opacity:1;
    pointer-events: auto;
}
    .modalbox{
    width: 900px;
    height:auto;
    position: relative;
    padding: 5px 20px 13px 20px;
    background: #fff;
    border-radius:3px;
    -webkit-transition: all 500ms ease-in;
    -moz-transition: all 500ms ease-in;
    transition: all 500ms ease-in;
     
}
    .movedown {
    margin: 0 auto;
}
.rotate {
    margin: 10% auto;
    -webkit-transform: scale(-5,-5);
    transform: scale(-5,-5);
}
.resize {
    margin: 10% auto;
    width:0;
    height:0;
 
}
.modalmask:target .movedown{       
    margin:10% auto;
}
.modalmask:target .rotate{     
    transform: rotate(360deg) scale(1,1);
        -webkit-transform: rotate(360deg) scale(1,1);
}
 
.modalmask:target .resize{
    width:400px;
    height:200px;
}
    .close {
    background: #606061;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: 1px;
    text-align: center;
    top: 1px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    border-radius:3px;
 
}
 
.close:hover {
    background: #FAAC58;
    color:#222;
}
</style>
</head>
<body>

<div id="wrapper">
  <div id="header">
	  <div id="logo"><img src="images/sigym.jpg" alt="" width="297" height="79" />
	    <p>&nbsp;</p>
    </div>
      <br>
      <br>
       <div>
        <br><a href="listados_pdf/Manual_de_Usuario.pdf" target="_blank"><img src="images/cpanel/ayuda.png" name="Ayuda" width="49" height="40" id="Ayuda" align="right" alt='Acerca de ...'/></a>
        <br><div align='right'><b><font color='white'>Acerca de...</font></b></div>
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
<p class="slide"><a href="index_admin.php" class="btn-slide">Menú</a>



  <?php  if($_SESSION['ide']){ ?>
USUARIO: <?php echo $_SESSION['nombre'] ." ". $_SESSION['apellido'] ?> <a href="template_principal.php?logout=1">[ Salir ]</a>
  



<div align="center">
  <table width="801" border="0">
    <tr>
      <td width="76">&nbsp;</td>
      <td width="275"></td>
      <td width="173"></td>
      <td width="259"></td>
    </tr>
  </table>
</div>
  <?php }?>
</p>

</table>
<?php
//validar_ingresos();
?>
   
<div id="modal1" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <h2>Usuarios Con Ausencia Prolongada</h2>
        <br>
        <?php
            validar_ingresos();
        ?>
    </div>
</div>
    
<table width="900px" border="0" align="center">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center">
      
      <tr>
        <td width="14%" rowspan="2"><div align="right"><img src="images/cpanel_admin/btn_pesas.png" width="59" height="70" /></div></td>
        <td width="36%" bgcolor="#F7F7F7"><img src="images/cpanel_admin/btn_ejercicios.png" alt="Ejercicios &amp; Tipos de Ejercicio" width="246" height="44" /></td>
        <td width="6%">&nbsp;</td>
        <td width="9%" rowspan="2"><div align="right"><img src="images/cpanel_admin/icono_calendario.png" width="59" height="69" /></div></td>
        <td width="35%" bgcolor="#F7F7F7"><img src="images/cpanel_admin/btn_planes_entrenamiento.png" alt="Planes de Entrenamiento" width="246" height="44" border="0" /></td>
      </tr>
      <tr>
        <td valign="top"><ul>
          <li><a href="ejercicios.php" class="Estilo1">Ejercicios</a></li>
          <li><a href="modalidades.php" class="Estilo1">Modalidades
              </h4></a></li>
        </ul>          </td>
        <td>&nbsp;</td>
        <td valign="top"><ul>
          <li><a href="plan_entrenamiento.php" class="Estilo1">Planes de Entrenamiento</a></li>
          <li><a href="registrar_ingreso.php" class="Estilo1">Registrar Ingreso Al Gimansio</a></li>
        </ul></td>
      </tr>
      
      
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="2"><div align="right"><a href="cambiar_clave_depo.php"></a><img src="images/cpanel_admin/icono_maquinas.png" width="59" height="70" /></div></td>
        <td bgcolor="#F7F7F7"><div align="left"><a href="cambiar_clave_depo.php"></a><img src="images/cpanel_admin/btn_maquinas.png" alt="Máquinas &amp; Tipos de Máquina" width="246" height="44" /></div></td>
        <td>&nbsp;</td>
        <td rowspan="2"><div align="right"><img src="images/cpanel_admin/icono_tipo_deportista.png" width="59" height="70" /></div></td>
        <td bgcolor="#F7F7F7"><img src="images/cpanel_admin/btn_tipos_deportista.png" width="246" height="44" /></td>
      </tr>
      <tr>
        <td valign="top"><ul>
          <li class="Estilo1"><a href="tipodemaquina.php">Tipos de Máquina </a></li>
          <li class="Estilo1"><a href="maquinas.php">Máquinas</a></li>
          <li class="Estilo1"><a href="ordenmantenimiento.php">Ordenes de Mantenimiento </a></li>
        </ul>          </td>
        <td>&nbsp;</td>
        <td valign="top"><div align="justify" class="Estilo4">
          <ul>
            <li><a href="tipodeportista.php">Tipo de Deportista</a></li>
            <li><a href="registro.php">Registro de nuevos Deportistas</a>  </li>
            <li><a href="listadeportistas.php">Lista Deportistas</a>  </li>
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
        <td rowspan="2" valign="top"><div align="right"><img src="images/cpanel_admin/icono_facultades.png" width="59" height="70" /></div></td>
        <td><img src="images/cpanel_admin/btn_facultades.png" width="246" height="44" /></td>
        <td>&nbsp;</td>
        <td rowspan="2"><div align="right"><img src="images/cpanel/estadisticas.png" width="57" height="69" /></div></td>
        <td><img src="images/cpanel_admin/btn_informes.png" width="246" height="44" /></td>
      </tr>
      <tr>
        <td valign="top"><ul>
          <li class="Estilo1"><a href="facultades.php">Facultades</a></li>
          <li class="Estilo1"><a href="programas.php">Programas</a></li>
        </ul>          </td>
        <td>&nbsp;</td>
        <td><ul>
          <li><a href="../../FusionCharts_XT_Evaluation/Code/PHP/ArrayExample/Combination.php">Registro Por Genero</a></li>
          <li><a href="../../FusionCharts_XT_Evaluation/Code/PHP/ArrayExample/Combination_1.php">Estado Usuarios </a></li>
          <li><a href="generador_informes.php"> Generador de Informes</a></li>
          
        </ul></td>
      </tr>
      
     
</table>


<?php include("includes/men.php")// Mensajes ?> 


