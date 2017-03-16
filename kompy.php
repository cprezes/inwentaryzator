<?php
include_once 'include/header.php';
include_once 'loader.php';
$adres_tmp = basename($_SERVER['PHP_SELF']) . "?";
$adres_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
Session::set("AdresPowrotu", $adres_url);
Session::set("AdresFiltru", $adres_tmp);

echo "<div class=\"topright\">  <a href=\"licencje\">Licencje</a> | <a href=\"raport/\">Raporty gotowe  </a> | <a href=\"db.php\"> zaawansowane w SQL</a> </div>";
@ Session::set("raporty_user", KONTO2);
@ Session::set("raporty_pass", KONTO2_PASS);
@ Session::set("raporty_host", DB_HOST);
@ Session::set("raporty_db", DB_NAME);

$numer = "";
$login = "";
$domena = "";
$ip = "";
$mac = "";
$dysk = "";
$pamiec = "";
$system = "";
$model = "";
$inne = "";
$data = "";
$filtr = "";
$numer_ch = "";
$login_ch = "";
$domena_ch = "";
$ip_ch = "";
$mac_ch = "";
$dysk_ch = "";
$pamiec_ch = "";
$system_ch = "";
$model_ch = "";
$inne_ch = "";
$data_ch = "";
$filtr_ch = "";

If ((isset($_REQUEST['czysc'])) and ( !(empty($_REQUEST['czysc'])))) {

    Session::set("numer", $numer);
    Session::set("login", $login);
    Session::set("domena", $domena);
    Session::set("ip", $ip);
    Session::set("mac", $mac);
    Session::set("dysk", $dysk);
    Session::set("pamiec", $pamiec);
    Session::set("system", $system);
    Session::set("model", $model);
    Session::set("inne", $inne);
    Session::set("data", $data);
    Session::set("filtr", $filtr);

    Session::set("numer_ch", $numer_ch);
    Session::set("login_ch", $login_ch);
    Session::set("domena_ch", $domena_ch);
    Session::set("ip_ch", $ip_ch);
    Session::set("mac_ch", $mac_ch);
    Session::set("dysk_ch", $dysk_ch);
    Session::set("pamiec_ch", $pamiec_ch);
    Session::set("system_ch", $system_ch);
    Session::set("model_ch", $model_ch);
    Session::set("inne_ch", $inne_ch);
    Session::set("data_ch", $data_ch);
    Session::set("filtr_ch", $filtr_ch);
}
If ((isset($_REQUEST['off'])) and ( !(empty($_REQUEST['off']))))
    Session::destroy();
If ((isset($_REQUEST['nazwa'])) and ( !(empty($_REQUEST['nazwa']))))
    $numer = $_REQUEST["nazwa"];
If ((isset($_REQUEST['numer'])) and ( !(empty($_REQUEST['numer']))))
    $numer = $_REQUEST["numer"];
If ((isset($_REQUEST["login"])) and ( !(empty($_REQUEST["login"]))))
    $login = $_REQUEST["login"];
If ((isset($_REQUEST["domena"])) and ( !(empty($_REQUEST["domena"]))))
    $domena = $_REQUEST["domena"];
If ((isset($_REQUEST["ip"])) and ( !(empty($_REQUEST["ip"]))))
    $ip = $_REQUEST["ip"];
If ((isset($_REQUEST["mac"])) and ( !(empty($_REQUEST["mac"]))))
    $mac = $_REQUEST["mac"];
If ((isset($_REQUEST["dysk"])) and ( !(empty($_REQUEST["dysk"]))))
    $dysk = $_REQUEST["dysk"];
If ((isset($_REQUEST["pamiec"])) and ( !(empty($_REQUEST["pamiec"]))))
    $pamiec = $_REQUEST["pamiec"];
If ((isset($_REQUEST["system"])) and ( !(empty($_REQUEST["system"]))))
    $system = $_REQUEST["system"];
If ((isset($_REQUEST["model"])) and ( !(empty($_REQUEST["model"]))))
    $model = $_REQUEST["model"];
If ((isset($_REQUEST["inne"])) and ( !(empty($_REQUEST["inne"]))))
    $inne = $_REQUEST["inne"];
If ((isset($_REQUEST["koment"])) and ( !(empty($_REQUEST["koment"]))))
    $koment = $_REQUEST["koment"];
If ((isset($_REQUEST["data"])) and ( !(empty($_REQUEST["data"]))))
    $data = $_REQUEST["data"];

if ((isset($_GET["strona"]) and ( !(empty($_GET["strona"]))))) {
    $strona = $_GET["strona"];
} else {
    $strona = 1;
}

include_once 'include/ogonki.php';

If ((isset($_REQUEST['filtruje'])) and ( !(empty($_REQUEST['filtruje'])))) {

    $numer = ogonki(strtolower(trim($numer, " \t\n\r\0\x0B")));
    $login = ogonki(strtolower(trim($login, " \t\n\r\0\x0B")));
    $domena = ogonki(strtolower( trim($domena, " \t\n\r\0\x0B")));
    $ip = ogonki(strtolower(trim($ip, " \t\n\r\0\x0B")));
    $mac = ogonki(strtolower(trim($mac, " \t\n\r\0\x0B")));
    $dysk = ogonki(strtolower(trim($dysk, " \t\n\r\0\x0B")));
    $pamiec = ogonki(strtolower(trim($pamiec, " \t\n\r\0\x0B")));
    $system = ogonki(strtolower(trim($system, " \t\n\r\0\x0B")));
    $model = ogonki( strtolower(trim($model, " \t\n\r\0\x0B")));
    $inne = ogonki(strtolower(trim($inne, " \t\n\r\0\x0B")));
    $data = ogonki(strtolower(trim($data, " \t\n\r\0\x0B")));
    $filtr = ogonki(strtolower(trim($filtr, " \t\n\r\0\x0B")));

    Session::set("numer", $numer);
    Session::set("login", $login);
    Session::set("domena", $domena);
    Session::set("ip", $ip);
    Session::set("mac", $mac);
    Session::set("dysk", $dysk);
    Session::set("pamiec", $pamiec);
    Session::set("system", $system);
    Session::set("model", $model);
    Session::set("inne", $inne);
    Session::set("data", $data);
    Session::set("filtr", $filtr);

    Session::set("numer_ch", $numer_ch);
    Session::set("login_ch", $login_ch);
    Session::set("domena_ch", $domena_ch);
    Session::set("ip_ch", $ip_ch);
    Session::set("mac_ch", $mac_ch);
    Session::set("dysk_ch", $dysk_ch);
    Session::set("pamiec_ch", $pamiec_ch);
    Session::set("system_ch", $system_ch);
    Session::set("model_ch", $model_ch);
    Session::set("inne_ch", $inne_ch);
    Session::set("data_ch", $data_ch);
    Session::set("filtr_ch", $filtr_ch);
}


$numer = Session::get("numer");
$login = Session::get("login");
$domena = Session::get("domena");
$ip = Session::get("ip");
$mac = Session::get("mac");
$dysk = Session::get("dysk");
$pamiec = Session::get("pamiec");
$system = Session::get("system");
$model = Session::get("model");
$inne = Session::get("inne");
$data = Session::get("data");
$filtr = Session::get("filtr");

$numer_ch = Session::get("numer_ch");
$login_ch = Session::get("login_ch");
$domena_ch = Session::get("domena_ch");
$ip_ch = Session::get("ip_ch");
$mac_ch = Session::get("mac_ch");
$dysk_ch = Session::get("dysk_ch");
$pamiec_ch = Session::get("pamiec_ch");
$system_ch = Session::get("system_ch");
$model_ch = Session::get("model_ch");
$inne_ch = Session::get("inne_ch");
$data_ch = Session::get("data_ch");
$filtr_ch = Session::get("filtr_ch");




if (strlen($numer) > 0)
    $filtr = $filtr . "  lower(nazwa) LIKE \"%" . $numer . "%\" AND ";
if (strlen($login) > 0)
    $filtr = $filtr . " lower(login) LIKE \"%" . $login . "%\" AND ";
if (strlen($domena) > 0)
    $filtr = $filtr . " lower(domena) LIKE \"%" . $domena . "%\" AND ";
if (strlen($ip) > 0)
    $filtr = $filtr . " lower(ip)  LIKE \"%" . $ip . "%\" AND ";
if (strlen($mac) > 0)
    $filtr = $filtr . " lower(mac)   LIKE \"%" . $mac . "%\" AND ";
if (strlen($dysk) > 0)
    $filtr = $filtr . " lower(dysk)  LIKE \"%" . $dysk . "%\" AND ";
if (strlen($pamiec) > 0)
    $filtr = $filtr . " lower(pamiec) LIKE \"%" . $pamiec . "%\" AND ";
if (strlen($system) > 0)
    $filtr = $filtr . " lower(system) LIKE \"%" . $system . "%\" AND ";
if (strlen($model) > 0)
    $filtr = $filtr . " lower(model) LIKE \"%" . $model . "%\" AND ";
if (strlen($inne) > 0)
    $filtr = $filtr . " lower(inne)  LIKE \"%" . $inne . "%\" AND ";
if (strlen($data) > 0)
    $filtr = $filtr . " lower(data) LIKE \"%" . $data . "%\" AND  ";
if (strlen($filtr) > 0)
    $filtr = " WHERE " . $filtr . " 1 ";




//$filtr="";
$filtr= strtolower($filtr);
$database = new DB();
$database = DB::getInstance();
$query = "SELECT COUNT(*) as ile FROM `komputery` $filtr ";
$results = $database->get_results($query);
$wierszy = floatval($results[0]['ile']);
$stron = (intval($wierszy / 100)) + 1;

$query = "SELECT * FROM `komputery` $filtr  ORDER BY id DESC LIMIT " . ($strona - 1) * 100 . ",100 ";
$results = $database->get_results($query);
echo "<p>";
include 'paginacja.php';
echo "</p><div>    <table class=\"table table-bordered table-hover table-condensed \" style=\ width: 100%;\" >       
                <thead style=\"  white-space: nowrap; \"><tr><th>Nazwa<a href = \"unique.php?unike=nazwa\">[U]</a></th>
                <th>Login<a href = \"unique.php?unike=login\">[U]</a></th>
                <th>Domena<a href = \"unique.php?unike=domena\">[U]</a></th>
                <th>IP połączenia<a href = \"unique.php?unike=ip\">[U]</a></th>
                <th>MAC<a href = \"unique.php?unike=mac\">[U]</a></th>
                <th>Dysk [%wolne]<a href = \"unique.php?unike=dysk\">[U]</a> </th>
                <th>Pamiec RAM<a href = \"unique.php?unike=pamiec\">[U]</a></th>
                <th>Wersja systemu<a href = \"unique.php?unike=system\">[U]</a></th>
                <th>Id sprzętu<a href = \"unique.php?unike=model\">[U]</a></th>
                <th>Admini Lokalni<a href = \"unique.php?unike=inne\">[U]</a></th>
                <th>Data [dni] </th>
                <form method=\"post\" action=\"$adres_tmp\" enctype=\"multipart/form-data\"><td>"
 . "<input type=\"submit\"  class=\"btn btn-default\" value=\"czyść\">"
 . "<input type=\"hidden\" value=\"1\"  name=\"czysc\"></td></form>
            <form method=\"post\" action=\"$adres_url\" enctype=\"multipart/form-data\"></thead>"
?>              

<?php
echo "<tbody><tr><td><input class=\"form-control\" type=\"text\" value=\"$numer\" name=\"numer\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$login\" name=\"login\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$domena\" name=\"domena\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$ip\"  name=\"ip\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$mac\"   name=\"mac\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$dysk\"  name=\"dysk\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$pamiec\" name=\"pamiec\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$system\" name=\"system\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$model\" name=\"model\"  class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$inne\"  name=\"inne\" size=\"5\" class=\"inputbox\"></td>
                <td><input class=\"form-control\" type=\"text\" value=\"$data\"  name=\"data\"  class=\"inputbox\"></td>
                <td><input class=\"btn btn-primary\" type=\"submit\"   value=\"filtruj\">
                <input type=\"hidden\" value=\"$strona\" name=\"strona\">
            <input type=\"hidden\" value=\"1\" name=\"filtruje\"> 
            </form>";


require_once 'include/kolorki.php';
foreach ($results as $row) {
    echo "<tr><td>" . $row['nazwa'] . "</td><td><div id=\"" . $row['login'] . "\" onmousedown=\"zmienText(this,'" . $row['login'] . "')\">" . $row['login'] . '</div></td><td>' . $row['domena'] . '</td><td>' . $row['ip']
    . '</td><td>' . $row['mac'] . '</td><td>' . $row['dysk'] . '</td><td>' . $row['pamiec'] . '</td><td>' . $row['system']
    . '</td><td>' . $row['model'] . '</td><td>' . $row['inne'] . '</td><td>' . $row['data'] . " [" .  ileDni($row['data'])  . "]</td><td>" . "<a href=\"inne.php?filtruje=1&numer=" . $row['nazwa'] . "\"><center> Monitory </center></a><a href=\"instalacje.php?filtruje=1&numer=" . $row['nazwa'] . "\"><center> Instalacje </center></a></td>";
}
echo '</tbody></table></div>';
include 'paginacja.php';
?>

</body>
