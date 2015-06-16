<?php 
//FUNCIONES

//Obtine los datos enviados por POST o GET
foreach($_POST as $nombre_campo => $valor){ 
	$asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';"; 
	eval($asignacion); 
} 

foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
function select_estado($nom,$val){
	if($val=="1"){
		$act_sel = 'selected="selected"';
	}
	if($val=="0"){
		$ina_sel = 'selected="selected"';
	}
	echo '<select name="'.$nom.'" id="'.$nom.'" required>
            <option value="1" '.$act_sel.'>Activo</option>
            <option value="0" '.$ina_sel.'>Inactivo</option>
          </select>';
}
function check($nom,$val){

	if($val=="1"){
		$act_sel = 'checked="checked"';
	}else{
		$act_sel = ' ';
	}	
	echo '<input name="'.$nom.'" type="checkbox" id="'.$nom.'" value="1" '.$act_sel.' />';
}


function select($nom,$query,$val){
	$db = new conectar();
	echo '<select name="'.$nom.'" id="'.$nom.'" required>';
	echo '<option value="">Seleccione...</option>';		
	$consulta = $db->consulta($query); 
  	while($row = $db->listar($consulta)){	
		if($val==$row[0]){
			echo '<option value="'.$row[0].'"  >'.utf8_encode($row[1]).'</option>';	
		}else{
			echo '<option value="'.$row[0].'"  >'.utf8_encode($row[1]).'</option>';	
		}
		
	}	
    echo '</select>';
}

function comboselect($nom,$query,$val){
	$db = new conectar();
	echo '<select name="'.$nom.'" id="'.$nom.'" required>';
	echo '<option value="">Seleccione...</option>';		
	$consulta = $db->consulta($query); 
  	while($row = $db->listar($consulta)){	
		if($val==$row[0]){
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';	
		}else{
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';	
		}
		
	}	
    echo '</select>';
}





function horas($nom,$val){
	$db = new conectar();

	echo '<select name="'.$nom.'" id="'.$nom.'">';	
	for($ii=0;$ii < 24; $ii++){
		if($ii<10){ $i2 = "0".$ii; }else{ $i2 = $ii; }
		echo '<option value="'.$i2.':00" '.$act_sel.'>'.$i2.':00</option>';
		echo '<option value="'.$i2.':30" '.$act_sel.'>'.$i2.':30</option>';			
	}	
    echo '</select>';
		  
}

function tiempo($nom,$val){
	$db = new conectar();
	
	echo '<select name="'.$nom.'" id="'.$nom.'">';	
	for($ii=2;$ii <= 5; $ii++){
		echo '<option value="'.$ii.'" '.$act_sel.'>'.$ii.' horas</option>';
	}	
echo '</select>';
		  
}
	
	
include("f_grid.php");

?>