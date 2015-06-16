<?php
require('fpdf/fpdf.php');
include("includes/conexion.php"); 
include("includes/func.php");

$db = new conectar();

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
    //Logo
    $this->Image('images/logo_ui.jpg',10,8,33);
	$this->Image('images/logo_sigym.jpg',50,10,33);
	$this->SetFont('Arial','B',12);
	$this->Cell(260,0,'Sistema de Información ',0,0,'C');
	$this->Ln(4);
	$this->Cell(260,0,'Para Administración de Gimnasios',0,0,'C');
	   
    $this->Ln(12);
	$this->Cell(45,10,'Listado de Facultades',0,0,'C');
    //Salto de línea
    $this->Ln(10);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','',8);
    //Número de página
    $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$consulta = "SELECT FAC_IDE as id, FAC_NOM as facultad FROM facultad";
$registro = mysql_query($consulta);
$cantidad = mysql_num_rows($registro);

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',7);

$pdf->Cell(10,4,'Código',1,0,'C');
$pdf->Cell(70,4,'Facultad',1,0,'C');
$pdf->Ln(4);
$color = '#C8C8C8';
$bg = '#eeeeee'; // Color de fondo
while($row = mysql_fetch_array($registro)) {
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Alterna el color de fondo.
	$pdf->SetFont('Arial','B',7);
    $pdf->Cell(10,4,$row['0'],1);
	$pdf->Cell(70,4,$row['1'],1);
    $pdf->Ln(4);
}

$pdf->Output();
?>


