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


            $prg = new userView();


            $link = mysql_connect(DB_HOST, KONTO2, KONTO2_PASS);
            mysql_set_charset('utf8', $link);
            mysql_select_db(DB_NAME);
            $res = mysql_query("SELECT `data` FROM `users` limit 1 ");
            echo " Ostatnia aktualizacja =====>>>" . (mysql_fetch_assoc($res)["data"] ) . "<br>";

            $query = "select lower(login) as Login , opis as Imie_Nazwisko, EmailAddress as E_mail, MobilePhone as Telefon, "
                    . "case Enabled when 'True' then '' when 'False' then 'Zablokowany'  end as Czy_zablokowany ,CONCAT(hex(LOWER(login)), '.jpg') as Zdjęcie "
                    . "from users";


            $res = mysql_query($query);



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
