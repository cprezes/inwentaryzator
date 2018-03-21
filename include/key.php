<?php

$token = 16062816;

$tmp = number_format(floatval(date("Ymd")) * $token, 0, ",", ""); //wygeneruj własny token 
$tmp2 = substr($tmp, 10);

if (DEV == TRUE) { // wywal ten zapis na produkcji  
    Session::set("tokien", $tmp2);
   Session::set("user", "DEV");
}

If ((isset($_REQUEST['tokien'])) and ( !(empty($_REQUEST['tokien'])))) {
    $tokien = $_REQUEST["tokien"];
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


