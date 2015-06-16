<?php 
setlocale(LC_ALL,'es_CO','esp_esp');
include("includes/conexion.php"); 
include("includes/func.php");

$db = new conectar();

$tit_pag= "Generador de Informes";
$nom_pag = "generador_informes.php";


$ti1 = 'GENERADOR DE INFORMES';
include("encabezado.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$tit_pag?></title>
</head>
<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />


<link href="css/estilo_menu.css" rel="stylesheet" type="text/css" />
<p class="slide"><a href="index_admin.php" class="btn-slide">Inicio</a>    
    
    <form>
    <table  width="700px" align="center" border='1'>
        <tr style="text-align:center">
            <td colspan="2"><?php echo $tit_pag?></td>
        </tr>
        <tr>
            <td>Genero</td>
            <td>
                <select name="genero" id="genero">
                    <option value="">Seleccione..</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td>Estados</td>
            <td>
                <select name="estados" id="genero">
                    <option value="">Seleccione..</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td>Programas</td>
            <td>
                <?php
                $sql= "Select * from programa";
                $result = mysql_query($sql);
                $numfil = mysql_num_rows($result);
                if($numfil>0){
                    echo "<select name='programa' id='programa'>";
                    echo '<option value="">Seleccione..</option>';
                    while($row = mysql_fetch_array($result)){
                    
                    echo "<option value='".$row['PRO_IDE']."'>".$row['PRO_NOM']."</option>";
                    
                    }
                    echo "</select>";
                }
    
                ?>
            </td>
        </tr>
        <tr>
            <td>Tipo de Deportista</td>
            <td>
                <?php
                $sql= "Select * from tipodeportista";
                $result = mysql_query($sql);
                $numfil = mysql_num_rows($result);
                if($numfil>0){
                    echo "<select name='tipodeportista' id='tipodeportista'>";
                    echo '<option value="">Seleccione..</option>';
                    while($row = mysql_fetch_array($result)){
                    
                    echo "<option value='".$row['TID_IDE']."'>".$row['TID_NOM']."</option>";
                    
                    }
                    echo "</select>";
                }
    
                ?>
            </td>
        </tr>
        
    </table>
    <br>
    <div align="center"><button id="generar" name="generar" value="1">Generar Informe</button></div>
    </form>
   
    
    <?php
    echo "<br><br><div align=center>";
    $sql="";
    if(isset($generar)==1){
     
        ?>
        <script language="javascript">
        $(document).ready(function() {
        $(".botonExcel").click(function(event) {
        $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
        $("#FormularioExportacion").submit();
        });
        });
        </script>
    
        <?php
        $sql.= "Select * from deportista a where dep_ide!=''";
        
        if($genero!=''){
          
            $sql.=" and a.dep_sex = '".$genero."'";
        }
        if($estados!=''){
            
            $sql.=" and a.dep_esd = '".$estados."'";
        }
        if($programa!=''){
           
            /*$sql. " inner join programa b on a.pro_ide = b.pro_ide
                    inner join facultad c on b.fac_ide = c.fac_ide";*/
            $sql.=" and a.pro_ide = '".$programa."'";
        }
        if($tipodeportista !=''){
            
            $sql.="and a.tid_ide = '".$tipodeportista."'";
        }
        
        $result = mysql_query($sql);
        $num_fil = mysql_num_rows($result);
        if($num_fil>0){
            echo ' <form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
                   <p>Exportar a Excel  <img src="images/logoexcel.jpg" class="botonExcel" /></p>
                   <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />';
            echo "<table id='Exportar_a_Excel' class='display' border = '1' cellspacing='0' width='70%'>";
            echo "<tr bgcolor='#14819D'>
                    <td><font color = 'white'>Id </font></td>
                    <td><font color = 'white'>Nombre </font></td>
                    <td><font color = 'white'>Programa </font></td>
                    <td><font color = 'white'>Estado </font></td>
                 </tr>";
                while($row = mysql_fetch_array($result)){
                    echo "<tr>
                        <td>".$row['DEP_IDE']."</td>
                        <td>".$row['DEP_NOM']." ".$row['DEP_APE']."</td>";
                    $sql_programa = "select * from programa where pro_ide= '".$row['PRO_IDE']."'";
                    $row_programa = mysql_fetch_array(mysql_query($sql_programa));
                    echo "<td>".utf8_encode($row_programa['PRO_NOM'])."</td>
                        <td>".($row['DEP_ESD'] == 1 ? 'Activo' : 'Inactivo')."</td>
                     </tr>";                
                }
            echo "</table>";
            echo "</form>";
        }else{
        echo "No se encuentra informacion de acuerdo a los criterios seleccionados";
        }
        
    }
    echo "</div>";

    
    ?>
    
</html>