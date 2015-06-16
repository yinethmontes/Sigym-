<?php 
include("includes/conexion.php"); 

include("includes/func.php");

function pintarGrilla($cont,$row){

 		echo "<row id='". $cont."'>"; 	
		echo "<cell>".$cont."</cell>"; 
		echo "<cell>". $row[EJERCICIO]."</cell>"; 
		echo "<cell>". $row[MAQUINA]."</cell>";  
		echo "<cell>". $row[SERIES]."</cell>"; 	
		echo "<cell>". $row[REPETICIONES]."</cell>"; 
		echo "<cell>". $row[TIEMPO]."</cell>"; 
		echo "</row>";
 }

$db = new conectar();


$tit_pag= "Plan de entrenamiento";
$nom_pag = "mi_plan_de_entrenamiento.php";

$tabla = "facultad";
$orden = "id";

$ti1 = 'PLAN DE ENTRENAMIENTO';
$ti2 = ': Lunes';
$dia =0; 

if($grilla){
	
	$page = $_POST['page']; $limit = $_POST['rows'];$sidx = $_POST['sidx']; $sord = $_POST['sord']; 

	if(!$sidx) $sidx =1; $row=$db->ver("SELECT COUNT(A.DEP_IDE) AS count FROM DEPORTISTA A, PLANENTRENAMIENTO B,DETALLEPE C, EJERCICIO D, MAQUINA E
  WHERE A.DEP_IDE = 93378156 AND
  A.DEP_IDE = B.DEP_IDE AND
  B.PLE_IDE = C.PLE_IDE AND
  C.EJE_IDE = D.EJE_IDE AND
  D.MAQ_IDE = E.MAQ_IDE ORDER BY DPE_DIA"); 
	$count = $row['count'];	
		
	if( $count >0 ){ $total_pages = ceil($count/$limit);}else{ $total_pages = 0;} 
		if ($page > $total_pages) $page=$total_pages; $start = $limit*$page - $limit;
			$que= "SELECT A.DEP_IDE AS IDENTIFICACION, DEP_NOM AS NOMBRES, DEP_APE AS APELLIDOS, B.PLE_IDE AS NUMERO_PLAN, 
			B.PLE_FEI AS FECHA_INICIO, PLE_FEF AS FECHA_FINAL, C.DPE_DIA AS DIA, C.DPE_SER AS SERIES, C.DPE_REP AS REPETICIONES, 
			C.DPE_TIE AS TIEMPO, D.EJE_NOM AS EJERCICIO, E.MAQ_NOM AS MAQUINA FROM DEPORTISTA A, PLANENTRENAMIENTO B,DETALLEPE C, 
			EJERCICIO D, MAQUINA E  WHERE A.DEP_IDE = 93378156 AND
	  		A.DEP_IDE = B.DEP_IDE AND
	  		B.PLE_IDE = C.PLE_IDE AND
	  		C.EJE_IDE = D.EJE_IDE AND
	  		D.MAQ_IDE = E.MAQ_IDE ORDER BY DPE_DIA";
			$consulta = $db->consulta($que); $i=0;  
	
			if (stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) { 
				header("Content-type: application/xhtml+xml;charset=utf-8"); 
				}
				else{ 
					header("Content-type: text/xml;charset=utf-8");
				}; 
				echo "<?xml version='1.0' encoding='utf-8'?>\n";
	
				echo "<rows>"; echo "<page>".$page."</page>"; 
				echo "<total>".$total_pages."</total>"; 
				echo "<records>".$count."</records>"; 
				$cont = 0;
	
				while($fila = $db->listar($consulta)){	
	
					$cont = $cont +1;		
				    if(1 == $fila['DIA']){
					      if($dia!= $fila['DIA']){
	
							}
					      pintarGrilla($cont,$fila);
			       $dia = $fila['DIA'];    
				   }
  
			 } 
			 echo "</rows>";	exit();

}

include("encabezado.php");
?>

<script type="text/javascript">
$().ready(function() {
	
  $("#gri1").jqGrid({
		url:'?grilla=1',		
		colNames:['Código','Ejercicio','Maquina','Series','Repeticiones','Tiempo'],
		colModel:[
			{name:'id',index:'id', width:80,align:"center"},
			{name:'EJERCICIO',index:'EJERCICIO', width:300},
			{name:'MAQUINA',index:'MAQUINA', width:250},
			{name:'SERIES',index:'SERIES', width:100,align:"center"},
			{name:'REPETICIONES',index:'REPETICIONES', width:100,align:"center"},
			{name:'TIEMPO',index:'TIEMPO', width:100,align:"center"}
		],
		sortname: 'id', caption:"Dia Lunes", 
		<?php para_gri();?>
		loadComplete: function(){ 
			<?php btn_act_gri('#gri1');?>
			<?php // btn_est_gri('#gri1',$estado,$tabla); ?>
		}		
	});
	
	 $("#gri2").jqGrid({
		url:'?grilla=2',		
		colNames:['Código','Ejercicio','Maquina','Series','Repeticiones','Tiempo'],
		colModel:[
			{name:'id',index:'id', width:80,align:"center"},
			{name:'EJERCICIO',index:'EJERCICIO', width:300},
			{name:'MAQUINA',index:'MAQUINA', width:250},
			{name:'SERIES',index:'SERIES', width:100,align:"center"},
			{name:'REPETICIONES',index:'REPETICIONES', width:100,align:"center"},
			{name:'TIEMPO',index:'TIEMPO', width:100,align:"center"}
		],
		sortname: 'id', caption:"Dia Martes", 
		<?php para_gri();?>
		loadComplete: function(){ 
			<?php btn_act_gri('#gri1');?>
			<?php // btn_est_gri('#gri1',$estado,$tabla); ?>
		}	
		
				
	});
});

</script>

<?php include("includes/men.php");?>     


<?php 
//grilla_btn('Facultad');
grilla("1");
grilla("2");
grilla("3");
?>
<br />

<?php include("piedepagina.php") ?>