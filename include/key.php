<?php

$token = 123456;

$tmp = number_format(floatval(date("Ymd")) * $token, 0, ",", ""); //wygeneruj własny token 
$tmp2 = substr($tmp, 10);
if (DEVELOP_VERSION == true) {
    Session::set("tokien", base64_encode($tmp2));
}  // wywal ten zapis na produkcji  
$tokien = Session::get("tokien");

If ((isset($_REQUEST['tokien'])) and ( !(empty($_REQUEST['tokien'])))) {
    $tokien = $_REQUEST["tokien"];
    Session::set("tokien", $tokien);
} else {
    $tokien = Session::get("tokien");
}
if (!(base64_encode($tmp2) == $tokien)) {
    echo "Sesja wygasła";
    die();
}