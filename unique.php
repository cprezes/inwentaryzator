<?php
include_once 'loader.php';
include_once 'include/header.php';

$tmp = number_format(floatval(date("Ymd")) * 16062816, 0, ",", "");
$tmp2 = substr($tmp, 10);
$tokien = Session::get("tokien");

include_once 'include/key.php';

$tymaczasowa_nazawa_bazy = DB_NAME;
    
If ((isset($_REQUEST['unike'])) and ( !(empty($_REQUEST['unike']))))
    $unike = $_REQUEST["unike"];
If ((isset($_REQUEST['inne'])) and ( !(empty($_REQUEST['inne']))))
    $tymaczasowa_nazawa_bazy = "inne";

echo " <div class=\"topright\"><a href=\"". Session::get("AdresPowrotu"). "\"> Powrót >></a></div></br> ";
echo "<p>Interpretacja: Kolumna o nazwie <mark> $unike </mark>jest główną kolumna i wszystkie inne kolumny pokazuje jej ostatnie wystąpienie oraz ilość wystąpień.</p>";

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
from $tymaczasowa_nazawa_bazy
group by $unike
order by $unike";

$results = $database->get_results($query);

echo '<table class=\"table table-bordered table-hover table-condensed \" border=\"1\">';
echo " <thead style=\"  white-space: nowrap; \"> <tr><th>Lp.</th><th>$unike</th><th> [I]</a>".
            "</th><th>Użytkownik</th><th>Komputer</th><th>Ostatnio logowany</th></th><th>Dni temu</th><th>Logowań </th></thead>" ;
$licznik =1;

$datetime2 = date_create(date("Y-m-d H:i:s"  ) );
foreach ($results as $row) {
    $interval = date_diff(date_create($row["data"]), $datetime2);
   $kolorek=$interval->format('%a');
    
    echo "<tr><td>$licznik</td><td>" . $row[$unike] . "</td><td> <a href=\"". $adresFiltru ."filtruje=1&$unike=". str_replace("#" , "?" , $row[$unike] )."\">[I]</a>".
            "</td><td><div id=\"" .$row['login']. "\" onmousedown=\"javascript:zmienText(this,'". $row['login'] . "')\">".$row['login'].'</div>'."</td><td>".$row["nazwa"]."</td><td>".$row["data"]."</td><td ";
            if ($kolorek <=40){
                echo 'class="bg-success"';
            }elseif ($kolorek>=41 and $kolorek<=59 ) {
                echo'class="bg-info"';
            }elseif ($kolorek>60 and $kolorek<=99) {
                echo 'class="bg-danger"';
            }elseif ($kolorek>100) {
        echo 'class="bg-info"';
    }
            
    
    echo  "><center>". $kolorek."</center></td>" ;
    
    echo "<td><center>".$row["logowan"]."</center></td>";
    
    $licznik +=1;
}
echo "</table>";
echo "<a href=\"". Session::get("AdresPowrotu"). "\"> Powrót</a><br> ";