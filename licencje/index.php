<?php
require_once '../stale.php';
require_once '../loader.php';
$root_serwera = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . "/" . explode("/", $_SERVER['PHP_SELF'])[1] . "/";

include_once '../include/header.php';
Session::set("EditDB", TB_LIC)
?>
<html>
    <head>
        <title>Licencje</title>
        <style>

            .current-row{background-color:#B24926;color:#FFF;}
            .current-col{background-color:#1b1b1b;color:#FFF;}
            .tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
            .tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
            .tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
        </style>

        <script language="javascript" >

            function saveToDatabase(element, id) {
                nanoajax.ajax({
                    url: "<?php echo $root_serwera; ?>licencje/saveedit.php",
                    method: 'POST',
                    body: 'fildID=' + id + '&editval=' + element.innerHTML
                },
                        function (header, resp) {
                            element.innerHTML = resp.trim();
                        });
            }
            ;
        </script> 
    </script>




    <?php
    $db = new DB();

    require 'tabGen.php';
    $prg = new tabGen();
    $query = "SELECT * from " . Session::get("EditDB") . " WHERE Ukryj = 0";
    $prg->fields = $db->get_results($query);

    //Colect data 
    $query = "select  lower(nazwa) as nazwa  from komputery where  data > DATE_ADD(now(), INTERVAL -1 MONTH) group by nazwa";
    $prg->compNames = $prg->prepareCleanArray($db->clean(array_column($db->get_results($query), "nazwa")));
    $query = "select lower(login) as login  from `users` where Enabled like 'True'";
    $prg->userLogin = $prg->prepareCleanArray($db->clean(array_column($db->get_results($query), "login")));
    $query = "SELECT lower(AppName) as AppName  from `instalacje` group by AppName order by 1";
    $prg->appNames = $prg->prepareCleanArray($db->clean(array_column($db->get_results($query), "AppName")));

    require_once ('../include/header.php');
    echo '<link rel="stylesheet" href="../css/bootstrap.css" /> <link rel="stylesheet" href="../css/style.css" />';
    echo "<a style=' position: absolute; top: 0px; right: 10px;' href='" . $root_serwera . "kompy.php'>Powrót >></a>";
    echo "<table><tr><td>___INFO -->___ </td><td " . $prg->colors(TRUE) . " style='width:100px;'>Pewnie OK.</td><td " . $prg->colors(FALSE) . " style='width:300px;'>Nie naleziono lub zablokowana.</td> </tr></table>";
    echo "<p><b>Przy wypełnianiu komórek staraj się używać ja najwięcej danych ze słownika szczególnie w kolumnach gdzie słownik taki jest dostępny. 
    Do słownika możesz dostać się za pomocą skrótu [S] w bardziej istotnych kolumnach.</b></p>";

    $prg->generateTable();

    echo '<a href="saveedit.php?nowy"> <INPUT TYPE="button" VALUE="Nowy Wiersz" style="float: right;"></a>';
    