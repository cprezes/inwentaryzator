<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
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
<link rel="stylesheet" href="css/bootstrap.css" /> <link rel="stylesheet" href="css/style.css" />
<?php
include_once("stale.php");;
include_once('./include/userView.php');
$prg = new userView();


$link = mysql_connect(DB_HOST, KONTO2, KONTO2_PASS);
mysql_set_charset('utf8', $link);
mysql_select_db(DB_NAME);

$res = mysql_query("SELECT `data` FROM `users` limit 1 ");
echo " Ostatnia aktualizacja =====>>>" . (mysql_fetch_assoc($res)["data"] ) . "<br>";

$queryToRun = "select opis as Imie_Nazwisko, TRIM( LEADING '+48 ' FROM  OfficePhone) as Telefon , LOWER(EmailAddress) as 'E-Mail', Title as Stanowisko , Department as Dział ,  StreetAddress as Adres ,CONCAT(hex(LOWER(login)), '.jpg') as Zdjęcie  
    from `users` where  length(OfficePhone) > 5 and Enabled like 'True' ORDER BY 1 ASC";
$res = mysql_query($queryToRun);
$prg->mysql_resource = $res;

//pobierz liste plików z katalogu
$target_dir = ZDJECIA_PRACOWNIKOW_FOLDER;
$files = array_diff(scandir($target_dir), array('.', '..'));
$prg->mysql_resource = $res;
//$prg->allowUpload=TRUE;
$prg->filesArray = $files;
$prg->targetDir = $target_dir;
$prg->filesArray = $prg->array_change_value_case($prg->filesArray);
$prg->generateReport();
