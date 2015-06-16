<?php
//We've included ../Includes/FusionCharts.php, which contains functions
//to help us easily embed the charts.
include("../Includes/FusionCharts.php");
include("../../../../SIGYM/sigym/includes/conexion.php");
include("../../../../SIGYM/sigym/includes/func.php");

$db = new conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Estadisticas</title>
        <link href="../assets/ui/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../assets/ui/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/ui/js/lib.js"></script>
        <!--[if IE 6]>
        <script type="text/javascript" src="../assets/ui/js/DD_belatedPNG_0.0.8a-min.js"></script>

<script>
          /* select the element name, css selector, background etc */
          DD_belatedPNG.fix('img');

          /* string argument can be any CSS selector */
        </script>
        <![endif]-->

        <style type="text/css">
            h2.headline {
                font: normal 110%/137.5% "Trebuchet MS", Arial, Helvetica, sans-serif;
                padding: 0;
                margin: 25px 0 25px 0;
                color: #7d7c8b;
                text-align: center;
            }
            p.small {
                font: normal 68.75%/150% Verdana, Geneva, sans-serif;
                color: #919191;
                padding: 0;
                margin: 0 auto;
                width: 664px;
                text-align: center;
            }
        </style>
        <?php
       
        ?>
        <SCRIPT LANGUAGE="Javascript" SRC="../../FusionCharts/FusionCharts.js"></SCRIPT>

    </head>
    <BODY>

        <div id="wrapper">

            <div id="header">
                

               <div class="logo"><a class="imagelink"  href="../../../../SIGYM/sigym/index_admin.php"><img src="../../../../SIGYM/sigym/images/logo.jpg" width="150" height="53" alt="FusionCharts XT logo" /></a></div>&nbsp;&nbsp;
                <h1 class="brand-name" >&nbsp;&nbsp;&nbsp;ESTADISTICAS SIGYM</h1>
            </div>

            <div class="content-area">
                <div id="content-area-inner-main">

                    <div class="gen-chart-render">

                        <?php
                        //In this example, we plot a Combination chart from data contained
                        //in an array. The array will have three columns - first one for Quarter Name
                        //second one for sales figure and third one for quantity.


                         
                        
                        $sql="SELECT COUNT(*) AS NUM FROM deportista WHERE DEP_ESD='1'";
                        $result = mysql_query($sql);
                        $rows=mysql_fetch_array($result);
                        $ingreso_femenino=$rows['NUM'];
                        
                        $sql="SELECT COUNT(*) AS NUM FROM deportista WHERE DEP_ESD='0'";
                        $result = mysql_query($sql);
                        $rows=mysql_fetch_array($result);
                        $ingreso_masculino=$rows['NUM'];

                        //Store Quarter Name
                        $arrData[0][1] = "INACTIVOS";
                        $arrData[1][1] = "ACTIVOS";
                       
                        //Store revenue data
                        $arrData[0][2] = $ingreso_masculino;
                        $arrData[1][2] = $ingreso_femenino;
                       
                        //Store Quantity
                        $arrData[0][3] = $ingreso_masculino;
                        $arrData[1][3] = $ingreso_femenino;
                       

                        //Now, we need to convert this data into combination XML.
                        //We convert using string concatenation.
                        // $strXML - Stores the entire XML
                        // $strCategories - Stores XML for the <categories> and child <category> elements
                        // $strDataRev - Stores XML for current year's sales
                        // $strDataQty - Stores XML for previous year's sales

                        //Initialize <chart> element
                        $strXML = "<chart palette='4' caption='Registro de Usuarios por Estado' PYAxisName='' SYAxisName='' numberPrefix='' formatNumberScale='0' showValues='0' decimals='0' >";

                        //Initialize <categories> element - necessary to generate a multi-series chart
                        $strCategories = "<categories>";

                        //Initiate <dataset> elements
                        $strDataRev = "<dataset seriesName='Ingresos'>";
                        $strDataQty = "<dataset seriesName='Cantidad' parentYAxis='S'>";

                        //Iterate through the data
                        foreach ($arrData as $arSubData) {
                            //Append <category name='...' /> to strCategories
                            $strCategories .= "<category name='" . $arSubData[1] . "' />";
                            //Add <set value='...' /> to both the datasets
                            $strDataRev .= "<set value='" . $arSubData[2] . "' />";
                            $strDataQty .= "<set value='" . $arSubData[3] . "' />";
                        }

                        //Close <categories> element
                        $strCategories .= "</categories>";

                        //Close <dataset> elements
                        $strDataRev .= "</dataset>";
                        $strDataQty .= "</dataset>";

                        //Assemble the entire XML now
                        $strXML .= $strCategories . $strDataRev . $strDataQty . "</chart>";

                        //Create the chart - MS Column 3D Line Combination Chart with data contained in strXML
                        echo renderChart("../../FusionCharts/MSColumn3DLineDY.swf", "", $strXML, "productSales", 600, 300, false, false);
                        ?>
                        
                    </div>
                    <div class="clear"></div>
                    <p>&nbsp;</p>
                    <p class="small"> <!--<p class="small">This dashboard was created using FusionCharts XT, FusionWidgets v3 and FusionMaps v3 You are free to reproduce and distribute this dashboard in its original form, without changing any content, whatsoever. <br />
            &copy; All Rights Reserved</p>
          <p>&nbsp;</p>-->
                    </p>

                    <div class="underline-dull"></div>
                </div>
            </div>

            
        </div>
    </BODY>
</HTML>
