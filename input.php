<?php


include_once 'stale.php';
include_once 'include/baza.php';




if( empty($_REQUEST['nazwa'])){

    

}
 else {
    
   If ((isset($_REQUEST['nazwa'])) and (!(empty($_REQUEST['nazwa'])))) $nazwa=$_REQUEST["nazwa"];
   If ((isset($_REQUEST["login"])) and (!(empty($_REQUEST["login"])))) $login=$_REQUEST["login"];
   If ((isset($_REQUEST["monitor"])) and (!(empty($_REQUEST["monitor"])))) $monitor=base64_decode($_REQUEST["monitor"]);






$database = new DB();


$database = DB::getInstance();

$insert = array(
    'nazwa' => $nazwa,
    'login' => $login,
    'monitor' => $monitor
);



$database->insert( 'inne', $insert );

 }