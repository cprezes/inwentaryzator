<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<?php
        include_once("stale.php");
	include_once("raport/phpReportGen.php");
        
	$prg = new phpReportGenerator();


	$link= mysql_connect(DB_HOST,KONTO2,KONTO2_PASS);
	mysql_set_charset('utf8',$link);
	mysql_select_db(DB_NAME);
        
                $res = mysql_query("SELECT `data` FROM `users` WHERE `id` = 1 " );
      echo " Ostatnia aktualizacja =====>>>". (mysql_fetch_assoc($res)["data"] ). "<br>" ;
        
        $res = mysql_query("SELECT `query` FROM `zapytania` WHERE `id` = 15 " );
      	$res = mysql_query(mysql_fetch_assoc($res)["query"] );
	$prg->mysql_resource = $res;
        
       
                echo '<link rel="stylesheet" href="css/bootstrap.css" /> <link rel="stylesheet" href="css/style.css" />';
   ?>
<style type="text/css">

table{
border-top:1px solid #000;
margin-left : auto; 
margin-right : auto; 
}
tr{
   border:1px solid #000;
   border:1px solid #000;
}
td{border:1px solid #000;}

</style>
<?php           
            $prg->generateReport();  
           