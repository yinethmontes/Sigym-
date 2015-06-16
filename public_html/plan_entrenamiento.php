
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<?php 
include("includes/conexion.php"); 
//include("includes/segu.php");
include("includes/func.php");

$db = new conectar();
//$db->permiso(1);

$tit_pag= "Plan de Entrenamiento";
$nom_pag = "plan_entrenamiento.php";

$tabla = 'planentrenamiento';

$ti1 = 'PLAN DE ENTRENAMIENTO';
$ti2 = "Plan de Entrenamiento";
$ti3 = "Plan de Entrenamiento";

if(@$add){	
	$usu_act = trim($_SESSION["ide"]);

	if($db->consulta("INSERT INTO $tabla (PLE_FEI, PLE_FEF, PLE_OBS, DEP_IDE, ENT_IDE) VALUES ('$PLE_FEI','$PLE_FEF','$PLE_OBS','$DEP_IDE','$usu_act')")){		
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
if(@$enviar){
    
/*require("includes/class.phpmailer.php"); //or select the proper destination for this file if your page is in some   //other folder
ini_set("SMTP","ssl://smtp.gmail.com"); 
ini_set("smtp_port","465"); //No further need to edit your configuration files.
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPSecure = "ssl";
$mail->Username = "ycmontes@misena.edu.co"; //account with which you want to send mail. Or use this account. i dont care :-P
$mail->Password = "Diosesmiluzymisalvacion"; //this account's password.
$mail->Port = "465";
$mail->IsSMTP();  // telling the class to use SMTP
$rec1="y.carolina.montes@gmail.com"; //receiver. email addresses to which u want to send the mail.
$mail->AddAddress($rec1);
$mail->Subject  = "Eventbook";
$mail->Body     = "Hello hi, testing";
$mail->WordWrap = 200;
if(!$mail->Send()) {
echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo  //Fill in the document.location thing
'<script type="text/javascript">
                        if(confirm("Your mail has been sent"))
                        document.location = "/";
        </script>';
}
*/
$email_usuario_web = 'ycmontes@misena.edu.co';
$subject = 'Contacto desde la web';
$message="ejemploooo";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/plain; charset=UTF-8';
$headers[] = 'From: {$email_usuario_web}';
$headers[] = 'Reply-To: {$email_usuario_web}';
$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
mail('y.carolina.montes@gmail.com',$subject,$message,implode('\r\n',$headers));
}

if(@$mod){	
	$sel="SELECT * FROM $tabla WHERE PLE_IDE = '$mod' ";
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
	
	if($db->consulta("delete from $tabla where PRO_IDE = $eli")){
		header("Location: ?men=10"); exit();
	}else{ header("Location: ?men=11"); exit(); }
}
	
if(@$grilla){
	
	$page = $_POST['page']; $limit = $_POST['rows'];$sidx = $_POST['sidx']; $sord = $_POST['sord']; 
	if($buscar){ $where = "AND b.DEP_NOM LIKE '%$buscar%'"; }
	$sql_count = "SELECT COUNT(*) AS count FROM $tabla a, deportista b WHERE a.DEP_IDE = b.DEP_IDE $where";	
	if(!$sidx) $sidx =1; $row=$db->ver($sql_count); 
	$count = $row['count'];	
		
	if( $count >0 ){ $total_pages = ceil($count/$limit);}else{ $total_pages = 0;} 
	if ($page > $total_pages) $page=$total_pages; $start = $limit*$page - $limit;
	$que= "SELECT a.PLE_IDE as id, b.DEP_NOM as nombre, b.DEP_APE as apellido, a.PLE_FEI as inicio, a.PLE_FEF as ffinal
				FROM $tabla a, deportista b WHERE a.DEP_IDE = b.DEP_IDE $where
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
		echo "<cell>". $row[nombre]. " " .$row[apellido]."</cell>"; 
		echo "<cell>". $row[inicio]."</cell>"; 
		echo "<cell>". $row[ffinal]."</cell>"; 
		echo "<cell></cell>"; 	
		echo "</row>"; 
	} 
	echo "</rows>";	exit();
}
if(@$ajax=="1"){
	$sql = "INSERT INTO detallepe (PLE_IDE, EJE_IDE, DPE_DIA, DPE_SER, DPE_REP, DPE_TIE) 
			VALUES ('$PLE_IDE','$EJE_IDE','$DPE_DIA','$DPE_SER','$DPE_REP','$DPE_TIE')";
	if($db->consulta($sql)){		
		echo "La rutina se agrego exitosamente";
	}else{ 
		echo "hubo un error al agregar la rutina";
	}
	exit();
}
if(@$ajax=="2"){
	$sql = "delete from detallepe where DET_IDE = '$DET_IDE'";
	if($db->consulta($sql)){		
		echo "La rutina se elimino exitosamente";
	}else{ 
		echo "hubo un error al eliminar la rutina";
	}
	exit();
}

include("encabezado.php");
?>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_admin.php" class="btn-slide">Inicio</a>

<script type="text/javascript">
$().ready(function() {
	
  $("#gri1").jqGrid({
		url:'?grilla=1',		
		colNames:['Numero','Deportista','Fecha Inicio','Fecha Final',"Opciones"],
		colModel:[
			{name:'id',index:'id', width:40,align:"center"},
			{name:'nombre',index:'nombre', width:120},
			{name:'inicio',index:'inicio', width:120,align:"center"},
			{name:'ffinal',index:'ffinal', width:120,align:"center"},
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
			sel_fac: "required",
			PLE_FEI: "required",
			PLE_FEF: "required"			
		},
		messages: {
			sel_fac: "Seleccione Deportista",
			PLE_FEI: "Falta la Fecha Inicial",
			PLE_FEF: "Falta la Fecha Final"	
			
		}
	});		
	$("#PLE_FEI").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
	changeMonth: true,changeYear: true,  yearRange: '2010:2020'});	
	$("#PLE_FEF").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
	changeMonth: true,changeYear: true,  yearRange: '2010:2020'});	
	
	
});
</script> 
<?php if(@$nue){?>   
 <div id="conte" class="ui-widget-content ui-corner-all" >
    <h3 class="ui-widget-header ui-corner-all">Nuevo <?php echo $ti3 ?></h3>  
   <br /> 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="94%" border="0" align="center" id="tabla_form">
        
        
        <tr>
          <td width="23%"><div align="right">Deportista:</div></td>
          <td width="77%"><?php select("DEP_IDE","select DEP_IDE, DEP_NOM from deportista",""); ?></td>
        </tr>
        <tr>
          <td><div align="right">Fecha Inicial:</div></td>
          <td><input name="PLE_FEI" type="text" id="PLE_FEI" size="12" maxlength="10" required /></td>
        </tr>
        <tr>
          <td><div align="right">Fecha Final:</div></td>
          <td><input name="PLE_FEF" type="text" id="PLE_FEF" size="12" maxlength="10" required /></td>
        </tr>
        <tr>
          <td valign="top"><div align="right">Observaciones:</div></td>
          <td><textarea name="PLE_OBS" cols="60" rows="5" id="PLE_OBS"></textarea></td>
        </tr>
        
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
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
<script type="text/javascript">
$().ready(function() {	
		
	var $tabs = $("#tabs").tabs();
	/*Crear el Popup con sus parametros*/
	$("#dialog").dialog({
			bgiframe: true,
			autoOpen: false,
			height: 250,
			width: 450,
			modal: true,
			buttons: {
				'Guardar': function() {
					var D_EJE_IDE = $("#EJE_IDE").val();
					var D_DPE_SER = $("#DPE_SER").val();
					var D_DPE_REP = $("#DPE_REP").val();
					var D_DPE_TIE = $("#DPE_TIE").val();
					var D_PLE_IDE = $("#PLE_IDE").val();
					var D_DPE_DIA = $("#DPE_DIA").val();
					if(D_EJE_IDE==""){
						alert("Por Favor Seleccione un ejercicio");
						return false;					
					}
					
					$.post("plan_entrenamiento.php?ajax=1", 
						{EJE_IDE: D_EJE_IDE, DPE_SER:D_DPE_SER, DPE_REP:D_DPE_REP, 
						DPE_TIE:D_DPE_TIE, PLE_IDE:D_PLE_IDE, DPE_DIA:D_DPE_DIA },
						function(data){
							alert(data);								
							$('.ui-tabs-panel').load('list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia='+D_DPE_DIA);						
						});
					$(this).dialog('close');
										
				},
				'Cancelar': function() {
					$(this).dialog('close');
				}
			}
		});
	/* abre la popup para la captura de los ejercicios */
	$(".btn_ruti").live("click", function(){
		$("#EJE_IDE").val("");
		$("#DPE_SER").val("");
		$("#DPE_REP").val("");
		$("#DPE_TIE").val("");
		var dia = $(this).attr("alt");
		var ide = $(this).attr("title");
		$('#dialog').dialog('open');
		
	});
	/*Evento para eliminar una rutina*/
	$(".img_del").live("click", function(event){	
		event.preventDefault();	
		var idd = $(this).attr("id");
		var dia = $(this).attr("name");
		$.post("plan_entrenamiento.php?ajax=2", 
						{DET_IDE: idd },
						function(data){
							alert(data);								
							$('.ui-tabs-panel').load('list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia='+dia);						
						});
		
	});
	
});
</script> 
<div id="conte" class="ui-widget-content ui-corner-all" >
  <h3 class="ui-widget-header ui-corner-all">Modificar <?php echo $ti3 ?></h3>
  <br />
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="93%" border="0" align="center" id="tabla_form2">
      <tr>
        <td width="20%"><div align="right">Deportista:</div></td>
          <td width="80%"><?php
                $sql=mysql_fetch_array(mysql_query("select DEP_IDE,DEP_NOM from deportista where dep_ide='".$row['DEP_IDE']."' "));
                echo "<select name='DEP_IDE' id= 'DEP_IDE'>";
                    echo "<option value= '".$sql['DEP_IDE']."'> ".$sql['DEP_NOM']."</option>";
                echo "</select>";
              ?>
          </td>
      </tr>
        <tr>
          <td><div align="right">Fecha Inicial:</div></td>
          <td><input name="PLE_FEI" type="text" id="PLE_FEI" size="12" maxlength="10" value="<?php echo $row['PLE_FEI'] ?>" /></td>
        </tr>
        <tr>
          <td><div align="right">Fecha Final:</div></td>
          <td><input name="PLE_FEF" type="text" id="PLE_FEF" size="12" maxlength="10"  value="<?php echo $row['PLE_FEF'] ?>" /></td>
        </tr>
        <tr>
          <td valign="top"><div align="right">Observaciones:</div></td>
          <td><textarea name="PLE_OBS" cols="70" rows="5" id="PLE_OBS"><?php echo $row['PLE_OBS'] ?></textarea></td>
        </tr>
        
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
      </tr>
      
      
      
      <tr>
        <td colspan="3" align="center"><input name="id" type="hidden" id="id" value="<?php echo $row['PLE_IDE']?>" />
          <input type="hidden" name="ctr" id="ctr" />
        <input type="submit" name="edi" id="edi" value="Guardar" />
            <input type="submit" name="edi" id="edi" value="Aplicar" class="aplicar" />
            <input type="submit" name="enviar" id="enviar" value="Enviar Correo" class="enviar" />
            <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="location='?'" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><div id="tabs">
            <ul>
              <li><a href="list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia=1">Lunes</a></li>
              <li><a href="list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia=2">Martes</a></li>
              <li><a href="list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia=3">Miercoles</a></li>
			  <li><a href="list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia=4">Jueves</a></li>
			  <li><a href="list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia=5">Viernes</a></li>
			  <li><a href="list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia=6">Sabado</a></li>
			  <li><a href="list_deta_plan.php?ide=<?php echo $row['PLE_IDE'];?>&dia=7">Domingo</a></li>
            </ul>          
        </div></td>
      </tr>
    </table>
  </form>
  <br />
  <div id="dialog" title="Crear Rutina">
	<table width="280" border="0" align="center">
      <tr>
        <td width="120">Ejercicio
        <input name="PLE_IDE" type="hidden" id="PLE_IDE" value="<?php echo $row['PLE_IDE'];?>"  /> <!--Plan de entrenamiento-->
        <input name="DPE_DIA" type="hidden" id="DPE_DIA" /></td> <!--Numero del dia-->
        <td width="144"><?php select("EJE_IDE","select EJE_COD, EJE_NOM from ejercicio",""); ?></td>
      </tr>
      <tr>
        <td>Serie</td>
        <td><input name="textfield" type="text" size="6" maxlength="4" id="DPE_SER" /></td>
      </tr>
      <tr>
        <td>Repeticiones</td>
        <td><input name="textfield2" type="text" size="6" maxlength="4" id="DPE_REP" /></td>
      </tr>
      <tr>
        <td>Tiempo</td>
        <td><input name="textfield3" type="text" size="10" maxlength="20" id="DPE_TIE" /></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>	
</div>
</div>
<?php }?>   
<?php 
grilla_btn($ti3);
//grilla("1");
?>
<br />
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
	<!--<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>-->
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
	} );
    
    $("#PLE_FEI").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
	changeMonth: true,changeYear: true,  yearRange: '2010:2020'});	
	$("#PLE_FEF").datepicker({dateFormat: "yy-mm-dd",showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true,
	changeMonth: true,changeYear: true,  yearRange: '2010:2020'});	
} );

	</script>
</head>

<body class="dt-example">
	<div class="container">
		<section>
		

			<table id="example" class="display dataTable no-footer" cellspacing="0" width="100%" border="0">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Opciones</th>
					</tr>
				</thead>
                <thbody>
                <?php 
               $sql="SELECT a.PLE_IDE as id, b.DEP_NOM as nombre, b.DEP_APE as apellido, a.PLE_FEI as inicio, a.PLE_FEF as ffinal
				FROM $tabla a, deportista b WHERE a.DEP_IDE = b.DEP_IDE";
                    
                    $result = mysql_query ($sql);
                    while($row = mysql_fetch_row($result)) {
                        echo "<tr><td>".$row[0]."</td>";
                        echo "<td>".strtoupper(utf8_encode($row[1]))."</td>";
                        echo "<td>".strtoupper(utf8_encode($row[2]))."</td>";
                     
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