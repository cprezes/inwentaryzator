	<?php
        
        include_once ("../stale.php");
	include_once("phpReportGen.php");
        
	$prg = new phpReportGenerator();
        $prg->width = "100%";
	$prg->cellpad = "1";
	$prg->cellspace = "1";
	$prg->border = "1";
	$prg->header_color = "#555555";
	$prg->header_textcolor="#FFFFFF";
	$prg->body_alignment = "left";
	$prg->body_color = "#DDDDDD";
	$prg->body_textcolor = "black";
	$prg->surrounded = '0';

	mysql_connect(DB_HOST,KONTO2,KONTO2_PASS);
	mysql_select_db(DB_NAME);
	$res = mysql_query("select * from ". TB_KOMP . " ORDER BY id DESC LIMIT 1,100" );
	$prg->mysql_resource = $res;
	If ((isset($_REQUEST['xls'])) and ( !(empty($_REQUEST['xls'])))){
           $prg->csv();   
        }
         else {
             echo "<a style=' position: absolute; top: 0px; right: 10px;' href=\"javascript:history.go(-1)\">Powrót >></a> " . " <a href='". $_SERVER['PHP_SELF'] . "?xls=1'>Pobierz jako plik Excell</a>"  ;
            $prg->title = "Test Table";
            $prg->generateReport();  
         } 
	
        
//	                        


