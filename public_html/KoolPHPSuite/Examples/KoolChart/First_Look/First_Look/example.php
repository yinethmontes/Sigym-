<?php
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	$KoolControlsFolder = "../../../../KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
	require $KoolControlsFolder."/KoolAjax/koolajax.php";
	$koolajax->scriptFolder = $KoolControlsFolder."/KoolAjax";
	require $KoolControlsFolder."/KoolGrid/koolgrid.php";
	require $KoolControlsFolder."/KoolChart/koolchart.php";

	
	$ds = new MySQLDataSource($db_con);//This $db_con link has been created inside KoolPHPSuite/Resources/runexample.php
	$ds->SelectCommand = "select customerNumber,customerName from customers";

	$grid = new KoolGrid("grid");
	$grid->scriptFolder = $KoolControlsFolder."/KoolGrid";
	$grid->DataSource = $ds;
	$grid->AjaxEnabled = true;
	$grid->MasterTable->Pager = new GridPrevNextPager();
	$grid->MasterTable->Pager->ShowPageInfo = false;
	$grid->MasterTable->RowAlternative = true;
	$grid->AllowSelecting = true;
	$grid->Width = "215px";

	$column = new GridBoundColumn();
	$column->DataField = "customerName";
	$column->HeaderText = "Customers";
	$grid->MasterTable->AddColumn($column);
	
	$grid->styleFolder="sunset";
	$grid->ClientSettings->ClientEvents["OnRowSelect"] = "Handle_OnRowSelect";
	$grid->Process();
	
	if(!$koolajax->isCallback)
	{
			$_rows = $grid->GetInstanceMasterTable()->GetInstanceRows();
			$_rows[0]->Selected = true;
			$customerNumber = $_rows[0]->DataItem["customerNumber"];
	}
	else
	{
		$customerNumber = (isset($_POST["customerNumber"]))?$_POST["customerNumber"]:0; 
	}


	$_axis_items = array();
	$_series_items = array();


	$result = mysql_query("select productName, priceEach*quantityOrdered as spent from customers,orders,orderdetails,products where customers.customerNumber=orders.customerNumber and orders.orderNumber=orderdetails.orderNumber and orderdetails.productCode=products.productCode and customers.customerNumber=$customerNumber group by products.productCode limit 9");

	while($row=mysql_fetch_assoc($result))
	{
		array_push($_axis_items,$row["productName"]);
		array_push($_series_items, round($row["spent"]));
	}		

	
	if(count($_series_items)>0)
	{
	    $chart = new KoolChart("chart");
		$chart->scriptFolder=$KoolControlsFolder."/KoolChart";	
		$chart->Padding = 30;
		$chart->Height = 360;
		$chart->Width = 800;
		$chart->Legend->Appearance->Visible = false;	
		$chart->Title->Text = "Money spent per product";
	    $chart->PlotArea->XAxis->Set($_axis_items);
	    $chart->PlotArea->YAxis->LabelsAppearance->DataFormatString = "$ {0}";
	    $series = new BarSeries("");
		$series->Appearance->BackgroundColor = "#B94003";
	    $series->LabelsAppearance->DataFormatString = "$ {0}";
	    $series->TooltipsAppearance->DataFormatString = "$ {0}";
		$series->ArrayData($_series_items);
	    $chart->PlotArea->AddSeries($series);		
	}
	
?>

<form id="form1" method="post">
	<?php echo $koolajax->Render();?>
	
	<div style="padding-top:35px;float:left;">
		<script type="text/javascript">
			function Handle_OnRowSelect(sender,args)
			{
				var _row = args["Row"];
				chart_panel.attachData("customerNumber",_row.getDataItem()["customerNumber"]);
				chart_panel.update();
			}
		</script>	
		<?php echo $grid->Render();?>
	</div>
	<div style="padding-left:5px;float:left">
	<?php echo $koolajax->Render();?>
		<?php echo KoolScripting::Start();?>
			<updatepanel id="chart_panel">
				<content>					
				<![CDATA[
					<?php 
					if(count($_series_items)>0)
					{
						echo $chart->Render();					
					}
					?>
				]]>	
				</content>
				<loading image="<?php echo $KoolControlsFolder;?>/KoolAjax/loading/5.gif"/>
			</updatepanel>
		<?php echo KoolScripting::End();?>							
	</div>
	<div style="clear:both;"></div>
	
	<div><i>* <u>Note</u>:</i>Generate your own chart with <a style="color:#B8305E;" target="_blank" href="http://codegen.koolphp.net/chart/">Code Generator</a></div>

</form>
