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
include_once('include/userView.php');
require_once ("include/baza.php");

$oBaza=new DB(DB_HOST, KONTO2, KONTO2_PASS);

$res = $oBaza->get_row("SELECT `data` FROM `users` limit 1 ");

echo " Ostatnia aktualizacja =====>>> $res[0] <br>";

$queryToRun = "select opis as Imie_Nazwisko, concat( IF(MobilePhone  = OfficePhone , '', concat( OfficePhone,'<br/>') ), TRIM( LEADING '+48 ' FROM  MobilePhone)) as Telefon, LOWER(EmailAddress) as 'E-Mail', Title as Stanowisko , Department as Dział ,  StreetAddress as Adres ,CONCAT(hex(LOWER(login)), '.jpg') as Zdjęcie  from `users` where ( length(OfficePhone) > 5 or  length(MobilePhone) > 5 )and Enabled like 'True' ORDER BY 1 ASC";
$res = $oBaza->get_results($queryToRun);
$oUserView = new userView();
$oUserView->mysql_resource = $res;

//pobierz liste plików z katalogu
$target_dir = ZDJECIA_PRACOWNIKOW_FOLDER;
$files = array_diff(scandir($target_dir), array('.', '..'));
$oUserView->filesArray = $files;
$oUserView->targetDir = $target_dir;
$oUserView->filesArray = $oUserView->array_change_value_case($oUserView->filesArray);
$oUserView->generateReport();
