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

If ((isset($_REQUEST['odczyt'])) and ( !(empty($_REQUEST['odczyt']))) and ( $_REQUEST["odczyt"] == "tak")) {
    If ((isset($_REQUEST['dane'])) and ( !(empty($_REQUEST['dane'])))) {

        $dane = $_REQUEST["dane"];
        $dane = strrev($dane);
        $dane = base64_decode($dane);
        if ($dane == date("Y/m/d")) {
            $oBaza = new DB();

            $query = 'select  hex(CONCAT(token,"=",hash)) as link , UNHEX(path) as path ,  TIMESTAMPDIFF(DAY,NOW(),timestamp)+30 as aktywny_jeszcze ,  DATE_ADD(timestamp , INTERVAL 30 DAY) as timestamp  from `instalator_dane` ORDER BY timestamp DESC';
            $aResults = $oBaza->get_results($query);
            foreach ($aResults as $value => $row) {

                echo "[ile dni jeszcze aktywny]=> " . $row["aktywny_jeszcze"] . "@CRLF[link] => DO" .
                date_parse($row["timestamp"])["year"] . "/" . date_parse($row["timestamp"])["month"] . "/" . date_parse($row["timestamp"])["day"] .
                "__" . end((explode('\\', $row["path"]))) . ">" . $row["link"] . "@CRLF[path] => " . $row["path"] . "@CRLF ----------- @CRLF @CRLF";
            }
        }
    }
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
    $kolumny = [ "token", "hash", "path", "user_data", "dni", "timestamp"];
    $oBaza = new DB();
    if (count($kolumny) > $kolumna and 0 < intval($kolumna)) {

        $sql = "SELECT $kolumny[$kolumna] FROM instalator_dane WHERE token='$sToken' and hash='$sHash' ORDER BY timestamp DESC LIMIT 1";
        $aResults = $oBaza->get_row($sql);
        echo ($aResults[0]);
    } elseif ($kolumna == 11 || $kolumna = 13) {
        $kolumna = $kolumna - 10;
        $sql = "SELECT $kolumny[$kolumna] FROM instalator_dane WHERE token='$sToken' and hash='$sHash' ORDER BY timestamp DESC LIMIT 1";
        $aResults = $oBaza->num_rows($sql);
        if ($aResults > 0) {
            $sql = "SELECT $kolumny[$kolumna] FROM instalator_dane  ORDER BY timestamp DESC LIMIT 1";
            $aResults = $oBaza->get_row($sql);
            echo ($aResults[0]);
        }
    } else {
        echo base64_encode(rand(6546823546, 3456846563213548));
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
