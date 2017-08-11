

<?php


include_once 'include/header.php';
include_once 'loader.php';


$adres_tmp = basename($_SERVER['PHP_SELF']) . "?";
$adres_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];





include_once 'include/key.php';
Session::set("AdresFiltru", $adres_tmp);
if ((!empty(Session::get("AdresPowrotu")))==FALSE)  Session::set("AdresPowrotu", $adres_url);
echo " <div class=\"topright\"><a href=\"". Session::get("AdresPowrotu"). "\"> Powrót >></a></div> ";
$TB_nazwa=TB_INNE;

$nazwa="";
$numer = "";
$login = "";
$monitor = "";
//$ip = "";
$data="";
$filtr = "";
$numer_ch = "";
$login_ch = "";
$monitor_ch = "";
//$ip_ch = "";
$filtr_ch = "";

If ((isset($_REQUEST['czysc'])) and ( !(empty($_REQUEST['czysc'])))) {

    Session::set("numer", $numer);
    Session::set("login", $login);
    Session::set("monitor", $monitor);
   // Session::set("ip", $ip);
     
    Session::set("numer_ch", $numer_ch);
    Session::set("login_ch", $login_ch);
    Session::set("monitor_ch", $monitor_ch);
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
If ((isset($_REQUEST["monitor"])) and ( !(empty($_REQUEST["monitor"]))))
    $monitor = $_REQUEST["monitor"];

if ((isset($_GET["strona"]) and ( !(empty($_GET["strona"]))))) {
    $strona = $_GET["strona"];
} else {
    $strona = 1;
}



If ((isset($_REQUEST['filtruje'])) and ( !(empty($_REQUEST['filtruje'])))) {

    $numer = trim($numer, " \t\n\r\0\x0B");
    $login = trim($login, " \t\n\r\0\x0B");

    $monitor = str_replace("?", "#", trim($monitor, " \t\n\r\0\x0B"));


    Session::set("numer", $numer);
    Session::set("login", $login);
    Session::set("monitor", $monitor);
    Session::set("numer_ch", $numer_ch);
    Session::set("login_ch", $login_ch);
    Session::set("monitor_ch", $monitor_ch);

}

$numer = Session::get("numer");
$login = Session::get("login");
$monitor = Session::get("monitor");


$numer_ch = Session::get("numer_ch");
$login_ch = Session::get("login_ch");
$monitor_ch = Session::get("monitor_ch");




if (strlen($numer) > 0)
    $filtr = $filtr . " lower(nazwa) LIKE \"%" . $numer . "%\" AND ";
if (strlen($login) > 0)
    $filtr = $filtr . " lower(login) LIKE \"%" . $login . "%\" AND ";
if (strlen($monitor) > 0)
    $filtr = $filtr . " lower(monitor)  LIKE \"%" . $monitor . "%\" AND ";
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
                <th>Login<a href = \"unique.php?unike=monitor&inne=1\">[U]</a></th>
                <th>Wykryte monitory (Monitor wbudowany w laptopa często ma nieznany Serial i Nazwę)<a href = \"unique.php?unike=monitor&inne=1\">[U]</a></th>
                <th>Data</th>
                <form method=\"post\" action=\"$adres_tmp\" enctype=\"multipart/form-data\"><td>"
 . "<input type=\"submit\"  class=\"btn btn-default\" value=\"czyść\">"
 . "<input type=\"hidden\" value=\"1\"  name=\"czysc\"></td></form>
            <form method=\"post\" action=\"$adres_url\" enctype=\"multipart/form-data\"></thead>"
  ?>              

<?php
echo "<tbody><tr><td><input class=\"form-control\" type=\"text\" value=\"$numer\" name=\"numer\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$login\" name=\"login\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$monitor\" name=\"monitor\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$data\"  name=\"data\"  class=\"inputbox\"></td>
                <td><input class=\"btn btn-primary\" type=\"submit\"   value=\"filtruj\">
                <input type=\"hidden\" value=\"$strona\" name=\"strona\">
            <input type=\"hidden\" value=\"1\" name=\"filtruje\"> 
            </form>";



foreach ($results as $row) {
    echo "<tr><td>" . $row['nazwa'] . "</td><td><div id=\"" .$row['login']. "\" onmousedown=\"javascript:zmienText(this,'". $row['login'] . "')\">".$row['login'].'</div></td><td>' . $row['monitor'] . '</td><td>'
 . $row['data'] . "</td>";
}
echo '</tbody></table></div>';
?>

    </body>
