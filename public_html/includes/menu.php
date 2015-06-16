<div>
<?php if ($_SESSION["tipo_u"] == "1") {	?>
<ul class="topnav" style="font-size:11px;">    
	<li><a href="menu.php">Inicio</a></li>
    <li>
    	<a href="#">Ubicaciones</a>
        <ul class="subnav">
			<!--
            <li><a href="#">Departamentos</a></li>           
			<li><a href="#">Municipios</a></li> -->
			<li><a href="regional.php">Regional</a></li>
            <li><a href="centros.php">Centros</a></li>
            <li><a href="grupos.php">Grupos</a></li>
        </ul>
    </li>
	<li>
    	<a href="#">Gestión de Prestamos</a>
        <ul class="subnav">
		<!--
            <li><a href="#">Prestamos</a></li>           
			<li><a href="#">Movimientos</a></li>-->
			<li><a href="tipo_movimiento.php">Tipos de Movimientos</a></li>
        </ul>
    </li>
	<li>
    	<a href="#">Gestión de Equipo</a>
        <ul class="subnav">
            <li><a href="equipos.php">Equipos</a></li>           
			<li><a href="marcas.php">Marcas de Equipos</a></li>
			<li><a href="estado_equipo.php">Estado de Equipos</a></li>
        </ul>
    </li>
	<li><a href="rack.php">Racks</a>
	<li><a href="usuarios.php">Usuarios</a>        
    <li><a href="perfil.php">Perfil</a>          
</ul>
<?php 
}
if ($_SESSION["tipo_u"] == "2") {	?>
<ul class="topnav" style="font-size:11px;">    
	<li><a href="menu.php">Inicio</a></li>
	<li><a href="estudiantes.php">Mis Estudiantes</a></li>
	<!--
	<li>
    	<a href="#">Gestión de Prestamos</a>
        <ul class="subnav">
            <li><a href="#">Prestamos</a></li>           
			<li><a href="#">Movimientos</a></li>
        </ul>
    </li>
	<li><a href="#">Ver Equipos</a>-->
    <li><a href="perfil.php">Perfil</a>          
</ul>
<?php 
}
if ($_SESSION["tipo_u"] == "3") {	?>
<ul class="topnav" style="font-size:11px;">    
	<li><a href="menu.php">Inicio</a></li>
	<li><a href="ver_rack.php">Ver Racks</a>
	<li><a href="ver_reservas.php">Ver Reservas</a>
	<li><a href="retiros.php">Retirar Portatil</a>
    <li><a href="perfil.php">Perfil</a>          
</ul>
<?php }?>

</div>