<?php

require_once 'staticval.php';

if ((isset($_GET["submit_time"]) and ( !(empty($_GET["submit_time"]))))) {
    $submit_time = $_GET["submit_time"];
} else {
    die;
}
if ((isset($_GET["field_name"]) and ( !(empty($_GET["field_name"]))))) {
    $field_name = $_GET["field_name"];
} else {
    die;
}



$intranetDB = new DB($galeriaDB_HOST, $galeriaDB_USER, $galeriaDB_PASS, $galeriaDB_NAME);
$komputeryDB = new DB();

$iExistValue = $komputeryDB->num_rows("SELECT submit_time FROM galeria_pliki WHERE submit_time = " . $submit_time . " and field_name = '$field_name'");

if ($iExistValue == 0) {

    $sql = "SELECT `submit_time`,`form_name`,`field_name`,`field_value`,`field_order`, `file`  FROM wp_cf7dbplugin_submits WHERE submit_time = $submit_time and field_name = \"$field_name\"";
    $results = $intranetDB->get_results($sql);

    $imagename = strtolower(preg_replace('/([^\w\d\-_]+)/', '-', base64_encode($results[0]["submit_time"] . " " . $results[0]["form_name"] . " " . $results[0]["field_name"] . " " . $results[0]["field_value"]))) . "." . substr($results[0]["field_value"], -3);

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }


    $acos = [
        "submit_time" => $results[0]["submit_time"],
        "form_name" => $results[0]["form_name"],
        "field_name" => $results[0]["field_name"],
        "field_value" => $results[0]["field_value"],
        "field_order" => $results[0]["field_order"],
        "file" => $imagename,
        "ip" => $ip
    ];
    file_put_contents("img/" . $imagename, $results[0]["file"]);

    $res1 = $komputeryDB->insert("galeria_pliki", $acos);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);


