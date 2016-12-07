

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
$wersja="";
$producent="";
$dataInst="";

$data="";
$filtr = "";
$numer_ch = "";
$instalacje_ch = "";
$wersja_ch="";
$producent_ch="";
$dataInst_ch="";
$filtr_ch = "";

If ((isset($_REQUEST['czysc'])) and ( !(empty($_REQUEST['czysc'])))) {

    Session::set("numer", $numer);
    Session::set("instalacje", $instalacje);
   // Session::set("ip", $ip);
   Session::set("wersja", $wersja);
    Session::set("producent", $producent);
     Session::set("dataInst", $dataInst);
    
     
    Session::set("numer_ch", $numer_ch);
    Session::set("instalacje_ch", $instalacje_ch);
  //  Session::set("ip_ch", $ip_ch);
   Session::set("wersja_ch", $wersja_ch);
    Session::set("producent_ch", $producent_ch);
     Session::set("dataInst_ch", $dataInst_ch);
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

If ((isset($_REQUEST["wersja"])) and ( !(empty($_REQUEST["wersja"]))))
    $wersja = $_REQUEST["wersja"];
If ((isset($_REQUEST["producent"])) and ( !(empty($_REQUEST["producent"]))))
    $producent = $_REQUEST["producent"];
If ((isset($_REQUEST["dataInst"])) and ( !(empty($_REQUEST["dataInst"]))))
    $dataInst = $_REQUEST["dataInst"];



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
   // Session::set("ip", $ip);
   Session::set("wersja", $wersja);
    Session::set("producent", $producent);
     Session::set("dataInst", $dataInst);
    
     
    Session::set("numer_ch", $numer_ch);
    Session::set("instalacje_ch", $instalacje_ch);
  //  Session::set("ip_ch", $ip_ch);
   Session::set("wersja_ch", $wersja_ch);
    Session::set("producent_ch", $producent_ch);
     Session::set("dataInst_ch", $dataInst_ch);

    
 

}

$numer = Session::get("numer");
$instalacje = Session::get("instalacje");
$wersja = Session::get("wersja");
$producent = Session::get("producent");
$dataInst = Session::get("dataInst");




$numer_ch = Session::get("numer_ch");
$instalacje_ch = Session::get("instalacje_ch");
$wersja_ch = Session::get("wersja_ch");
$producent_ch = Session::get("producent_ch");
$dataInst_ch = Session::get("dataInst_ch");




if (strlen($numer) > 0)
    $filtr = $filtr . " lower(nazwa) LIKE \"%" . $numer . "%\" AND ";
if (strlen($instalacje) > 0)
    $filtr = $filtr . " lower(AppName)  LIKE \"%" . $instalacje . "%\" AND ";
if (strlen($wersja) > 0)
    $filtr = $filtr . " lower(DisplayVersion)  LIKE \"%" . $wersja . "%\" AND ";
if (strlen($dataInst) > 0)
    $filtr = $filtr . " lower(InstallDate)  LIKE \"%" . $dataInst . "%\" AND ";
if (strlen($producent) > 0)
    $filtr = $filtr . " lower(Publisher)  LIKE \"%" . $producent . "%\" AND ";
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
                <th>Nazwa aplikacji</th><th>Wersja</th><th>Producent</th><th>DataInstalacji</th>
                <th>Data</th>
                <form method=\"post\" action=\"$adres_tmp\" enctype=\"multipart/form-data\"><td>"
 . "<input type=\"submit\"  class=\"btn btn-default\" value=\"czyść\">"
 . "<input type=\"hidden\" value=\"1\"  name=\"czysc\"></td></form>
            <form method=\"post\" action=\"$adres_url\" enctype=\"multipart/form-data\"></thead>"
  ?>              

<?php
echo "<tbody><tr><td><input class=\"form-control\" type=\"text\" value=\"$numer\" name=\"numer\"  class=\"inputbox\"></td>
                                <td><input class=\"form-control\" type=\"text\" value=\"$instalacje\" name=\"instalacje\"  class=\"inputbox\"></td>
                                <td><input class=\"form-control\" type=\"text\" value=\"$wersja\" name=\"wersja\"  class=\"inputbox\"></td>
                                <td><input class=\"form-control\" type=\"text\" value=\"$producent\" name=\"producent\"  class=\"inputbox\"></td>
                                    <td><input class=\"form-control\" type=\"text\" value=\"$dataInst\" name=\"dataInst\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$data\"  name=\"data\"  class=\"inputbox\"></td>
                <td><input class=\"btn btn-primary\" type=\"submit\"   value=\"filtruj\">
                <input type=\"hidden\" value=\"$strona\" name=\"strona\">
            <input type=\"hidden\" value=\"1\" name=\"filtruje\"> 
            </form>";



foreach ($results as $row) {
    echo "<tr><td>" . $row['nazwa'] . "</td><td>" ;
   echo $row['AppName'] ."</td><td>". $row['DisplayVersion']."</td><td>" . $row['Publisher']. "</td><td>" . $row['InstallDate'];
   echo '</td><td>' . $row['kiedy'] . "</td>";
}
echo '</tbody></table></div>';
?>

    </body>
