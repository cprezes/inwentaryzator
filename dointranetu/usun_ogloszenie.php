<?php
require_once 'staticval.php';
If ((isset($_REQUEST['usun'])) and ( !(empty($_REQUEST['usun'])))) {
$usun = $_REQUEST["usun"];


If ((isset($_REQUEST['email'])) and ( !(empty($_REQUEST['email'])))) {
$email = $_REQUEST["email"];
}
 else die(); 


If ((isset($_REQUEST['numer'])) and ( !(empty($_REQUEST['numer'])))) {
$numer = $_REQUEST["numer"];
}
 else die(); 


Echo ("<h1> Usunięto  $numer   $email </h1> "); 

$baza = new DB();

$wartosci = array(
    "email" => $email ,
    "numer" => $numer      
);

$baza->insert("ogloszenia_usun",$wartosci);

}
