<?php 
include("includes/conexion.php");
include ("includes/jpgraph-3.0.7/src/jpgraph.php"); 
include ("includes/jpgraph-3.0.7/src/jpgraph_line.php"); 


// Some data 
$ydata = array(1,2,3,4,5,6); 

// Create the graph. These two calls are always required 
$graph = new Graph(450,250,"auto"); 
$graph->SetScale("textlin"); 
$graph->img->SetAntiAliasing(); 
$graph->xgrid->Show(); 

// Create the linear plot 
$lineplot=new LinePlot($ydata); 
$lineplot->SetColor("black"); 
$lineplot->SetWeight(2); 
//$lineplot->SetLegend("Estudiantes"); 

// Setup margin and titles 
$graph->img->SetMargin(40,20,20,40); 
$graph->title->Set("Avances"); 
$graph->xaxis->title->Set("Dias"); 
$graph->yaxis->title->Set("Ejercicios"); 
$graph->ygrid->SetFill(true,'#EFEFEF@0.5','#F9BB64@0.5'); 
//$graph->SetShadow(); 

// Add the plot to the graph 
$graph->Add($lineplot); 

// Display the graph 
$graph->Stroke(); 
?> 

