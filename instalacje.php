

<?php


include_once 'include/header.php';
include_once 'loader.php';


$adres_tmp = basename($_SERVER['PHP_SELF']) . "?";
$adres_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];





include_once 'include/key.php';
Session::set("AdresFiltru", $adres_tmp);
if ((!empty(Session::get("AdresPowrotu")))==FALSE)  Session::set("AdresPowrotu", $adres_url);
echo " <div class=\"topright\"><a href=\"". Session::get("AdresPowrotu"). "\"> Powrót >></a></div> ";
$TB_nazwa=TB_ISTAL;

$nazwa="";
$numer="";
$instalacje = "";

$data="";
$filtr = "";
$numer_ch = "";
$instalacje_ch = "";

$filtr_ch = "";

If ((isset($_REQUEST['czysc'])) and ( !(empty($_REQUEST['czysc'])))) {

    Session::set("numer", $numer);
    Session::set("instalacje", $instalacje);
   // Session::set("ip", $ip);
     
    Session::set("numer_ch", $numer_ch);
    Session::set("instalacje_ch", $instalacje_ch);
  //  Session::set("ip_ch", $ip_ch);
	
}

If ((isset($_REQUEST['nazwa'])) and ( !(empty($_REQUEST['nazwa']))))
    $numer = $_REQUEST["nazwa"];
If ((isset($_REQUEST['numer'])) and ( !(empty($_REQUEST['numer']))))
    $numer = $_REQUEST["numer"];
If ((isset($_REQUEST["login"])) and ( !(empty($_REQUEST["login"]))))
    $login = $_REQUEST["login"];
//If ((isset($_REQUEST["domena"])) and ( !(empty($_REQUEST["domena"]))))
 //   $domena = $_REQUEST["domena"];
If ((isset($_REQUEST["instalacje"])) and ( !(empty($_REQUEST["instalacje"]))))
    $instalacje = $_REQUEST["instalacje"];

if ((isset($_GET["strona"]) and ( !(empty($_GET["strona"]))))) {
    $strona = $_GET["strona"];
} else {
    $strona = 1;
}



If ((isset($_REQUEST['filtruje'])) and ( !(empty($_REQUEST['filtruje'])))) {

    $numer = trim($numer, " \t\n\r\0\x0B");


    $instalacje = str_replace("?", "#", trim($instalacje, " \t\n\r\0\x0B"));


    Session::set("numer", $numer);

    Session::set("instalacje", $instalacje);
    Session::set("numer_ch", $numer_ch);

    Session::set("instalacje_ch", $instalacje_ch);

}

$numer = Session::get("numer");
$instalacje = Session::get("instalacje");


$numer_ch = Session::get("numer_ch");
$instalacje_ch = Session::get("instalacje_ch");




if (strlen($numer) > 0)
    $filtr = $filtr . " lower(nazwa) LIKE \"%" . $numer . "%\" AND ";
if (strlen($instalacje) > 0)
    $filtr = $filtr . " lower(instalacje)  LIKE \"%" . $instalacje . "%\" AND ";
if (strlen($filtr) > 0)
    $filtr = " WHERE " . $filtr . " 1 ";



//echo $filtr. "<br/>";
$filtr= strtolower($filtr);
$database = new DB();
$database = DB::getInstance();
$query = "SELECT COUNT(*) as ile FROM `$TB_nazwa` $filtr ";
$results = $database->get_results($query);
$wierszy = floatval($results[0]['ile']);
$stron = (intval($wierszy / 100)) + 1;

$query = "SELECT * FROM `$TB_nazwa` $filtr  ORDER BY id DESC LIMIT " . ($strona - 1) * 100 . ",100 ";

$results = $database->get_results($query);
echo "<p>" ;
include 'paginacja.php';
echo "</p><div>    <table class=\"table table-bordered table-hover table-condensed \" style=\ width: 100%;\" >       
                <thead style=\"  white-space: nowrap; \"><tr><th>Nazwa<a href = \"unique.php?unike=nazwa&inne=1\">[U]</a></th>
                <th>Programy</a></th>
                <th>Data</th>
                <form method=\"post\" action=\"$adres_tmp\" enctype=\"multipart/form-data\"><td>"
 . "<input type=\"submit\"  class=\"btn btn-default\" value=\"czyść\">"
 . "<input type=\"hidden\" value=\"1\"  name=\"czysc\"></td></form>
            <form method=\"post\" action=\"$adres_url\" enctype=\"multipart/form-data\"></thead>"
  ?>              

<?php
echo "<tbody><tr><td><input class=\"form-control\" type=\"text\" value=\"$numer\" name=\"numer\"  class=\"inputbox\"></td>
                                <td><input class=\"form-control\" type=\"text\" value=\"$instalacje\" name=\"instalacje\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$data\"  name=\"data\"  class=\"inputbox\"></td>
                <td><input class=\"btn btn-primary\" type=\"submit\"   value=\"filtruj\">
                <input type=\"hidden\" value=\"$strona\" name=\"strona\">
            <input type=\"hidden\" value=\"1\" name=\"filtruje\"> 
            </form>";


include_once 'include/ogonki.php';
foreach ($results as $row) {
    echo "<tr><td>" . $row['nazwa'] . "</td><td><center>" . TableHelp($row['instalacje']) . '</center></td><td>'
 . $row['kiedy'] . "</td>";
}
echo '</tbody></table></div>';
?>

    </body>
