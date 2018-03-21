<?php

include_once '../stale.php';
include_once '../include/header.php';
include_once '../loader.php';
echo "<div class=\"text-center\"><a href=\"edytuj.php?numer=-1\"><center>Nowy raport </center></a></div><div  class=\"topright\"><a href=\"" . Session::get("AdresPowrotu") . "\"> Powrót >></a></div>";

$database = new DB();
$query = "SELECT * FROM zapytania WHERE widoczny  like '1' ORDER BY id DESC ";
$results = $database->get_results($query);
echo "<div>    <table class=\"table table-bordered table-hover table-condensed \" ><tbody>";
foreach ($results as $row) {
    echo "<tr><td>" . $row['user']  . "</td><td>" . $row['opis'] . '</td><td><a href="raport.php?numer=' . $row['id'] . '"><center> Wykonaj </center></a></td><td><a href="edytuj.php?numer=' . $row['id'] . '"><center> Edytuj </center></a></td>';
}
echo " </tbody></table></div>";
log_add("Ogladenie raportow");