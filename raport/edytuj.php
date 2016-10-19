
<?php
include_once '../stale.php';
include_once '../include/header.php';
include_once '../loader.php';
 echo "<a style=' position: absolute; top: 0px; right: 10px;' href=\"javascript:history.go(-1)\">Powrót >></a> "  ;
          
If ((isset($_REQUEST["numer"])) and ( !(empty($_REQUEST["numer"]))))
    $id = $_REQUEST["numer"]; else die();
echo $id;



?>

