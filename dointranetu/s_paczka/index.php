<head>
<style>
#rcorners2 {
    border-radius: 20%;
    border: 5px solid #00305E;
    padding: 10px; 
    width: 80%;
     box-shadow:  0px 0px 5px 5px #00305E;
}
</style>
</head><body>
<?php
$d = dir(".");
$tekst="";
echo "<center><ul><div id=\"rcorners2\"><h1>Wybierz rodzinę, której chcesz pomóc</h1><br/> ";
while (false !== ($entry = $d->read())) {
	if  (!( strpos($entry,".php") ) xor strlen($entry)<4  ){
           $tekst= $entry;
           $tekst=ucfirst($tekst);
   echo "<a href='{$entry}'><h1> {$tekst}</h1></a>";
	}
}
echo "</div></ul>";
$d->close();
?>
