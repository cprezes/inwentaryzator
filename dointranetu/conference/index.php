<?php
$root_serwera = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . "/" . explode("/", $_SERVER['PHP_SELF'])[1] . "/";

require_once "../../include/generateRandomString.php";
require_once "../../include/session.php";
$oSession = new Session();
$oSession->init();

if (empty($oSession ->get("pokoj"))) {
    $adresPokoju = "https://appear.in/" . generateRandomString(15, 1, 1, 1, 1);
    $oSession -> set("pokoj", $adresPokoju);
} else {
    $adresPokoju = $oSession -> get("pokoj");
}
?>
 <div class="jumbotron">
<div class="container">
    <h3>Oto adres wygenerowanego dla Ciebie pokoju</h3>
    <h2>
        <?php
        echo "<a href ='$adresPokoju' target='_blank' > $adresPokoju</a>";
        ?>

    </h2></div></div><div class="container">
<ul>
    <h4>Jak to działa</h4>
 	<li>Wejdź do pokoju </li>
        <li>Zaakceptuj udostępnianie kamery i mikrofonu </li>
 	<li>Skopuj adres pokoju </li>
 	<li>Przekaż adres swojemu rozmówcy np. za pomocą poczty lub komunikatora </li>
        <li>Prowadź rozmowę</li>
 	<br/>
        <h4>Dalsze informacje </h4>
        <li>Pokój obsługuje rozmowy audio i wideo w czasie rzeczywistym </li>
        <li>Możesz korzystać jednocześnie tyko z jednego pokoju </li>
 	<li>Pokój może mieć maksymalnie 4 jednocześnych uczestników </li>
        <li>Pamietaj, każdy może wejść do twojego pokoju jeśli zna jego adres</li>
 	<li>Jest to rozwiązanie darmowe więc w pokojach proszę nie poruszać zagadnień poufnych lub podobnych</li>
</ul></div>

    
    
    <link rel="stylesheet" href="<?php echo $root_serwera; ?>css/bootstrap.css" />



