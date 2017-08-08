<?php
require_once 'staticval.php';


    

If ((isset($_REQUEST['init'])) and ( !(empty($_REQUEST['init'])))) {
    $i = $_REQUEST["init"];

if ($i=="tak_poprosze"){
   $baza = new DB();
   $baza->query("TRUNCATE TABLE `galeria_glosowanie`");
   $baza->query("TRUNCATE TABLE `galeria_pliki`");
   array_map('unlink', glob("img/*.*"));      
   echo "<h1>Świetnie wywaliłeś wszystko gratuluje !!!!!</h1>";
}    
}
