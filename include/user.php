<?php

include_once '../loader.php';

include_once 'key.php';

If ((isset($_REQUEST['login'])) and ( !(empty($_REQUEST['login']))))
    $login = $_REQUEST["login"]; else die(); 

$database = new DB();
$query = "SELECT `users`.`opis` as 'opis', `users`.`OfficePhone` as 'telefon' "
        . "FROM "
        . "`users`, `komputery` "
        . "WHERE "
        . "LOWER(`users`.`login`)= LOWER(`komputery`.`login`) "
        . "and LOWER(`users`.`login`) = LOWER(\"$login\") LIMIT 1 ";
$results = $database->get_results($query); 

if  (@strlen($results[0]["opis"])> 1) {
       echo     trim ( $results[0]["opis"] , " \t\n\r\0\x0B" ) ." [". trim ( $results[0]["telefon"] , " \t\n\r\0\x0B" )."]" ;
          
             
} else {
 echo $login ;
}
