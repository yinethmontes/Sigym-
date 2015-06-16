<?php 
function grilla($cod){
	echo '<table border="0" align="center">
		  <tr>
			<td>
				<table id="gri'.$cod.'" align="center" class="scroll"></table>
				<div id="pag'.$cod.'" class="scroll"></div> 
			</td>
		  </tr>
		</table>
		';
}	
function grilla_btn($ti){
    /*Filtro:  
      	<input type="text" name="txt_buscar" id="txt_buscar" />
	  	<input type="submit" name="btn_buscar" id="btn_buscar" value="Buscar" />*/
	echo '<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="649">
	  </td>
      <td width="51">
	  
      	<input type="button" name="button" id="button" value="Crear '.$ti.' " onclick="location=\'?nue='.$ti.'\'" />
	  </td>
    </tr>
  </table>
		';
}

function btn_act_gri($grilla){
?>
		var ids = $("<?php echo $grilla; ?>").getDataIDs(); 
			for(var i=0;i<ids.length;i++){ 
				var cl = ids[i]; var row = jQuery("<?php echo $grilla; ?>").getRowData(cl); 				
				ed = '<a href="?mod='+cl+'" title="Modificar"><img src="images/editar2.gif" width="16" height="16" /></a>  '; 
				de = '<a href="?eli='+cl+'" title="Eliminar"><img src="images/delete.gif" width="16" height="16" onclick="return confi(\' Esta Seguro que desea eliminar el Registro ?\')"  /></a>';  
				$("<?php echo $grilla; ?>").setRowData(ids[i],{act:ed+de});
				
			}
<?php 
}	
function btn_est_gri($grilla,$estado,$tabla){
?>
	var ids = $("<?php echo $grilla; ?>").getDataIDs(); 
    for(var i=0;i<ids.length;i++){ 
        var cl = ids[i]; var row = jQuery("<?php echo $grilla; ?>").getRowData(cl);
        if(row.<?php echo $estado; ?>=="1"){
            esta = '<select name="'+cl+'" class="estad" style="font-size:10px"><option value="1" selected="selected">Activo </option><option value="0">Inactivo</option></select>';
        }else{
            esta = '<select name="'+cl+'" class="estad" style="font-size:10px"><option value="1">Activo </option><option value="0"  selected="selected">Inactivo</option></select>';
        }            
        $("<?php echo $grilla; ?>").setRowData(ids[i],{<?php echo $estado; ?>:esta}) 
    }
    $(".estad").bind("change", function() {	
        var t_name = $(this).attr("name");
		var t_valor = $(this).val();
				
		$.post("includes/f_ajax.php",
		   { action: "estado", tabla: "<?php echo $tabla; ?>", campo: "<?php echo $estado; ?>", idd: t_name, valor: t_valor },
		   function(data){ }
		); 	
        
    });		
			
<?php 
}
function para_gri(){
	echo 'rowNum:15, datatype: "xml", rowList:[5,10,15], width:700, height:\'auto\', 
		mtype: "POST", viewrecords: true, sortorder: "asc",';
}

function btn_act_gri2($grilla){
?>
		var ids = $("<?php echo $grilla; ?>").getDataIDs(); 
			for(var i=0;i<ids.length;i++){ 
				var cl = ids[i]; var row = jQuery("<?php echo $grilla; ?>").getRowData(cl); 				
				ed = '<a href="?mod='+cl+'" title="Modificar"><img src="images/image2.png" width="16" height="16" /></a>  '; 				
				$("<?php echo $grilla; ?>").setRowData(ids[i],{act:ed});
				
			}
<?php 
	}	
?>