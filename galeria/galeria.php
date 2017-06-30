<?php
require_once 'staticval.php';

if ((isset($_GET["strona"]) and ( !(empty($_GET["strona"]))))) {
    $strona = $_GET["strona"];
} else {
    $strona = 1;
}


$database = new DB($galeriaDB_HOST, $galeriaDB_USER, $galeriaDB_PASS, $galeriaDB_NAME);


If ((isset($_REQUEST['przegl'])) and ( !(empty($_REQUEST['przegl']))))
    $przegl = $_REQUEST["przegl"];
else
    $przegl = 0;


if (!empty($_REQUEST['nazwa'])) {
    If ((isset($_REQUEST['nazwa'])) and ( !(empty($_REQUEST['nazwa']))))
        $nazwa = $_REQUEST["nazwa"];
    else
        die();
    If ((isset($_REQUEST['f_name'])) and ( !(empty($_REQUEST['f_name']))))
        $f_name = $_REQUEST["f_name"];
    else
        die();
    If ((isset($_REQUEST['s_time'])) and ( !(empty($_REQUEST['s_time']))))
        $s_time = $_REQUEST["s_time"];
    else
        die();
$query = "SELECT `file` 
FROM `wp_cf7dbplugin_submits` 
WHERE `form_name` = '$sFormName'  and  `field_value` = '$nazwa' and  `submit_time` = '$s_time' and  `field_name` = '$f_name'    ";
    $results = $database->get_results($query);

    header("Content-Disposition: attachment; filename=$nazwa");

    echo $results [0] ['file'];
    die();
}


//zlicz ile jest akcepacji regulaminu 
$query = "SELECT COUNT(*) as ile FROM `wp_cf7dbplugin_submits` WHERE `form_name` = '$sFormName' and `field_value` = 1 and `field_name` = 'akceptacja_regulaminu'";

$results = $database->get_results($query);
$wierszy = floatval($results[0]['ile']);
$stron = (intval($wierszy / 100)) + 1;
require_once '../include/header.php';
echo "<p>";
include '../paginacja.php';
  if (!($przegl)) echo " <a href='$adres_tmp"."strona=$strona&przegl=1' ><button>Przełącz w tryb przeglądania</button></a>";
  else 
   echo " <a href='$adres_tmp"."strona=$strona' ><button>Przełącz w tryb pobierania</button></a>"  ;

?></p> 

<style>

    img {
        width: 200px;
        height: auto;
    }
    .style1{
        width: 90%;
    }
</style>
<script>
    function myFunction(elmn)
    {
        elmn.setAttribute("class", "style1");
    }

</script>

<?php
$query = "SELECT `submit_time` AS 'Submitted',
 max(if(`field_name`='your-name', `field_value`, null )) AS 'your-name',
 max(if(`field_name`='your-email', `field_value`, null )) AS 'your-email',
 max(if(`field_name`='your-message', `field_value`, null )) AS 'your-message',
 max(if(`field_name`='zdj7', `field_value`, null )) AS 'zdj7',
 max(if(`field_name`='zdj8', `field_value`, null )) AS 'zdj8',
 max(if(`field_name`='zdj9', `field_value`, null )) AS 'zdj9',
 max(if(`field_name`='zdj10', `field_value`, null )) AS 'zdj10',
 max(if(`field_name`='zdj1', `field_value`, null )) AS 'zdj1',
 max(if(`field_name`='zdj2', `field_value`, null )) AS 'zdj2',
 max(if(`field_name`='zdj3', `field_value`, null )) AS 'zdj3',
 max(if(`field_name`='zdj4', `field_value`, null )) AS 'zdj4',
 max(if(`field_name`='zdj5', `field_value`, null )) AS 'zdj5',
 max(if(`field_name`='zdj6', `field_value`, null )) AS 'zdj6',
 max(if(`field_name`='zdj7', `file`, null )) AS 'ImgZdj7',
 max(if(`field_name`='zdj8', `file`, null )) AS 'ImgZdj8',
 max(if(`field_name`='zdj9', `file`, null )) AS 'ImgZdj9',
 max(if(`field_name`='zdj1', `file`, null )) AS 'ImgZdj1',
 max(if(`field_name`='zdj2', `file`, null )) AS 'ImgZdj2',
 max(if(`field_name`='zdj3', `file`, null )) AS 'ImgZdj3',
 max(if(`field_name`='zdj4', `file`, null )) AS 'ImgZdj4',
 max(if(`field_name`='zdj5', `file`, null )) AS 'ImgZdj5',
 max(if(`field_name`='zdj6', `file`, null )) AS 'ImgZdj6',
 max(if(`field_name`='zdj10',`file`, null )) AS 'ImgZdj10',
 max(if(`field_name`='akceptacja_regulaminu', `field_value`, null )) AS 'akceptacja_regulaminu',
 max(if(`field_name`='regulamin', `file`, null )) AS 'regulaminPDF',
 max(if(`field_name`='regulamin', `field_value`, null )) AS 'regulamin',
 max(if(`field_name`='Page Title', `field_value`, null )) AS 'Page Title',
 max(if(`field_name`='Page URL', `field_value`, null )) AS 'Page URL',
 max(if(`field_name`='Submitted From', `field_value`, null )) AS 'Submitted From',
 GROUP_CONCAT(if(`file` is null or length(`file`) = 0, null, `field_name`)) AS 'fields_with_file'
FROM `wp_cf7dbplugin_submits` 
WHERE `form_name` = '$sFormName'  
GROUP BY `submit_time` 
ORDER BY `submit_time` DESC
LIMIT " . ($strona - 1) * 10 . ",100 ";
$results = $database->get_results($query);
$onKlikFunction = "";
if ($przegl)
    $onKlikFunction = 'onclick="myFunction(this)"';
echo "<div>    <table class=\"table table-bordered table-hover table-condensed \" ><tbody>";
foreach ($results as $row) {
    echo "<tr><td>" . date('d/m/Y H:i:s', $row['Submitted']) . "</td><td>" . $row['your-name'] . "</td><td>" .
    '<a download="' . $row['regulamin'] . '" href="data:PDF;base64,' . base64_encode($row['regulaminPDF']) . '">' . $row['regulamin'] . "</a>" .
    "</td></tr> <tr><td colspan=\"3\">";
    for ($i = 1; $i <= 10; $i++) {
        if (strlen($row['zdj' . $i])>0){
        echo "<div>";
        if (!($przegl))
            echo '<a  href="' . $adres_tmp . "nazwa=" . $row['zdj' . $i] . "&f_name=zdj" . $i . "&s_time=" . $row['Submitted'] . '">';
        echo ' <img id="img"  src="data:image/jpeg;base64,' . base64_encode($row['ImgZdj' . $i]) . '" ' . $onKlikFunction . ' onerror="this.src=\'bigRedX.png\';"  />';
        if (!($przegl))
            echo '</a>';
        echo "</div>";
        }
        
    }
    echo "</td></tr>";
}
echo " </tbody></table></div>";

function convert($size) {
    $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}

echo "Zapytanie zajęło  " . convert(memory_get_usage(true)); // 123 kb