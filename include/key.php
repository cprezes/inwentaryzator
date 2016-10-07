<?php

$tmp = number_format(floatval(date("Ymd")) * 16062816, 0, ",", "");
$tmp2 = substr($tmp, 10);
$tokien = Session::get("tokien");

If ((isset($_REQUEST['tokien'])) and ( !(empty($_REQUEST['tokien'])))) {
    $tokien = $_REQUEST["tokien"];
    Session::set("tokien", $tokien);
} else {
    $tokien = Session::get("tokien");
}
if (!(base64_encode($tmp2) == $tokien)){
    echo "Sesja wygasła";
die();}