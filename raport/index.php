<?php

include_once '../stale.php';
include_once '../include/header.php';
include_once '../loader.php';
echo "<div class=\"text-center\"><a href=\"edytuj.php?numer=nowy\"><center>Nowy raport </center></a></div><div  class=\"topright\"><a href=\"" . Session::get("AdresPowrotu") . "\"> Powrót >></a></div>";

$database = new DB();
$database = DB::getInstance();
$query = "SELECT * FROM `zapytania`  ORDER BY id DESC";
$results = $database->get_results($query);
echo "<div>    <table class=\"table table-bordered table-hover table-condensed \" ><tbody>";
foreach ($results as $row) {
    echo "<tr><td>" . $row['user']  . "</td><td>" . $row['opis'] . '</td><td><a href="raport.php?numer=' . $row['id'] . '"><center> Wykonaj </center></a></td><td><a href="edytuj.php?numer=' . $row['id'] . '"><center> Edytuj </center></a></td>';
}
echo " </tbody></table></div>";