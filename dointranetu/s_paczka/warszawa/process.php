<?php
include("connect.php");
if($_GET['id'] and $_GET['data'] and $_GET['column'] )
{
	$id = $_GET['id'];
	$data = $_GET['data'];
        if (strlen($data) < 3) {$data="_";}
         else { $data=trim($data, "_");}
        $column =$_GET['column'];
	if(mysql_query("update  $baza set $column='$data' where lp='$id'"))
	echo 'success';
}
?>