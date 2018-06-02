<?php
include_once 'include/header.php';
?>
<style>

td {
    border: 1px solid scrollbar;
    padding-top: 1px;
    padding-right: 10px;
    padding-bottom: 1px;
    padding-left: 10px;
}

</style>   
<?php
$contents = file_get_contents('http://nas01.war1.local:8081/');
if (strlen($contents) < 10){
echo "<h1> Serwis nie działa skontaktuj się z działem IT ";
die;    
}  

echo "Lista użytkowników <strong>Navis Works Symulate </strong> stan na dzień: ". $contents;
