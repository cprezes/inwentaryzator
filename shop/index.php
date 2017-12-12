<?php
include_once '../include/header.php';


$adres_tmp = basename($_SERVER['PHP_SELF']) . "?";
$adres_url =  $_SERVER["REQUEST_URI"];

$explode= explode("/", $adres_url);
$explode= array_slice($explode, 0, -2);
$adres_url=  implode("/", $explode);
$fileUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://'. $_SERVER['HTTP_HOST'].  $adres_url;        

$contents = file_get_contents($fileUrl.'/help-tweak.php?odczyt=tak&dane=publiczne');
if (strlen($contents) < 10){
echo "<h1> Serwis nie działa skontaktuj się z działem IT ";
die;    
}  
?>
 <div class="jumbotron">
        <div class="container">
          <h1 class="display-5">Sklep z aplikacjami!</h1>
          <p>
             Poniżej znajdują się ogólna dostępne instalacje aplikacji. <br/>
Aby uruchomić  instalację  proszę użyć programu InstaTOR.exe dostępnego na dysku U:

          </p>
       
        </div>
 </div>
<?php

echo  $contents;