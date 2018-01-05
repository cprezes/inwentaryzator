<?php
$rodzina="Warszawa";
$baza=  strtolower($rodzina);

$con = mysql_connect("localhost","paczka","");
mysql_select_db("paczka",$con);
?>