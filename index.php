<?php


include_once 'stale.php';
include_once 'include/baza.php';




if( empty($_REQUEST['nazwa'])){

    die();
}
 else {
    
   If ((isset($_REQUEST['nazwa'])) and (!(empty($_REQUEST['nazwa'])))) $nazwa=$_REQUEST["nazwa"];
   If ((isset($_REQUEST["login"])) and (!(empty($_REQUEST["login"])))) $login=$_REQUEST["login"];
   If ((isset($_REQUEST["domena"])) and (!(empty($_REQUEST["domena"])))) $domena=$_REQUEST["domena"];
   If ((isset($_REQUEST["ip"])) and (!(empty($_REQUEST["ip"])))) $ip=  base64_decode ($_REQUEST["ip"]);
   If ((isset($_REQUEST["mac"])) and (!(empty($_REQUEST["mac"])))) $mac=$_REQUEST["mac"];
   If ((isset($_REQUEST["dysk"])) and (!(empty($_REQUEST["dysk"])))) $dysk=base64_decode($_REQUEST["dysk"]);
   If ((isset($_REQUEST["pamiec"])) and (!(empty($_REQUEST["pamiec"])))) $pamiec=$_REQUEST["pamiec"];
   If ((isset($_REQUEST["system"])) and (!(empty($_REQUEST["system"])))) $system=$_REQUEST["system"];
   If ((isset($_REQUEST["model"])) and (!(empty($_REQUEST["model"])))) $model=base64_decode($_REQUEST["model"]);
   If ((isset($_REQUEST["inne"])) and (!(empty($_REQUEST["inne"])))) $inne=base64_decode($_REQUEST["inne"]);
   If ((isset($_REQUEST["koment"])) and (!(empty($_REQUEST["koment"])))) $koment=$_REQUEST["koment"];





$database = new DB();


$database = DB::getInstance();

$insert = array(
    'nazwa' => $nazwa,
    'login' => $login,
    'domena' => $domena,
    'login' => $login,
    'domena' => $domena,
    'ip' => $ip,
    'mac' => $mac,
    'dysk' => $dysk,
    'pamiec' => $pamiec,
    'system' => $system,
    'model' => $model,
    'inne' => $inne,
    'koment' => $koment
);



$database->insert( 'komputery', $insert );

 }