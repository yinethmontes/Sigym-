<?php 
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();
//$db->permiso(1);

$tit_pag= "Programas";
$nom_pag = "programas.php";

$tabla = 'programa';

$ti1 = 'PROGRAMAS';
$ti2 = 'Programas';
$ti3 = 'Programa';

if(@$add){	
    $sql= mysql_fetch_array(mysql_query("select max(PRO_IDE)+1 as next from programa"));
    $next= $sql['next'];


	if($db->consulta("INSERT INTO $tabla (PRO_IDE,PRO_NOM, FAC_IDE) VALUES ('$next','$txt_nom','$sel_fac')")){		
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
	$sel="SELECT * FROM $tabla WHERE PRO_IDE = '$mod' ";
	$row=$db->ver($sel);
}

if(@$edi){
	
	if($db->consulta("update $tabla set PRO_NOM = '$txt_nom', FAC_IDE = '$sel_fac' WHERE PRO_IDE = $id")){
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}else{ 
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}
}
if(@$eli){
	
	if($db->consulta("delete from programa where PRO_IDE = $eli")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }
}
	
if(@$grilla){
	
	$page = $_POST['page']; $limit = $_POST['rows'];$sidx = $_POST['sidx']; $sord = $_POST['sord']; 
	if($buscar){ $where = "AND a.PRO_NOM LIKE '%$buscar%'"; }
	$sql_count = "SELECT COUNT(*) AS count FROM $tabla a, facultad b WHERE a.FAC_IDE = b.FAC_IDE $where";	
	if(!$sidx) $sidx =1; $row=$db->ver($sql_count); 
	$count = $row['count'];	
		
	if( $count >0 ){ $total_pages = ceil($count/$limit);}else{ $total_pages = 0;} 
	if ($page > $total_pages) $page=$total_pages; $start = $limit*$page - $limit;
	$que= "SELECT a.PRO_IDE as id, a.PRO_NOM as programa, b.FAC_NOM as facultad 
				FROM $tabla a, facultad b WHERE a.FAC_IDE = b.FAC_IDE $where
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
		echo "<cell>". utf8_encode($row[programa])."</cell>"; 
		echo "<cell>". utf8_encode($row[facultad])."</cell>"; 
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
		colNames:['Código','Nombre Programa','Facultad','Acciones'],
		colModel:[
			{name:'id',index:'id', width:40,align:"center"},
			{name:'programa',index:'programa', width:120},
			{name:'facultad',index:'facultad', width:120},
			{name:'act',index:'act', width:40,align:"center", sortable:false}
		],
		sortname: 'id', caption:"Lista de <?php echo $ti2; ?>", pager: $('#pag1'),
		<?php para_gri();?>
		loadComplete: function(){ 
			<?php btn_act_gri('#gri1');?>
			<?php //btn_est_gri('#gri1',$estado,$tabla); ?>
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
			txt_nom: "Digite Nombre del programa",
			sel_fac: "Seleccione Facultad"
		}
	});			
});
</script> 
<?php if(@$nue){?>   
 <div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Nuevo <?php echo $ti3 ?></h3>  
   <br /> 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="89%" border="0" align="center" id="tabla_form">
        
        
        <tr>
          <td width="30%"><div align="right">Nombre del Programa:</div></td>
          <td width="70%"><input name="txt_nom" type="text" id="txt_nom" size="50" maxlength="50" required/></td>
        </tr>
        
        
        <tr>
          <td align="left"><div align="right">Facultad:</div></td>
          <td align="left"><?php select("sel_fac","select FAC_IDE, FAC_NOM from facultad",""); ?></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <div align="center">
              <input type="hidden" name="ctr" id="ctr" />
              <input type="submit" name="add" id="add" value="Guardar" />
              <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='?'" />
          </div></td>
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
        <td width="80%" colspan="2"><strong><?php echo $row['PRO_IDE']?></strong></td>
      </tr>
      <tr>
        <td width="20%">Progama</td>
        <td colspan="2"><input name="txt_nom" type="text" id="txt_nom" value="<?php echo $row['PRO_NOM']?>" size="80" maxlength="200" /></td>
      </tr>
      <tr>
        <td>Facultad:</td>
        <td colspan="2"><?php select("sel_fac","select FAC_IDE, FAC_NOM from facultad",$row['FAC_IDE']); ?></td>
      </tr>
      
      
      
      <tr>
        <td colspan="3" align="center"><input name="id" type="hidden" id="id" value="<?php echo $row['PRO_IDE']?>" />
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
						<th>Programa</th>
                        <th>Facultad</th>
                        <th>Opciones</th>
					</tr>
				</thead>
                <thbody>
                <?php 
                 $sql="SELECT  a.PRO_IDE as id, a.PRO_NOM as programa, b.FAC_NOM as facultad 
				FROM programa a, facultad b WHERE a.FAC_IDE = b.FAC_IDE";
                    
                    $result = mysql_query ($sql);
                    while($row = mysql_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td>";
                        echo "<td>".strtoupper($row[1])."</td>";
                        echo "<td>".strtoupper($row[2])."</td>";                     
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