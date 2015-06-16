<?php 
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();
//$db->permiso(1);

$tit_pag= "Orden de Mantenimiento";
$nom_pag = "ordenmantenimiento.php";

$tabla = 'ordenmantenimiento';

$ti1 = 'Ordenes de Mantenimiento';
$ti2 = 'orden de Mantenimiento';
$ti3 = 'Orden de Mantenimiento';

if(@$add){	

	if($db->consulta("INSERT INTO $tabla (TIM_IDE,OMT_DES,MAQ_IDE) VALUES ('$com_tim','$txt_des','$sel_fac')")){		
		$id = mysql_insert_id();
		if($ctr=="apli"){ 
			header("Location: ?mod=$id&men=6"); 
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
	$sel="SELECT * FROM $tabla WHERE OMT_IDE = '$mod' ";
	$row=$db->ver($sel);
}

if(@$edi){
	$sql = "update $tabla set MAQ_IDE = '$sel_fac', TIM_IDE = '$com_tim', OMT_DES = '$txt_des' WHERE OMT_IDE = $id";
	
	if($db->consulta($sql)){
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}else{ 
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}
}
if(@$eli){
	
	if($db->consulta("delete from $tabla where OMT_IDE = $eli")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }
}
	
if(@$grilla){
	
	$page = $_POST['page']; $limit = $_POST['rows'];$sidx = $_POST['sidx']; $sord = $_POST['sord']; 
	if($buscar){ $where = "AND a.MAQ_NOM LIKE '%$buscar%'"; }	
	if(!$sidx) $sidx =1; $row=$db->ver("SELECT COUNT(*) AS count FROM $tabla a, maquina b WHERE a.MAQ_IDE = b.MAQ_IDE $where"); 
	$count = $row['count'];	
		
	if( $count >0 ){ $total_pages = ceil($count/$limit);}else{ $total_pages = 0;} 
	if ($page > $total_pages) $page=$total_pages; $start = $limit*$page - $limit;
	$que= "SELECT a.ORM_NUM as id, c.TIM_NOM as tipo,a.ORM_FEC as fecha, b.MAQ_NOM as maquina 
				FROM $tabla a, maquina b, tipomantenimiento c WHERE a.MAQ_IDE = b.MAQ_IDE AND a.TIM_IDE = c.TIM_IDE $where
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
		echo "<cell>". $row[tipo]."</cell>";
		echo "<cell>". $row[fecha]."</cell>";
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
		colNames:['Número','Máquina','Tipo Mantenimiento','Fecha','Opciones'],
		colModel:[
			{name:'id',index:'id', width:40,align:"center"},
			{name:'maquina',index:'maquina', width:120},
			{name:'tipo',index:'tipo', width:80},
			{name:'fecha',index:'fecha', width:100,align:"center"},
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
	$("#fec").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
	changeMonth: true,changeYear: true,  yearRange: '2010:2020'});


	$("#form1").validate({
		rules: {
			txt_ide: "required",
			txt_nom: "required",
			sel_fac: "required"				
		},
		messages: {
			txt_ide: "Digite Codigo",
			txt_nom: "Digite Nombre",
			sel_fac: "Seleccione Facultad"
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
          <td width="31%">Máquina: </td>
          <td width="69%">
            <?php 
            $sql= mysql_query("select TIM_IDE, TIM_NOM from tipomaquina");
                echo "<select name='sel_fac' id='sel_fac'>";
                    echo "<option>Seleccione...</option>";
                while($row = mysql_fetch_array($sql)){
                    echo "<option value='".$row['TIM_IDE']."'>".$row['TIM_NOM']."</option>";
                }
                echo "</select>";
     ?>
          </td>
        </tr>
        <tr>
          <td>Tipo de Mantenimiento:</td>
          <td><?php select("com_tim","select TIM_IDE, TIM_NOM from tipomantenimiento",""); ?></td>
        </tr>
        
    
        <tr>
          <td align="left" valign="top">Descripción:</td>
          <td align="left"><textarea name="txt_des" cols="90" rows="5" id="txt_des"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
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
        <td>Máquina: </td>
        <td colspan="2"><?php select("sel_fac","select MAQ_IDE, MAQ_NOM from maquina",$row['MAQ_IDE']); ?></td>
      </tr>
      <tr>
        <td width="24%">Tipo de Mantenimiento: </td>
        <td colspan="2"><?php select("com_tim","select TIM_IDE, TIM_NOM from tipomantenimiento",$row['TIM_IDE']); ?>
		</td>
      </tr>
      
      <tr>
        <td>Descripción:</td>
        <td colspan="2"><textarea name="txt_des" cols="90" rows="5" id="txt_des"><?php echo $row['OMT_DES']?></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $row['OMT_IDE']?>" />
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
						<th>Tipo</th>
                        <th>Maquina</th>
                        <th>Opciones</th>
					</tr>
				</thead>
                <thbody>
                <?php 
                 $sql="SELECT a.OMT_IDE as id, c.TIM_NOM as tipo, b.MAQ_NOM as maquina 
				FROM ordenmantenimiento a
                INNER JOIN maquina b ON a.MAQ_IDE = b.MAQ_IDE
                INNER JOIN tipomantenimiento c ON  a.TIM_IDE = c.TIM_IDE";
                    
                    $result = mysql_query ($sql);
                    while($row = mysql_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td>";
                        echo "<td>".strtoupper(utf8_encode($row[1]))."</td>";
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