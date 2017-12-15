	<?php
        
        include_once ("../stale.php");
        require_once '../include/baza.php';
        $oDb= new DB(DB_HOST,KONTO2,KONTO2_PASS);


If ((isset($_REQUEST["numer"])) and ( !(empty($_REQUEST["numer"]))))
    $id = $_REQUEST["numer"]; else die();


       $res= $oDb->get_results("SELECT `query` FROM `zapytania` WHERE `id` =  ". $id  );
       $res= $oDb->get_results($res[0]["query"]);

        
	If ((isset($_REQUEST['xls'])) and ( !(empty($_REQUEST['xls'])))){
           $oDb->generateExcel($res);   
        }
         else {
            require  ('../include/header.php');
        echo '<link rel="stylesheet" href="../css/bootstrap.css" /> <link rel="stylesheet" href="../css/style.css" />';
             echo "<a style=' position: absolute; top: 0px; right: 10px;' href=\"javascript:history.go(-1)\">Powrót >></a> " . " <a href='". $_SERVER['PHP_SELF'] . "?xls=1&numer=$id '>Pobierz jako plik Excell</a>"  ;
          
            $oDb->generateReport($res);  
         } 
	
        
//	                        


