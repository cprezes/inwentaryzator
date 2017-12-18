<?php
$locInstalator='u:\instalaTOR.exe';
If ((isset($_REQUEST['id'])) and ( !(empty($_REQUEST['id']))))
    $id = $_REQUEST["id"] ;

 $aId= explode(">", $id);
$name = str_replace("/", "-", $aId[0]);
 $name = str_replace(".", "-", $name);
 var_dump($aId);
         ?>


<html>
<body onload="Dodaj()">

<script src="link.js" ></script>
<center>
    <input hidden type="text" value='"<?php echo $locInstalator. " " .$aId[1]?>"' id="target_lnk" />
<h1>
    <a href="#" id="pobierz" download="<?php echo $name; ?>">download</a></h1>
