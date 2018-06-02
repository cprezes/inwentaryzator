
<link rel="stylesheet" href="css/bootstrap.css" /> <link rel="stylesheet" href="css/style.css" />
<style>
    input { 
        white-space: nowrap;
    }
    .inputItem {
        padding-left: 2px;
        padding-right: 2px;
    }
    .padded{
        padding: 15px;
    }

</style>
<div class="padded">
<?php
            include_once 'stale.php';
            require_once './include/baza.php';
            require_once './include/log_add.php';
            require_once './include/session.php';


$token = 846323;

$tmp = number_format(floatval(date("Ymd")) * $token, 0, ",", ""); 
$tmp2 = substr($tmp, 10);



If ((isset($_REQUEST['token'])) and ( !(empty($_REQUEST['token'])))) {
    $tokien = $_REQUEST["token"];
    $tokien = strrev($tokien);
    $tokien = base64_decode($tokien);
    $aTokenAndLogin = explode("[+]", $tokien);
    $tokien = $aTokenAndLogin[0];
    $user = $aTokenAndLogin[1];

    Session::set("user", $user);
    Session::set("tokien", $tokien);
} else {

    $tokien = Session::get("tokien");
    $user = Session::get("user");
}


if (!($tmp2 == $tokien and strlen($user) > 1)) {

    echo "Sesja wygasła";
    die();
}

            log_add("Raport przypisania sprzetu");   
            $query = 'select t1.nazwa as Komputer,Model ,t1.login ,opis as Nazwa,Department,Title as Stanowisko,data as ostatnio_logowany,logowan
from  (
select nazwa , login,MAX(data) as data,count(login) as logowan, SUBSTRING_INDEX(SUBSTRING_INDEX(TRIM(TRIM(BOTH "|" FROM model)), "|", 2), "|", 1) as Model
from komputery 
where  data > DATE_ADD(now(), INTERVAL -4 MONTH)
group by nazwa, login
having count(login)>15 ) t1 , 
(select login,opis,Department,Title from users where Enabled like "%true%") users
where  t1.login = lower(users.login) 
order by 1';
            $oBaza = new DB(DB_HOST, KONTO2, KONTO2_PASS);
            $res = $oBaza->get_results($query);
            $oBaza->generateReport($res);

        ?></div>