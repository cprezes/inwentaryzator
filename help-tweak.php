<?php

require_once 'stale.php';
require_once 'include/baza.php';


$aGenToken = array();
for ($i = 0; $i < 30; $i++) {
    $aGenToken[] = genToken($i);
}


If ((isset($_REQUEST['zapis'])) and ( !(empty($_REQUEST['zapis']))) and ( $_REQUEST["zapis"] == "tak")) {

    $oBaza = new DB();

    If ((isset($_REQUEST['token'])) and ( !(empty($_REQUEST['token'])))) {
        $token = $_REQUEST["token"];
    }
    If ((isset($_REQUEST['hash'])) and ( !(empty($_REQUEST['hash'])))) {
        $hash = $_REQUEST["hash"];
    }
    If ((isset($_REQUEST['path'])) and ( !(empty($_REQUEST['path'])))) {
        $path = $_REQUEST["path"];
    }
    If ((isset($_REQUEST['userdata'])) and ( !(empty($_REQUEST['userdata'])))) {
        $userData = $_REQUEST["userdata"];
    }
    If ((isset($_REQUEST['dni'])) and ( !(empty($_REQUEST['dni'])))) {
        $dni = $_REQUEST["dni"];
    }
    $variables = [
        "token" => $token,
        "hash" => $hash,
        "path" => $path,
        "user_data" => $userData,
        "dni" => $dni
    ];
    $oBaza->insert("instalator_dane", $variables);
}







If ((isset($_REQUEST['gen_token'])) and ( !(empty($_REQUEST['gen_token']))) and ( $_REQUEST["gen_token"] == "tak")) {
    echo genToken();
}



foreach ($aGenToken as $row) {
    If ((isset($_REQUEST[$row])) and ( !(empty($_REQUEST[$row])))) {
        If ((isset($_REQUEST["id"])) and ( !(empty($_REQUEST["id"])))) {
            sendData($_REQUEST[$row], $row, $_REQUEST["id"]);
            break;
        }
    }
}

function sendData($sHash, $sToken, $kolumna = 0) {
    $kolumny = [ "token", "hash", "path", "user_data ", "dni", "timestamp"];
    if (count($kolumny)>$kolumna and 0 < intval($kolumna )){
    $oBaza = new DB();
    $sql = "SELECT $kolumny[$kolumna] FROM instalator_dane WHERE token='$sToken' and hash='$sHash' LIMIT 1";
    $aResults = $oBaza->get_row($sql);
    echo ($aResults[0]);
    }  else {
      echo base64_encode( rand(6546823546, 3456846563213548));    
    }
    
}

function genToken($interval = 0) {
    $date = new DateTime(date('Y-m-d'));
    $date->sub(new DateInterval('P' . $interval . 'D'));
    $tmp = number_format(floatval($date->format("Ymd")) * 546546132, 0, ",", "");
    $tmp2 = base64_encode($tmp);
    $tmp2 = base64_encode(substr($tmp2, 11, -1));
    return substr(strtolower($tmp2), 1, 11);
}
