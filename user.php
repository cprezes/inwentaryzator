
<?php

include_once 'stale.php';
include_once 'include/baza.php';



if (empty($_REQUEST['login'])) {
    $tmp = number_format(floatval(date("Ymd")) * 85061015, 0, ",", "");
    $tmp2 = substr($tmp, 10);

    If ((isset($_REQUEST['tokien'])) and ( !(empty($_REQUEST['tokien'])))) {
        $tokien = $_REQUEST["tokien"];
        if (base64_encode($tmp2) == $tokien) {

echo '<link rel="stylesheet" href="css/bootstrap.css" /> <link rel="stylesheet" href="css/style.css" />';
            include_once("raport/phpReportGen.php");
            $prg = new phpReportGenerator();
            $query = "select login as Login , opis as Imie_Nazwisko, EmailAddress as E_mail, MobilePhone as Telefon, "
                    . "case Enabled when 'True' then '' when 'False' then 'Zablokowany'  end as Czy_zablokowany "
                    . ", data as Sprawdzono from users";
       
            mysql_connect(DB_HOST, KONTO2, KONTO2_PASS);
            mysql_select_db(DB_NAME);
            $res = mysql_query($query);
            $prg->mysql_resource = $res;
            $prg->generateReport();
        }
    }
}