<?php
include_once '../../include/header.php';
require_once '../../stale.php';
require_once '../../include/baza.php';

$adres_tmp = basename($_SERVER['PHP_SELF']) . "?";
$adres_url =  $_SERVER["REQUEST_URI"];

$explode= explode("/", $adres_url);
$explode= array_slice($explode, 0, -2);
$adres_url=  implode("/", $explode);
$fileUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://'. $_SERVER['HTTP_HOST'].  $adres_url;        

?>
<head>
<script>
  function copyToClipboard(text) {
    window.prompt("Aby skopiować nacisnij: Ctrl+C i Enter", text);
  }
</script>
<script src="link.js" ></script>

</head>
<body onload="Dodaj()">

 <div class="jumbotron">
        <div class="container">
          <h1 class="display-5">Dostępne aplikacje!</h1>
          <p>
             Poniżej znajdują się ogólna dostępne instalacje aplikacji. <br/>
Aby uruchomić  instalację  proszę użyć programu InstaTOR.exe dostępnego na dysku U:

          </p>
       
        </div>
 </div>
<?php

showInstall();

function showInstall() {
    $instlator = "u:\instalaTOR.exe";
    $oBaza = new DB();
    $query = 'select  hex(CONCAT(token,"=",hash)) as link , UNHEX(path) as path ,  TIMESTAMPDIFF(DAY,NOW(),timestamp)+dni as aktywny_jeszcze ,  DATE_ADD(timestamp , INTERVAL dni DAY) as timestamp , publiczne from `instalator_dane` ORDER BY timestamp DESC';
    $aResults = $oBaza->get_results($query);

   
        $tagTmp = "<dt>Instalacja:</dt> <dd>Skopiuj całą poniższą linijkę i wklej ją w okno instalatora.</dd>";

        foreach ($aResults as $value => $row) {
            if ($row["publiczne"] == 1) {
                $nazwaPrg = ucwords(implode(array_slice(explode(".", end((explode('\\', $row["path"])))), 0, -1)));
                   $hashInstalcji = date_parse($row["timestamp"])["year"] . "/" . date_parse($row["timestamp"])["month"] . "/" . date_parse($row["timestamp"])["day"] . "__" . end((explode('\\', $row["path"]))) . ">" . $row["link"] ;
                echo "<dl class=\"dl-horizontal , text-overflow\"> <dt > Plik aplikacji: </dt><dd><b> $nazwaPrg </b> Więcej Informacji <a href='https://www.google.pl/search?&q=$nazwaPrg' target='_blank' > tutaj</a></dd> $tagTmp</dl> <br/>";
                echo '<div class="col-xs-4"><input class="form-control" type="text"  value= "DO' .$hashInstalcji. '"/></div>';
             echo '<button type="button" class="btn btn-success" value="'.$hashInstalcji.'" onclick="copyToClipboard(this.value)"> Do skopiowania</button>  <a href="#" id="pobierz" download="instalator"> <button id="target_lnk" type="button" value="'.$instlator.'" class="btn btn-danger"  >Uruchom Instalator</button></a>  <br/> <hr>';
                
            }
        }
    
}
?>
</body>