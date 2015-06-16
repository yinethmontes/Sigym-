<?php 
if (isset($_GET['men'])) {
		
	switch ($_GET['men']) {
		case 1:
			$texto="Usuario o Clave Incorrecta ;Su usuario esta inactivo";
			$tipo="error";
			break;
		case 2:
			$texto="Estas intentando acceder a un lugar restringido";
			$tipo="error";
			break;
		case 3:
			$texto="Digitó mal el codigo de verificacion ";
			$tipo="error";
			break;
		case 4:
			$texto="La Clave actual es Incorrecta";
			$tipo="error";
			break;
		case 5:
			$texto="La Contraseña ha sido actualizada exitosamente";
			$tipo="info";
			break;
		case 6:
			$texto="El Registro se Creó Correctamente";
			$tipo="info";
			break;
		case 7:
			$texto="No se Creó el Registro";
			$tipo="error";
			break;
		case 8:
			$texto="El registro se Actualizó Correctamente";
			$tipo="info";
			break;
		case 9:
			$texto="No se Actualizó el Registro";
			$tipo="error";
			break;
		case 10:
			$texto="El registro se Eliminó Correctamente";
			$tipo="info";
			break;		
		case 11:
			$texto="No se Eliminó el Registro";
			$tipo="error";
			break;
		case 12:
			$texto="E-mail de respuesta enviado ";
			$tipo="info";
			break;	
		case 13:
			$texto="Error al Subir la Imagen";
			$tipo="error";
			break;	
		case 14:
			$texto="Este registro ya existe";
			$tipo="error";
			break;		
		case 15:
			$texto="La cancelación de la reserva se realizó con Exito";
			$tipo="info";
			break;	
        case 16:
			$texto="Se ha Actualizado informacion con Exito";
			$tipo="info";
			break;	
        case 17:
			$texto="No ha sido Posible actualizar la informacion";
			$tipo="error";
			break;	
		default:
			//echo "No has puesto ni uno, ni dos, ni tres";
	}
	switch ($tipo) {
		case "info":
			echo '<div id="men_info"><div class="ui-state-highlight ui-corner-all mensajes"> 
			   <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				'.$texto.'
			</div></div><br>';
			break;
		case "error":
			echo '<div id="men_error"><div class="ui-state-error ui-corner-all mensajes"> 
			   <span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
				'.$texto.'
			</div></div><br>';
			break;		
		default:
			echo $texto;

	}    
	
}
?>