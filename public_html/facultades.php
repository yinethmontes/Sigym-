<?php 
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();
//$db->permiso(1);

$tit_pag= "Facultades";
$nom_pag = "facultades.php";

$tabla = "facultad";
$orden = "id";

$ti1 = 'FACULTADES';
$ti2 = 'Facultades';
$ti3 = 'Facultad';

if(@$add){	
    $sql= mysql_fetch_array(mysql_query("select max(FAC_IDE)+1 as next from facultad"));
    $next= $sql['next'];

	if($db->consulta("INSERT INTO $tabla (FAC_IDE,FAC_NOM) VALUES ('$next','$txt_nom')")){		
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
	$sel="SELECT * FROM $tabla WHERE FAC_IDE = '$mod' ";
	$row=$db->ver($sel);
}

if(@$edi){
	
	if($db->consulta("update $tabla set FAC_NOM = '$txt_nom' WHERE FAC_IDE = $id")){
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}else{ 
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}
}
if(@$eli){
	if($db->consulta("delete from $tabla where FAC_IDE = $eli")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }
}
	
if(@$grilla){
	
	$page = $_POST['page']; $limit = $_POST['rows'];$sidx = $_POST['sidx']; $sord = $_POST['sord']; 
	if($buscar){ $where = "WHERE a.FAC_NOM LIKE '%$buscar%'"; }	
	if(!$sidx) $sidx =1; $row=$db->ver("SELECT COUNT(*) AS count FROM $tabla a $where"); 
	$count = $row['count'];	
		
	if( $count >0 ){ $total_pages = ceil($count/$limit);}else{ $total_pages = 0;} 
	if ($page > $total_pages) $page=$total_pages; $start = $limit*$page - $limit;
	$que= "SELECT FAC_IDE as id, FAC_NOM as facultad FROM facultad  $where	";
	$consulta = $db->consulta($que); $i=0;  
	
	if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) { 
	header("Content-type: application/xhtml+xml;charset=utf-8"); 
	}
	else{ 
		header("Content-type: text/xml;charset=utf-8");
		}; 
	echo "<?xml version='1.0' encoding='utf-8'?>\n";
	
	echo "<rows>"; echo "<page>".$page."</page>"; 
	echo "<total>".$total_pages."</total>"; 
	echo "<records>".$count."</records>"; 
	while($row = $db->listar($consulta)){		
		echo "<row id='". $row[0]."'>"; 	
		echo "<cell id='id'>". $row[0]."</cell>"; 
		echo "<cell id='facultad'>". $row[1]."</cell>"; 
		echo "<cell></cell>"; 	
		echo "</row>"; 
	} 
	echo "</rows>";	exit();

}

include("encabezado.php");

?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_admin.php" class="btn-slide">Inicio</a>

<script type="text/javascript">
$().ready(function() {
	
  $("#gri1").jqGrid({
		url:'?grilla=1',		
		colNames:['Código','Nombre Facultad','Opciones'],
		colModel:[
			{name:'id',index:'id', width:80,align:"center"},
			{name:'facultad',index:'facultad', width:250},
			{name:'act',index:'act', width:40,align:"center", sortable:false}
		],
		sortname: 'id', caption:"Lista de <?php echo $ti2; ?>", pager: $('#pag1'),
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
			txt_nom: "required"			
		},
		messages: {
			txt_nom: "Digite Nombre de la Facultad"
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
          <td width="30%">&nbsp;</td>
          <td width="70%" colspan="2"><strong>
            <?php $consecutivo = "select count(FAC_IDE) as numero from $tabla"; $ejecuta = mysql_query($consecutivo); 
		  $row = mysql_fetch_array ($ejecuta, MYSQL_ASSOC);
		  $conse =$row['numero'];?>
          </strong></td>
        </tr>
        <tr>
          <td><div align="right">Nombre de la Facultad:</div></td>
          <td colspan="2"><input name="txt_nom" type="text" id="txt_nom" size="50" maxlength="50" required/></td>
        </tr>
        
        
        <tr>
          <td colspan="3" align="center">
          <input type="hidden" name="ctr" id="ctr" />
          <input type="submit" name="add" id="add" value="Guardar" />
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
        <td>Codigo:</td>
        <td width="80%" colspan="2"><strong><?php echo $row['FAC_IDE']?></strong></td>
      </tr>
      <tr>
        <td width="20%">Facultad:</td>
        <td colspan="2"><input name="txt_nom" type="text" id="txt_nom" value="<?php echo $row['FAC_NOM']?>" size="80" maxlength="200" /></td>
      </tr>
      
      
      
      <tr>
        <td colspan="3" align="center"><input name="id" type="hidden" id="id" value="<?php echo $row['FAC_IDE']?>" />
          <input type="hidden" name="ctr" id="ctr" />
        <input type="submit" name="edi" id="edi" value="Guardar" />
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


<?php 
/*$sql="SELECT FAC_IDE as id, FAC_NOM as facultad FROM facultad";
	echo "<div align='center'>";
	echo "<table width='80%' border='1' bordercolor='#0000FF' class='ui-widget-content'>";
    echo "<tr bgcolor='#E4B830' style='text-align:center'><td><b>Id</b></td><td><b>Fecha</b></td></tr>";
	$result = mysql_query ($sql);
    while($row = mysql_fetch_row($result)) { 


echo "<tr><td>".$row[0]."</td>";
echo "<td>".utf8_encode($row[1])."</td>";

echo"</tr>";
}
echo "</table>";
echo "<div>";*/

?>


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
                $sql="SELECT FAC_IDE as id, FAC_NOM as facultad FROM facultad";
                    
                    $result = mysql_query ($sql);
                    while($row = mysql_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td>";
                        echo "<td>".strtoupper($row[1])."</td>";
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