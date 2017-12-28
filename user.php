<link rel="stylesheet" href="css/bootstrap.css" /> <link rel="stylesheet" href="css/style.css" />
<style>
    input { 
        white-space: nowrap;}
    .inputItem {
        padding-left: 2px;
        padding-right: 2px;
    }

</style>

<?php
if (empty($_REQUEST['login'])) {
    $tmp = number_format(floatval(date("Ymd")) * 85061015, 0, ",", "");
    $tmp2 = substr($tmp, 10);

    If (((isset($_REQUEST['tokien'])) and ( !(empty($_REQUEST['tokien']))))) {
        $tokien = $_REQUEST["tokien"];
        if (base64_encode($tmp2) == $tokien) {

            include_once 'stale.php';
            include_once('./include/userView.php');
            require_once './include/baza.php';
            
            $query = "select lower(login) as Login , opis as Imie_Nazwisko, EmailAddress as E_mail, MobilePhone as Telefon,  case Enabled when 'True' then '' when 'False' then 'Zablokowany'  end as Czy_zablokowany ,LastLogonDate as Ostatnio_Sie_Logowal,Manager as Przelozony,CONCAT(hex(LOWER(login)), '.jpg') as Zdjęcie from users";
 
            $oBaza=new DB(DB_HOST, KONTO2, KONTO2_PASS);
            $prg = new userView();

            $res = $oBaza->get_results($query);
            
            $data=$oBaza->get_row("SELECT `data` FROM `users` limit 1");
            
            echo " Ostatnia aktualizacja =====>>>" . $data[0] . "<br>";
            
            

            $target_dir = ZDJECIA_PRACOWNIKOW_FOLDER;
            $files = array_diff(scandir($target_dir), array('.', '..'));


            $prg->mysql_resource = $res;
            $prg->allowUpload = TRUE;
            $prg->filesArray = $files;
            $prg->targetDir = $target_dir;
            $prg->filesArray = $prg->array_change_value_case($prg->filesArray);
            $prg->generateReport();
        }
    }
}
