<?php 


include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();
//$db->permiso(1);

$tit_pag= "Maquinas";
$nom_pag = "maquinas.php";

$tabla = 'maquina';

$ti1 = 'MAQUINAS';
$ti2 = 'Máquinas';
$ti3 = 'Máquina';

if(@$add){	

	if($db->consulta("INSERT INTO $tabla (MAQ_NOM, MAQ_DES,TIM_IDE) VALUES ('$txt_nom','$txt_des','$sel_fac')")){		
		$id = mysql_insert_id();
		if($ctr=="apli"){ 
			header("Location: ?mod=$txt_ide&men=6"); 
			exit(); 
		}else{ 
			header("Location: ?men=6"); 
			exit(); 
		}
	}else{ 
		header("Location: ?men=14"); 
		exit(); 
	}
}

if(@$mod){	
	$sel="SELECT * FROM $tabla WHERE MAQ_IDE = '$mod' ";
	$row=$db->ver($sel);
}

if(@$edi){
	
	if($db->consulta("update $tabla set MAQ_NOM = '$txt_nom', MAQ_DES = '$tex_des',TIM_IDE = '$sel_fac' WHERE MAQ_IDE = $id")){
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}else{ 
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}
}
if(@$eli){
	
	if($db->consulta("delete from $tabla where MAQ_IDE = $eli")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }
}
	
if(@$grilla){
	
	$page = $_POST['page']; $limit = $_POST['rows'];$sidx = $_POST['sidx']; $sord = $_POST['sord']; 
	if($buscar){ $where = "AND a.MAQ_NOM LIKE '%$buscar%'"; }	
	if(!$sidx) $sidx =1; $row=$db->ver("SELECT COUNT(*) AS count FROM $tabla a, tipomaquina b WHERE a.TIM_IDE = b.TIM_IDE $where"); 
	$count = $row['count'];	
		
	if( $count >0 ){ $total_pages = ceil($count/$limit);}else{ $total_pages = 0;} 
	if ($page > $total_pages) $page=$total_pages; $start = $limit*$page - $limit;
	$que= "SELECT a.MAQ_IDE as id, a.MAQ_NOM as maquina, b.TIM_NOM as tipomaquina 
				FROM $tabla a, tipomaquina b WHERE a.TIM_IDE = b.TIM_IDE $where
				ORDER BY $sidx $sord LIMIT $start , $limit";
	$consulta = $db->consulta($que); $i=0;  
	
	if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) { 
	header("Content-type: application/xhtml+xml;charset=utf-8"); 
	}else{ header("Content-type: text/xml;charset=utf-8");}; echo "<?xml version='1.0' encoding='utf-8'?>\n";
	
	echo "<rows>"; echo "<page>".$page."</page>"; 
	echo "<total>".$total_pages."</total>"; echo "<records>".$count."</records>"; 
	while($row = $db->listar($consulta)){		
		echo "<row id='". $row[id]."'>"; 	
		echo "<cell>". $row[id]."</cell>"; 
		echo "<cell>". $row[maquina]."</cell>"; 
		echo "<cell>". $row[tipomaquina]."</cell>";
		echo "<cell></cell>"; 	 
		echo "</row>"; 
	} 
	echo "</rows>";	exit();
}

include("encabezado.php");
?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_admin.php" class="btn-slide">Inicio</a>

<?PHP
echo '<p>';
echo '<p>';

echo '<table width="700px" align="center" class="ui-widget-content">
<tr class= "ui-jqgrid-labels" role ="rowheader">
<td align="right" <a href="listados_pdf/pdf_modalidades.php" target="_blank"></a>
<a href="listados_pdf/pdf_maquinas.php" target="_blank"><img src="images/logopdf.png" title="Exportar a PDF" border="0"/></a>
<a href="./index_admin.php"><img src="images/btnsalir.png" title="Salir" border="0"/></a> </td>
</tr>
</table>';?>

<script type="text/javascript">
$().ready(function() {
	
  $("#gri1").jqGrid({
		url:'?grilla=1',		
		colNames:['Código','Nombre de la Máquina','Tipo de Máquina','Opciones'],
		colModel:[
			{name:'id',index:'id', width:40,align:"center"},
			{name:'maquina',index:'maquina', width:120},
			{name:'tipomaquina',index:'tipomaquina', width:120},
			{name:'act',index:'act', width:40,align:"center", sortable:false}
		],
		sortname: 'id', caption:"Listado de <?php echo $ti2; ?>", pager: $('#pag1'),
		<?php para_gri();?>
		loadComplete: function(){ 
			<?php btn_act_gri('#gri1');?>
			<?php // btn_est_gri('#gri1',$estado,$tabla); ?>
		}		
	});
	
});
</script>
<?php include("includes/men.php");?>     
<script type="text/javascript">
$().ready(function() {	
	$("#form1").validate({
		rules: {
			txt_nom: "required",
			sel_fac: "required"				
		},
		messages: {
			txt_nom: "Digite Nombre",
			sel_fac: "Seleccione Tipo de Máquina"

		}
	});			
});
</script> 
<?php if(@$nue){?>   
 <div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Nueva <?php echo $ti3 ?></h3>  
   <br /> 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="95%" border="0" align="center" id="tabla_form">
        <tr>
          <td width="32%" valign="top">&nbsp;</td>
          <td width="68%"><strong><?php /*$consecutivo = "select count(MAQ_IDE) as numero from maquina"; $ejecuta = mysql_query($consecutivo); 
		  $row = mysql_fetch_array ($ejecuta, MYSQL_ASSOC);
		  $conse =$row['numero']; echo $conse +1;*/?></strong></td>
        </tr>
        
        <tr>
          <td><div align="right">Tipo de Máquina: </div></td>
          <td><?php 
            $sql= mysql_query("select TIM_IDE, TIM_NOM from tipomaquina");
                echo "<select name='sel_fac' id='sel_fac'>";
                while($row = mysql_fetch_array($sql)){
                    echo "<option value='".$row['TIM_IDE']."'>".$row['TIM_NOM']."</option>";
                }
                echo "</select>";
     ?>
          </td>
        </tr>
        <tr>
          <td><div align="right">Nombre de la Máquina:</div></td>
          <td><input name="txt_nom" type="text" id="txt_nom" size="50" maxlength="50" required/></td>
        </tr>
        
        
        <tr>
          <td align="left" valign="top"><div align="right">Descripción:</div></td>
          <td align="left"><textarea name="txt_des" cols="70" rows="5" id="txt_des"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
          <input type="hidden" name="ctr" id="ctr" />
          <input type="submit" name="add" id="add" value="Guardar" />
          <input type="submit" name="add" id="add" value="Aplicar" class="aplicar" />
          <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='?'" /></td>
        </tr>
      </table>
   </form>
    <br />
</div>
<?php } if(@$mod){?>
<div id="conte" class="ui-widget-content ui-corner-all" >
  <h3 class="ui-widget-header ui-corner-all">Modificar <?php echo $ti3 ?></h3>
  <br />
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="95%" border="0" align="center" id="tabla_form2">
      <tr>
        <td><div align="right">Codigo:</div></td>
        <td width="76%" colspan="2"><strong><?php echo $row['MAQ_IDE']?></strong></td>
      </tr>
      <tr>
        <td><div align="right">Tipo de Máquina: </div></td>
        <td colspan="2"><?php select("sel_fac","select TIM_IDE, TIM_NOM from tipomaquina",$row['TIM_IDE']); ?></td>
      </tr>
      <tr>
        <td width="24%"><div align="right">Nombre de la Máquina: </div></td>
        <td colspan="2"><input name="txt_nom" type="text" id="txt_nom" value="<?php echo $row['MAQ_NOM']?>" size="80" maxlength="80" /></td>
      </tr>
      <tr>
        <td valign="top"><div align="right">Descripción:</div></td>
        <td colspan="2"><textarea name="tex_des" cols="90" rows="5" id="tex_des"><?php echo$row['MAQ_DES']?></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $row['MAQ_IDE']?>" />
        <input type="hidden" name="ctr" id="ctr" />
        <input type="submit" name="edi" id="edi" value="Guardar" />
        <input type="submit" name="edi" id="edi" value="Aplicar" class="aplicar" />
        <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='?'" /></td>
      </tr>
    </table>
  </form>
  <br />
</div>
<?php }?>   
<br /><br />
<?php 
grilla_btn($ti3);
//grilla("1");
?>
<br />


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="resources/demo.css">
	<style type="text/css" class="init">

	</style>
	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">


$(document).ready(function() {
	$('#example').dataTable( {
		columnDefs: [ {
			targets: [ 0 ],
			orderData: [ 0, 1 ]
		}, {
			targets: [ 1 ],
			orderData: [ 1, 0 ]
		}, {
			targets: [ 4 ],
			orderData: [ 4, 0 ]
		} ]
        paging: false,
        searching: false
	} );
} );

	</script>
</head>

<body class="dt-example">
	<div class="container">
		<section>
		

			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Nombre</th>
                        <th>Opciones</th>
					</tr>
				</thead>
                <thbody>
                <?php 
                 $sql="SELECT a.MAQ_IDE as id, a.MAQ_NOM as maquina	FROM maquina a";
                    
                    $result = mysql_query ($sql);
                    while($row = mysql_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td>";
                        echo "<td>".strtoupper ($row[1])."</td>";
                     
                        echo '<td align="center">
                        <img src="images/editar2.gif" onclick="location=\'?mod='.$row[0].'\'" name="Editar" title="Editar">
                        <img src="images/delete.gif" onclick="location=\'?eli='.$row[0].'\'" title="Eliminar" name="Eliminar"  >
                        </td>';

                        echo"</tr>";
                    }
              

                ?>
                
                </thbody>
				
			</table>

			

			
		</section>
	</div>

</body>
</html>

<?php include("piedepagina.php") ?>