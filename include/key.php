<?php

$token = 64654654;

$tmp = number_format(floatval(date("Ymd")) * $token, 0, ",", ""); //wygeneruj własny token 
$tmp2 = substr($tmp, 10);

if (DEV == TRUE) { // wywal ten zapis na produkcji  
    Session::set("tokien", base64_encode($tmp2));
} else{
$tokien = Session::get("tokien");
}
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


