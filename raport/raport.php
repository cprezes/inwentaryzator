	<?php
        
        include_once ("../stale.php");
	require_once ("phpReportGen.php");
        
	$prg = new phpReportGenerator();

If ((isset($_REQUEST["numer"])) and ( !(empty($_REQUEST["numer"]))))
    $id = $_REQUEST["numer"]; else die();

	$link= mysql_connect(DB_HOST,KONTO2,KONTO2_PASS);
	mysql_set_charset('utf8',$link);
         mysql_select_db(DB_NAME);
        $res = mysql_query("SELECT `query` FROM `zapytania` WHERE `id` =  ". $id  );
      	$res = mysql_query(mysql_fetch_assoc($res)["query"] );
	$prg->mysql_resource = $res;
        
        
        
        
	If ((isset($_REQUEST['xls'])) and ( !(empty($_REQUEST['xls'])))){
           $prg->csv();   
        }
         else {
            require  ('../include/header.php');
        echo '<link rel="stylesheet" href="../css/bootstrap.css" /> <link rel="stylesheet" href="../css/style.css" />';
             echo "<a style=' position: absolute; top: 0px; right: 10px;' href=\"javascript:history.go(-1)\">Powrót >></a> " . " <a href='". $_SERVER['PHP_SELF'] . "?xls=1&numer=$id '>Pobierz jako plik Excell</a>"  ;
          
            $prg->generateReport();  
         } 
	
        
//	                        


