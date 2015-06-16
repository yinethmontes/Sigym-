
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIGYM</title>
<META NAME="ROBOTS" CONTENT="noall,noindex,nofollow">
<link rel="stylesheet"href="./css/style.css"  type="text/css" media="screen" />
<link href="css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
<link href="css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/page.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<script src="js/i18n/grid.locale-sp.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="js/jquery.tablednd.js" type="text/javascript"></script>
<script src="js/ui.datepicker-es.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
<script src="js/jquery.anythingslider.js" type="text/javascript" charset="utf-8"></script>
    

<!--Código javascript Slider -->
		
<script type="text/javascript">

function formatText(index, panel) {
  return index + "";
   }

  $(function () {

      $('.anythingSlider').anythingSlider({
          easing: "easeInOutExpo",
          autoPlay: true,
          delay: 3000,
          startStopped: false,
          animationTime: 600,
          hashTags: true,
          buildNavigation: true,
          pauseOnHover: true,
          startText: "Go",
	  stopText: "Stop",
	  navigationFormatter: formatText
       });

       $("#slide-jump").click(function(e){
          $('.anythingSlider').anythingSlider(6);
          e.preventDefault();
       });

        });
</script>
	
<!--Aqui termina el código javascript  del slider -->

<style type="text/css">
<!--
.Estilo4 {font-size: 10px}
.Estilo5 {font-size: 8px}
.Estilo6 {
	color: #666666;
	font-weight: bold;
}
.Estilo11 {font-size: large}
-->
</style>
</head>

<body>

<?php 
include("includes/conexion.php"); 
include("includes/func.php");

$db = new conectar();

$tit_pag= "Inicio de Sesión";

if(@$login){
	$cla = $cla; 
	
	$sel="SELECT * FROM deportista WHERE DEP_IDE = '$usu' and DEP_CON = '$cla'";
	$row=$db->ver($sel);
	if($row){		
		$_SESSION["ide"] = $row['DEP_IDE'];
		$_SESSION["nombre"] = $row['DEP_NOM'];
		$_SESSION["apellido"] = $row['DEP_APE'];
		$_SESSION["tipousuario"] = $row['DEP_TIU'];
		
		switch($_SESSION["tipousuario"]){
		
		case 1:
			header ("Location: index_admin.php#modal1"); 
			break;
		
		case 2:
			header ("Location: index_deportista.php"); 
			break;
		default:
			  	header ("Location: template_principal.php"); 

		}
		//$_SESSION["aute"] = "1";		
		//header ("Location: facultades.php"); exit();
	}else{
		header ("Location: ?men=1"); exit();	
	}	
}
if(@$logout){
	// destruye la sessiones
	session_start();
	$_SESSION = array();
	session_destroy();
	header ("Location: template_principal.php"); exit(); //ojo_cambiar
}




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
			cla: "Por favor digite su Password"
		}
	});			
	
});
</script>

<?php include("includes/men.php")// Mensajes ?>

<div id = "wrapper">
<div id = "content";>
    
	<!--<div class="post">
		<h2 class="title">Gimnasio</h2>
       
		<div class="entry">
		  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="610" height="360">
            <param name="movie" value="images/intro.swf" />
            <param name="quality" value="high" />
            <embed src="images/intro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="616" height="360"></embed>
          </object>
		</div>-->
		
</div>
</div>
<div id ="sidebar">
<div id="conte" class="ui-widget-content ui-corner-all" style="width:90%;  margin:auto">

<h3 class="ui-widget-header ui-corner-all"><span class="footrow Estilo11">Inicio de Sesión  </span><span class="Estilo11">SIGYM</span></h3>
  <p>&nbsp;</p>
  <p><span class="Estilo4">Introduzca aquí la   información de inicio de sesión 
    y haga clic en el botón<span class="Estilo6"> Ingresar </span>que aparece a continuación. </span></p>
  <form action="" method="post" id="form1">
    <table border="0" width="71%">
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td width="32%" align="right"><strong><span class="Estilo4">Usuario</span>: </strong></td>
        <td width="13%">&nbsp;</td>
        <td width="55%" align="left"><input name="usu" type="text" id="usu" size="20" maxlength="20" /></td>
      </tr>
      <tr>
        <td align="right"><strong><span class="Estilo4">Contraseña</span>: </strong></td>
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
          
              <div align="center"> 
                <input type="submit" name="login" id="login" value="Ingresar  " />
              </div></td>
      </tr>
      <tr>
        <td height="21" colspan="3" align="right" valign="top"><span class="Estilo5"><span class="Estilo4">Para efectuar el registro <br>haga clic <s> <a href="registro.php">AQUI</a></s>
  Acercarse al Gimnasio para validar el registro</span> </span></td>
      </tr>
    </table>
  </form>
</div>
</div>
</div>

<p>
  <?php include("piedepagina.php") ?>
</p>