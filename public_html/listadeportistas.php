<?php
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();
include("encabezado.php");
?>


<?php

if(@$eli){

if($db->consulta("update deportista set dep_esd='0' where dep_ide = $eli")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }


}

if(@$act){

if($db->consulta("update deportista set dep_esd='1' where dep_ide = $act")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }


}

?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_admin.php" class="btn-slide">Inicio</a>
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
                        <th>Modalidad</th>
                        <th>Opciones</th>
					</tr>
				</thead>
                <thbody>
                <?php 
                 $sql="SELECT A.DEP_IDE, A.DEP_NOM,A.DEP_APE,A.MOD_IDE,B.MOD_NOM,A.DEP_ESD FROM deportista A INNER JOIN modalidad B ON A.MOD_IDE=B.MOD_IDE ";
                    
                    $result = mysql_query ($sql);
                    while($row = mysql_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td>";
                        echo "<td>".strtoupper(utf8_encode($row[1]))." ".strtoupper(utf8_encode($row[2]))."</td>";
                        echo "<td>".strtoupper(utf8_encode($row[4]))."</td>";
            
                                            
                       // echo '<td><button  onclick="location=\'?mod='.$row[0].'\'">Editar</button><button onclick="location=\'?eli='.$row[0].'\'">Eliminar</button></td>';
                        if($row[5]==1)
                        echo '<td align="center"><button onclick="location=\'?eli='.$row[0].'\'">Inactivar</button></td>';
                        else
                        echo '<td align="center"><button onclick="location=\'?act='.$row[0].'\'">Activar</button></td>';    
                        echo"</tr>";
                    }
              

                ?>
                
                </thbody>
				
			</table>

			

			
		</section>
	</div>

</body>
</html> 

       
 