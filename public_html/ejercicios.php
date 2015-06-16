<?php 
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();
//$db->permiso(1);

$tit_pag= "Ejercicios";
$nom_pag = "ejercicios.php";

$tabla = "ejercicio";

$ti1 = 'EJERCICIOS';
$ti2 = 'Ejercicio';
$ti3 = 'Ejercicio';

if(@$add){	

    header("Content-Type: text/html;charset=utf-8");
    
    if(trim($sel_com) != trim($sel_com2)){
        if($db->consulta("INSERT INTO $tabla (EJE_NOM, EJE_DES,MOD_IDE,MAQ_IDE) VALUES                      ('".utf8_encode($txt_nom)."','".utf8_encode($txt_des)."','$mod','$sel_com')")){		
            //$id = mysql_insert_id();
            $sql=mysql_fetch_array( mysql_query("select max(EJE_COD) as ejercicio from $tabla"));
            $insert_maq_Adi= mysql_query("Insert into ejercicio_maquina (EJE_IDE,MAQ_IDE,ESTADO) VALUES ('$sql[ejercicio]','$sel_com2',1)");
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
    }else{
            header("Location: ?men=18"); 
            exit(); 
    }
}


if(@$mod){	
    $sel="SELECT * FROM $tabla WHERE EJE_COD = '$mod' ";
	$row=$db->ver($sel);
}

if(@$edi){
    header("Content-Type: text/html;charset=utf-8");	
	if($db->consulta("update $tabla set EJE_NOM = '".utf8_encode($txt_nom)."', EJE_DES = '".utf8_encode($txt_des)."', MOD_IDE = '$sel_fac', MAQ_IDE = '$sel_com',  WHERE EJE_IDE = $id")){
		if($ctr=="apli"){ header("Location: ?mod=$id&men=8"); exit(); }else{ header("Location: ?men=8"); exit(); }
	}else{ 
		if($ctr=="apli"){ header("Location: ?mod=$id&men=4"); exit(); }else{ header("Location: ?men=4"); exit(); }
	}
}
if(@$eli){
	
	if($db->consulta("delete from $tabla where EJE_COD = $eli")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }
}
	
if(@$grilla){
	
	$page = $_POST['page']; $limit = $_POST['rows'];$sidx = $_POST['sidx']; $sord = $_POST['sord']; 
	if($buscar){ $where = "AND a.EJE_NOM LIKE '%$buscar%'"; }	
	if(!$sidx) $sidx =1; $row=$db->ver("SELECT COUNT(*) AS count FROM $tabla a, modalidad b WHERE a.MOD_IDE = b.MOD_IDE $where"); 
	$count = $row['count'];	
		
	if( $count >0 ){ $total_pages = ceil($count/$limit);}else{ $total_pages = 0;} 
	if ($page > $total_pages) $page=$total_pages; $start = $limit*$page - $limit;
	$que= "SELECT a.EJE_IDE as id, a.EJE_NOM as ejercicio, b.MOD_NOM as modalidad, c.MAQ_NOM as maquina 
				FROM $tabla a, modalidad b, maquina c WHERE a.MOD_IDE = b.MOD_IDE AND a.MAQ_IDE = c.MAQ_IDE $where
				ORDER BY $sidx $sord LIMIT $start , $limit";
	$consulta = $db->consulta($que); $i=0;  
	
	if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) { 
	header("Content-type: application/xhtml+xml;charset=utf-8"); 
	}else{ header("Content-type: text/xml;charset=utf-8");}; echo "<?xml version='1.0' encoding='utf-8'?>\n";
	
	echo "<rows>"; echo "<page>".$page."</page>"; 
	echo "<total>".$total_pages."</total>"; echo "<records>".$count."</records>"; 
	while($row = $db->listar($consulta)){		
		echo "<row id='". $row[id]."'>";  		
		echo "<cell>".$row[id]."</cell>"; 
		echo "<cell>". utf8_encode($row[ejercicio])."</cell>"; 
		echo "<cell>". utf8_encode($row[modalidad])."</cell>"; 
		echo "<cell>". utf8_encode($row[maquina])."</cell>"; 
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
<a href="listados_pdf/pdf_ejercicios.php" target="_blank"><img src="images/logopdf.png" title="Exportar a PDF" border="0"/></a>
<a href="./index_admin.php"><img src="images/btnsalir.png" title="Salir" border="0"/></a> </td>
</tr>
</table>';
?>    
<script type="text/javascript">
$().ready(function() {
	
  $("#gri1").jqGrid({
		url:'?grilla=1',		
		colNames:['Código','Ejercicio','Modalidad','Máquina','Acciones'],
		colModel:[
			{name:'id',index:'id', width:40,align:"center"},
			{name:'ejercicio',index:'ejercicio', width:120},
			{name:'modalidad',index:'modalidad', width:120},
			{name:'maquina',index:'maquina', width:120},
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
			txt_nom: "required",
			sel_fac: "required",
			sel_com: "required",
            sel_com2: "EqualTo : '#sel_com'"
		},
		messages: {
			txt_nom: "Digite Nombre del Ejercicio",
			mod : "Seleccione Modalidad",
			sel_com: "Seleccione Máquina",
            sel_com2: "Seleccione una maquina diferente"
			
		}
	});			
});
</script> 
<?php if(@$nue){?>   
 <div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Nuevo <?php echo $ti3 ?></h3>  
   <br /> 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="95%" border="0" align="center" id="tabla_form">
        <tr>
          <td width="31%">&nbsp;</td>
          <td width="69%"><strong><?php /*$consecutivo = "select count(EJE_IDE) as numero from $tabla"; $ejecuta = mysql_query($consecutivo); 
		  $row = mysql_fetch_array ($ejecuta, MYSQL_ASSOC);
		  $conse =$row['numero']; echo $conse +1;*/?></strong></td>
        </tr>
        
        <tr>
          <td> Ejercicio:</td>
          <td><input name="txt_nom" type="text" id="txt_nom" size="50" maxlength="50" required /></td>
        </tr>
        <tr>
          <td>Modalidad:</td>
          <td><?php select("mod","select MOD_IDE, MOD_NOM from modalidad",""); ?></td>
        </tr>
        
        
        <tr>
          <td align="left">Máquina:</td>
          <td align="left"><?php comboselect("sel_com","select MAQ_IDE, MAQ_NOM from maquina",""); ?></td>
        </tr>
        <tr>
          <td align="left">Máquina Opcional:</td>
          <td align="left"><?php
          
                $sql_maq= mysql_query("select MAQ_IDE , MAQ_NOM from maquina");
                echo "<select id='sel_com2' name='sel_com2'>";
                while($rw = mysql_fetch_array($sql_maq)){
                    echo "<option value='".$rw['MAQ_IDE']."'>".$rw['MAQ_NOM']."</option>";
                }
                echo "</select>";
                
          ?></td>
        </tr>
        <tr>
          <td align="left" valign="top">Descripción:</td>
          <td align="left"><textarea name="txt_des" cols="70" rows="5" id="txt_des"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
          <input type="hidden" name="ctr" id="ctr" />
          <input type="submit" class ="btn btn-info" name="add" id="add" value="Guardar" />
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
        <td width="76%" colspan="2"><strong><?php echo $row['EJE_COD']?></strong></td>
      </tr>
      <tr>
        <td>Ejercicio:</td>
        <td colspan="2"><input name="txt_nom2" type="text" id="txt_nom2" value="<?php echo utf8_decode($row['EJE_NOM'])?>" size="80" maxlength="200" /></td>
      </tr>
      <tr>
        <td width="24%">Modalidad:</td>
        <td colspan="2"><?php select("sel_fac","select MOD_IDE, MOD_NOM from modalidad",$row['MOD_IDE']); ?></td>
      </tr>
      <tr>
        <td>Máquina:</td>
        <td colspan="2"><?php comboselect("sel_com","select MAQ_IDE, MAQ_NOM from maquina",$row['MAQ_IDE']); ?></td>
      </tr>
        <tr>
          <td align="left">Máquina Opcional:</td>
          <td align="left"><?php
          
                $sql_maq= mysql_query("select MAQ_IDE , MAQ_NOM from maquina");
                echo "<select id='sel_com2' name='sel_com2'>";
                while($rw = mysql_fetch_array($sql_maq)){
                    echo "<option value='".$rw['MAQ_IDE']."'>".$rw['MAQ_NOM']."</option>";
                }
                echo "</select>";
                
          ?></td>
        </tr>
      <tr>
        <td>Descripción:</td>
        <td colspan="2"><textarea name="textarea" cols="90" rows="5" id="textarea"><?php echo$row['EJE_DES']?></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><input name="id" type="hidden" id="id"  />
        <input type="hidden" name="ctr2" id="ctr2" />
        <input type="submit" name="edi2" id="edi2" value="Guardar" />
        <input type="button" name="cancelar2" id="cancelar2" value="Cancelar" onclick="location='?'" /></td>
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
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
                        <th>Modalidad</th>
                        <th>Maquina Principal</th>
                        <th>Maquina Opcional</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
					</tr>
				</thead>
                <thbody>
                <?php 
                 $sql="SELECT A.EJE_COD, A.EJE_DES, A.EJE_NOM, B.MOD_NOM, C.MAQ_NOM FROM ejercicio A INNER JOIN modalidad B ON A.MOD_IDE = B. MOD_IDE
                 INNER JOIN maquina C ON A.MAQ_IDE = C.MAQ_IDE";
                    
                    $result = mysql_query ($sql);
                    while($row = mysql_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td>";
                        echo "<td>".strtoupper (utf8_decode($row[2]))."</td>";
                        echo "<td>".strtoupper (utf8_decode($row[3]))."</td>";
                        echo "<td>".strtoupper (utf8_decode($row[4]))."</td>";
                        echo "<td>";
                        $s=mysql_query("SELECT a.EJE_IDE ,B.MAQ_NOM from ejercicio_maquina a INNER JOIN maquina B on a.MAQ_IDE = B. MAQ_IDE where EJE_IDE= '".$row[0]."'");
                            if(mysql_num_fields($s)>0){
                                $r= mysql_fetch_array($s);
                                echo $r['MAQ_NOM'];
                            }else{
                                echo "No se ciona";
                            }
                        echo "</td>";
                        echo "<td>".strtoupper (utf8_decode($row[1]))."</td>";
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