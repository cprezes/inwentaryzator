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
$sFormName="Konkurs_fotograficzny"; 

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
