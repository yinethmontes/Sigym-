<?php
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	$KoolControlsFolder = "../../../../KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
	require $KoolControlsFolder."/KoolAjax/koolajax.php";
	$koolajax->scriptFolder = $KoolControlsFolder."/KoolAjax";

	require $KoolControlsFolder."/KoolPivotTable/koolpivottable.php";

	$ds = new MySQLPivotDataSource($db_con);//This $db_con link has been created inside KoolPHPSuite/Resources/runexample.php
	$ds	->select("customerName, productName, productLine, dollar_sales")
		->from("customer_product_dollarsales");
		
		
	$pivot = new KoolPivotTable("pivot");
	$pivot->scriptFolder = $KoolControlsFolder."/KoolPivotTable";
	$pivot->styleFolder = "office2007";
	$pivot->DataSource = $ds;

	//Allow sorting
	$pivot->AllowSorting = true;

	//Turn on ajax features.
	$pivot->AjaxEnabled = true;

	//Set the Width of pivot and use horizontal scrolling
	$pivot->Width = "800px";

	
	//Make the RowHeader wider.
	$pivot->Appearance->RowHeaderMinWidth = "250px";

	//Use the Prev and Next Numneric Pager
	$pivot->Pager = new PivotPrevNextAndNumericPager();

	//Turn on caching to help pivot working faster.
	$pivot->AllowCaching = true;
	
	//Data Field
	$field = new PivotSumField("dollar_sales");
	$field->Text = "Dollar Sales";
	$field->FormatString = "\${n}";
	$pivot->AddDataField($field);

	//Row Fields
	$field = new PivotField("customerName");
	$field->Text = "Customer";
	$pivot->AddRowField($field);

	//Column Fields
	$field = new PivotField("productLine");
	$field->Text = "Product Line";
	$pivot->AddColumnField($field);	
	
	//Process the pivot
	$pivot->Process();

?>

<form id="form1" method="post">
	<?php echo $koolajax->Render();?>
	
	<div style="padding-top:10px;">
		<?php echo $pivot->Render();?>
	</div>
	<div style="margin-top:10px;"><i>* <u>Note</u>:</i>Generate your own pivot table with <a style="color:#B8305E;" target="_blank" href="http://codegen.koolphp.net/pivot_table/">Code Generator</a></div>
	
	
	
</form>
