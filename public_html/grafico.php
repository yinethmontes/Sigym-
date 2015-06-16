<?php 
include ("includes/jpgraph-3.0.7/src/jpgraph.php"); 
include ("includes/jpgraph-3.0.7/src/jpgraph_pie.php"); 
include ("includes/jpgraph-3.0.7/src/jpgraph_pie3d.php"); 

$data = array(60,60,21,13); 

$graph = new PieGraph(550,200,"auto"); 
$graph->img->SetAntiAliasing(); 
$graph->SetMarginColor('gray'); 
//$graph->SetShadow(); 

// Setup margin and titles 
$graph->title->Set("usuarios"); 

$p1 = new PiePlot3D($data); 
$p1->SetSize(0.35); 
$p1->SetCenter(0.5); 

// Setup slice labels and move them into the plot 
$p1->value->SetFont(FF_FONT1,FS_BOLD); 
$p1->value->SetColor("black"); 
$p1->SetLabelPos(0.2); 

$facultades=array("Estudiantes","Docentes","Administrativos","otros"); 
$p1->SetLegends($facultades); 

// Explode all slices 
$p1->ExplodeAll(); 

$graph->Add($p1); 
$graph->Stroke(); 
?> 


