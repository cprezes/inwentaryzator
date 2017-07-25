<?php
require_once '../include/baza.php';
require_once '../include/session.php';
require_once '../stale.php';
include_once '../include/header.php';
Session::init();
$galeriaDB_HOST='info';
$galeriaDB_USER= "galeria_view";
$galeriaDB_PASS= "qhNmxsszmT9gcxnu";
$galeriaDB_NAME ="intranet";
$galeriaTabela="wp_cf7dbplugin_submits";
$glegiaTabelaPliki="galeria_pliki";
$sGaleriaFormName="Konkurs_fotograficzny"; 
$sOgloszeneniaFormName="Tablica ogloszen";
?>
<style>
.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}
</style>
    <?php

$adres_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
$root_serwera = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . "/" . explode("/", $_SERVER['PHP_SELF'])[1] . "/";
$adres_tmp = basename($_SERVER['PHP_SELF']) . "?";



function prependHTTP( $m )
 {
   $mStr = $m[1].$m[2].$m[3];

   // if its an email address
   if( preg_match('#([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#', $mStr))
   {
        return "<a href=\"mailto:".$m[2].$m[3]."\" target=\"_blank\">".$m[1].$m[2].$m[3]."</a>"; 
   }
   else
   {
    $http = (!preg_match("#(https://)#", $mStr)) ? 'http://' : 'https://';
    return "<a href=\"".$http.$m[3]."\" target=\"_blank\">".$m[1].$m[2].$m[3]."</a>"; 
    }   
 }

function formatUrlsInText($text) 
{ 
   return preg_replace_callback('#(?i)(http|https)?(://)?(([-\w^@]+\.)+(net|org|edu|gov|me|com+)(?:/[^,.\s]*|))#','prependHTTP',$text);
}


function convert($size) {
    $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}