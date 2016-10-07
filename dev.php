<?php

include_once 'include/header.php';
include_once 'loader.php';
$tmp = number_format(floatval(date("Ymd")) * 16062816, 0, ",", "");
$tmp2 = (base64_encode(substr($tmp, 10)));

Session::set("tokien", $tmp2);
 
 header("Location: kompy.php");