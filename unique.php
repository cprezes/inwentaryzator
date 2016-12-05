<?php
include_once 'loader.php';
include_once 'include/header.php';
require_once 'include/key.php';

$tymaczasowa_nazawa_bazy = DB_NAME;

If ((isset($_REQUEST['unike'])) and ( !(empty($_REQUEST['unike']))))
    $unike = $_REQUEST["unike"];
If ((isset($_REQUEST['inne'])) and ( !(empty($_REQUEST['inne']))))
    $tymaczasowa_nazawa_bazy = "inne";
If ((isset($_REQUEST['ostatnie'])) and ( !(empty($_REQUEST['ostatnie'])))){
    $ostatnie = $_REQUEST["ostatnie"];
$zakresStart = substr($ostatnie ,0, strpos($ostatnie,","));
if (!$zakresStart) $zakresStart=0;
$zakresKoniec = substr($ostatnie , strpos($ostatnie,",")+1);
if (!$zakresKoniec) $zakresKoniec=0;
}
else{
    $zakresStart =0;
    $zakresKoniec =2240;
}


$adres_uri = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];

echo " <div class=\"topright\"><a href=\"" . Session::get("AdresPowrotu") . "\"> Powrót >></a></div></br> ";
echo "Interpretacja: Kolumna o nazwie <mark>$unike</mark> jest główną kolumna i wszystkie inne kolumny pokazuje jej ostatnie wystąpienie oraz ilość wystąpień.";
?>

<link rel="stylesheet" href="<?php echo $root_serwera; ?>css/slider.css" />

<script language="javascript" src="<?php echo $root_serwera; ?>js/jq311.js" ></script>
    <script language="javascript" src="<?php echo $root_serwera; ?>js/slider.js" ></script>
    <form action="<?php echo $adres_uri ; ?>" method="post">
        
        <input class="btn btn-primary btn-xs" type="submit" value="Pokaż dane z zakresu [dni] =>" >  &nbsp;&nbsp; 
        <input  id="ostatnie" type="text" name="ostatnie" />
        
    <script language="javascript" >
        $("#ostatnie").slider({min: 0, max: 2240, value: [<?php echo $zakresStart; ?>, <?php echo $zakresKoniec ; ?>]});
    </script>

    
</form>
<?php


$adresFiltru = Session::get("AdresFiltru");

$database = new DB();
$database = DB::getInstance();
//$query = "SELECT DISTINCT `$unike` FROM `$tymaczasowa_nazawa_bazy` ORDER BY `$unike` ";
//$query = "SELECT t1.$unike , t1.login, t1.nazwa, data
//FROM $tymaczasowa_nazawa_bazy as t1 ,(
//    SELECT DISTINCT $unike 
//    FROM  $tymaczasowa_nazawa_bazy ) as t2
//LEFT OUTER JOIN t1  ON  t1.$unike = t2.$unike
//GROUP BY login    
//ORDER BY id DESC";

$query = "select $unike , nazwa, login, MAX(data) as data, count(*) as logowan
from (select * 
from $tymaczasowa_nazawa_bazy
    where  data <= DATE_ADD(now(), INTERVAL ". $zakresStart *-1 ." DAY)   and  data >= DATE_ADD(now(), INTERVAL ". $zakresKoniec* -1 ." DAY)  ) as t1
group by $unike
order by $unike";

$results = $database->get_results($query);

echo '<table class=\"table table-bordered table-hover table-condensed \" border=\"1\">';
echo " <thead style=\"  white-space: nowrap; \"> <tr><th>Lp.</th><th>$unike</th><th> [I]</a>" .
 "</th><th>Użytkownik</th><th>Komputer</th><th>Ostatnio logowany</th></th><th>Dni temu</th><th>Logowań </th></thead>";
$licznik = 1;

require_once 'include/kolorki.php';
foreach ($results as $row) {

    echo "<tr><td>$licznik</td><td>" . $row[$unike] . "</td><td> <a href=\"" . $adresFiltru . "filtruje=1&$unike=" . str_replace("#", "?", $row[$unike]) . "\">[I]</a>" .
    "</td><td><div id=\"" . $row['login'] . "\" onmousedown=\"javascript:zmienText(this,'" . $row['login'] . "')\">" . $row['login'] . '</div>' . "</td><td>" . $row["nazwa"] . "</td><td>" . $row["data"] . "</td><td ";
    echo kolorki($row["data"]) . "><center>" . ileDni($row["data"]) . "</center></td>";

    echo "<td><center>" . $row["logowan"] . "</center></td>";

    $licznik +=1;
}
echo "</table>";
echo "<a href=\"" . Session::get("AdresPowrotu") . "\"> Powrót</a><br> ";
