<?php
include_once '../stale.php';
include_once '../loader.php';
$root_serwera = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . "/" . explode("/", $_SERVER['PHP_SELF'])[1] . "/";

//require_once "dbcontroller.php";
//$db_handle = new DBController();
//$sql = "SELECT * from ". TB_LIC;
//$faq = $db_handle->runQuery($sql);
include_once '../include/header.php';
Session::set("EditDB", TB_LIC)
?>
<html>
    <head>
        <title>PHP MySQL Inline Editing using jQuery Ajax</title>
        <style>
            body{width:98%;}
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
            };
        </script> 
    </script>




    <?php
    require 'tabGen.php';
    $prg = new tabGen();

    $link = mysql_connect(DB_HOST, KONTO2, KONTO2_PASS);
    mysql_set_charset('utf8', $link);
    mysql_select_db(DB_NAME);
    $res = mysql_query("SELECT * from " . Session::get("EditDB"));
    $prg->mysql_resource = $res;
    require ('../include/header.php');
    echo '<link rel="stylesheet" href="../css/bootstrap.css" /> <link rel="stylesheet" href="../css/style.css" />';
    echo "<a style=' position: absolute; top: 0px; right: 10px;' href=\"javascript:history.go(-1)\">Powrót >></a><br> ";

    $prg->generateTable();
    ?>