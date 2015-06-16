<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tit_pag . " - " . $nom_pro ?></title>
<META NAME="ROBOTS" CONTENT="noall,noindex,nofollow">
<link rel="stylesheet"href="./css/style.css"  type="text/css" media="screen" />
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

</head>
<body>


<div id="wrapper">
  <div id="header">
	  <div id="logo"><img src="images/logo.jpg" alt="" width="297" height="79" />
	    <p>&nbsp;</p>
    </div>
	<div id="search"></div>
  </div>
<!-- end #header -->
	


    <?php if($_SESSION['ide']){ ?>
    <?php } ?>
    <div class="ui-widget" style="margin:auto; background:#FFFFFF; border:1px solid #CCCCCC; width:1024px; height:30px;" >
    <?php if($_SESSION['ide']){ ?>
<div id="conte"><h1 class="tit_cont ui-state-default"><?php echo $ti1 ?></h1></div>
<?php } ?>	
<br />