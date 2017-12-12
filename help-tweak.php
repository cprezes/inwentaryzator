<?php

require_once 'stale.php';
require_once 'include/baza.php';

$iMaxDayActive = 90;

$aGenToken = array();
for ($i = 0; $i < $iMaxDayActive; $i++) {
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
    If ((isset($_REQUEST['publiczne'])) and ( !(empty($_REQUEST['publiczne'])))) {
        $publiczne = $_REQUEST["publiczne"];
    }
    $variables = [
        "token" => $token,
        "hash" => $hash,
        "path" => $path,
        "user_data" => $userData,
        "dni" => $dni,
        "publiczne" => $publiczne
    ];
    $oBaza->insert("instalator_dane", $variables);
}

If ((isset($_REQUEST['odczyt'])) and ( !(empty($_REQUEST['odczyt']))) and ( $_REQUEST["odczyt"] == "tak")) {
    If ((isset($_REQUEST['dane'])) and ( !(empty($_REQUEST['dane'])))) {
                
        $dane = $_REQUEST["dane"];
        $oBaza = new DB();
        $query = 'select  hex(CONCAT(token,"=",hash)) as link , UNHEX(path) as path ,  TIMESTAMPDIFF(DAY,NOW(),timestamp)+dni as aktywny_jeszcze ,  DATE_ADD(timestamp , INTERVAL dni DAY) as timestamp , publiczne from `instalator_dane` ORDER BY timestamp DESC';
        $aResults = $oBaza->get_results($query);
        
        if ($dane = "publiczne") {
        $tagTmp="  <dt>Instalacja:</dt> <dd>Skopiuj całą ponirzszą linijkę i wklej ją w okno instalatora.</dd>";
            
            foreach ($aResults as $value => $row) {
                if ($row["publiczne"] == 1) {
                    $nazwaPrg=ucwords(  implode(array_slice(explode(".", end((explode('\\', $row["path"])))),0,-1))) ;
                    echo "<dl class=\"dl-horizontal , text-overflow\"> <dt > Plik aplikacji: </dt><dd><b> $nazwaPrg </b> Więcej Informacji <a href=https://www.google.pl/search?&q=$nazwaPrg> tutaj</a></dd> $tagTmp</dl> <br/>";
                    echo "DO" . date_parse($row["timestamp"])["year"] . "/" . date_parse($row["timestamp"])["month"] . "/" . date_parse($row["timestamp"])["day"] .
                    "__" . end((explode('\\', $row["path"]))) . ">" . $row["link"] . "<br/> <hr>";
                }
            }
        } else {
            $dane = strrev($dane);
            $dane = base64_decode($dane);
            if ($dane == date("Y/m/d")) {
$tmpPubliczne = "";


                foreach ($aResults as $value => $row) {

                    if ($row["publiczne"] == 1) {
                        $tmpPubliczne = "DOSTEPNY";
                    } else {
                        $tmpPubliczne = "NIEWIDOCZNY";
                    }
                    echo "[ile dni jeszcze aktywny]=> " . $row["aktywny_jeszcze"] . "   | W sklepiku  =>>  " . $tmpPubliczne . "@CRLF[link] => DO" .
                    date_parse($row["timestamp"])["year"] . "/" . date_parse($row["timestamp"])["month"] . "/" . date_parse($row["timestamp"])["day"] .
                    "__" . end((explode('\\', $row["path"]))) . ">" . $row["link"] . "@CRLF[path] => " . $row["path"] . "@CRLF ----------- @CRLF @CRLF";
                }
            }
        }
    }
}

If ((isset($_REQUEST['gen_token'])) and ( !(empty($_REQUEST['gen_token']))) and ( $_REQUEST["gen_token"] == "tak")) {
    echo genToken();
}



If ((isset($_REQUEST['ended'])) and ( !(empty($_REQUEST['ended']))) and ( $_REQUEST["ended"] == "tak")) {
    $nazwa = "uwaga";
    $user = "uwaga";
    $program = "uwaga";
    $status = "uwaga";

    If ((isset($_REQUEST['dane'])) and ( !(empty($_REQUEST['dane'])))) {

        $oBaza = new DB();

        If ((isset($_REQUEST['nazwa'])) and ( !(empty($_REQUEST['nazwa'])))) {
            $nazwa = $_REQUEST["nazwa"];
        }
        If ((isset($_REQUEST['user'])) and ( !(empty($_REQUEST['user'])))) {
            $user = $_REQUEST["user"];
        }
        If ((isset($_REQUEST['program'])) and ( !(empty($_REQUEST['program'])))) {
            $program = $_REQUEST["program"];
        }
        If ((isset($_REQUEST['status'])) and ( !(empty($_REQUEST['status'])))) {
            $status = $_REQUEST["status"];
        }
        $variables = [
            "nazwa" => pack("H*", $nazwa),
            "user" => pack("H*", $user),
            "program" => base64_decode($program),
            "status" => pack("H*", $status)
        ];
        $oBaza->insert("instalator_log", $variables);
    }
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
