<?php
include_once 'loader.php';
include_once 'include/header.php';
require_once  'include/key.php';

$tymaczasowa_nazawa_bazy = DB_NAME;
    
If ((isset($_REQUEST['unike'])) and ( !(empty($_REQUEST['unike']))))
    $unike = $_REQUEST["unike"];
If ((isset($_REQUEST['inne'])) and ( !(empty($_REQUEST['inne']))))
    $tymaczasowa_nazawa_bazy = "inne";
If ((isset($_REQUEST['ostatnie'])) and ( !(empty($_REQUEST['ostatnie']))))
    $ostatnie = $_REQUEST["ostatnie"]; else $ostatnie = 999999;
$adres_tmp = basename($_SERVER['PHP_SELF']) . "?";
$adres_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["SCRIPT_NAME"];


$arr = array(1, 7, 14, 21,30,60,90,180,360,540,720,900,1080,1440,2240,);
echo "Pokarz dane tylko z osatdnich [dni] ";
foreach ($arr as &$value) {
   echo   " [<a href ='$adres_url?unike=$unike&ostatnie=$value'>$value</a>] "    ;
}

echo " <div class=\"topright\"><a href=\"". Session::get("AdresPowrotu"). "\"> Powrót >></a></div></br> ";
echo "<p>Interpretacja: Kolumna o nazwie <mark>$unike</mark> jest główną kolumna i wszystkie inne kolumny pokazuje jej ostatnie wystąpienie oraz ilość wystąpień.</p>";

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
    where  data > DATE_ADD(now(), INTERVAL -$ostatnie DAY)  ) as t1
group by $unike
order by $unike";

$results = $database->get_results($query);

echo '<table class=\"table table-bordered table-hover table-condensed \" border=\"1\">';
echo " <thead style=\"  white-space: nowrap; \"> <tr><th>Lp.</th><th>$unike</th><th> [I]</a>".
            "</th><th>Użytkownik</th><th>Komputer</th><th>Ostatnio logowany</th></th><th>Dni temu</th><th>Logowań </th></thead>" ;
$licznik =1;

require_once 'include/kolorki.php';
foreach ($results as $row) {
    
    echo "<tr><td>$licznik</td><td>" . $row[$unike] . "</td><td> <a href=\"". $adresFiltru ."filtruje=1&$unike=". str_replace("#" , "?" , $row[$unike] )."\">[I]</a>".
            "</td><td><div id=\"" .$row['login']. "\" onmousedown=\"javascript:zmienText(this,'". $row['login'] . "')\">".$row['login'].'</div>'."</td><td>".$row["nazwa"]."</td><td>".$row["data"]."</td><td ";
            echo kolorki($row["data"]) . "><center>". ileDni($row["data"])."</center></td>" ;
    
    echo   "<td><center>".$row["logowan"]."</center></td>";
    
    $licznik +=1;
}
echo "</table>";
echo "<a href=\"". Session::get("AdresPowrotu"). "\"> Powrót</a><br> ";