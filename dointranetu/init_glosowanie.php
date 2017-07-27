<?php
require_once 'staticval.php';


    

If ((isset($_REQUEST['init'])) and ( !(empty($_REQUEST['init'])))) {
    $i = $_REQUEST["init"];

if ($i=="tak"){
   $baza = new DB();
   $baza->query("TRUNCATE TABLE `galeria_glosowanie`");
   $baza->query("TRUNCATE TABLE `galeria_pliki`");
   array_map('unlink', glob("img/*.*"));      
}    
}
