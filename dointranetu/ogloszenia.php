<?php
require_once 'staticval.php';
//Prowizorka pozwalająca usuwać ogłoszenia 
$oDbUsun = new DB();
$sQuery = "SELECT email,numer FROM ogloszenia_usun";
$aNiePokazuj = $oDbUsun->get_results($sQuery);
$database = new DB($galeriaDB_HOST, $galeriaDB_USER, $galeriaDB_PASS, $galeriaDB_NAME);

$query = "SELECT `submit_time` AS 'Submitted',
 max(if(`field_name`='temat', `field_value`, null )) AS 'temat',
 max(if(`field_name`='contact', `field_value`, null )) AS 'contact',
 max(if(`field_name`='numer-klucz', `field_value`, null )) AS 'numer-klucz',
 max(if(`field_name`='email', `field_value`, null )) AS 'email',
 max(if(`field_name`='wiadmomosc', `field_value`, null )) AS 'wiadmomosc',
 max(if(`field_name`='zdj2', `field_value`, null )) AS 'zdj2',
 max(if(`field_name`='zdj1', `field_value`, null )) AS 'zdj1',
 max(if(`field_name`='zdj1', `file`, null )) AS 'ImgZdj1',
 max(if(`field_name`='zdj2', `file`, null )) AS 'ImgZdj2',
 max(if(`field_name`='Page Title', `field_value`, null )) AS 'Page Title',
 max(if(`field_name`='Page URL', `field_value`, null )) AS 'Page URL',
 max(if(`field_name`='Submitted Login', `field_value`, null )) AS 'Submitted Login',
 max(if(`field_name`='Submitted From', `field_value`, null )) AS 'Submitted From',
 GROUP_CONCAT(if(`file` is null or length(`file`) = 0, null, `field_name`)) AS 'fields_with_file'
FROM `wp_cf7dbplugin_submits` 
WHERE `form_name` = 'Tablica ogloszen'  
GROUP BY `submit_time` 
ORDER BY `submit_time` DESC";

$results = $database->get_results($query);
$onKlikFunction = 'onclick="myFunction(this)"';
echo ' <div class="row"><div class="container"> ';
foreach ($results as $row) {
    if (!((in_array($row['numer-klucz'], array_column($aNiePokazuj, "numer"))) and ( in_array($row['email'], array_column($aNiePokazuj, "email"))))) {
        echo '<div class="row"><b style="font-size:30px"> ' . $row['temat'] . "</b><strong> " . $row['contact'] . '</strong> (<a style="font-size:10px">' . date('d/m/Y H:i:s', $row['Submitted']) . " </a>)<br/> " . formatUrlsInText($row['wiadmomosc']) . "<br/><br/>";
        for ($i = 1; $i <= 2; $i++) {
            if (strlen($row['zdj' . $i]) > 0)
                echo ' <img id="img"  src="data:image/jpeg;base64,' . base64_encode($row['ImgZdj' . $i]) . '" ' . $onKlikFunction . ' onerror="this.src=\'redx-th.png\';"  />';
        }
        echo '</div><br/><br/><hr/> ';
    }
}
echo "</div></div>";
?> 
<style>

    img {
        width: 200px;
        height: auto;
    }
    .style1{
        width: auto;
    }



    hr {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #ccc;
        margin: 1em 0;
        padding: 0;
    }
</style>
<script>
    function myFunction(elmn)
    {
        elmn.setAttribute("class", "style1");
    }

</script>