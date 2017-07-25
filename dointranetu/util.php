<?php
require_once 'staticval.php';
If ((isset($_REQUEST['nr'])) and ( !(empty($_REQUEST['nr'])))) {
    $i = $_REQUEST["nr"];
} else
    die();
if (empty(Session::get("tablicaGlosowania"))) {
    header("refresh:3;url=glosuj.php");
    die();
} else
    $tablicaGlosowania = Session::get("tablicaGlosowania");

If ((isset($_REQUEST['show'])) and ( !(empty($_REQUEST['show'])))) {
    $database = new DB();
    $query = "SELECT `file` 
                                FROM `$glegiaTabelaPliki` 
                                WHERE  `form_name` LIKE '$sGaleriaFormName' and  
                                `field_value` = '" . $tablicaGlosowania[$i]["field_value"] . "' and  
                                `submit_time` = '" . $tablicaGlosowania[$i]["submit_time"] . "' and  
                                `field_name` = '" . $tablicaGlosowania[$i]["field_name"] . "'";
    $pics = $database->get_results($query);
     $file = file_get_contents("img/" . $pics[0]["file"], true);
    echo '</br><div align="center"><img id="myImg" class="thumbnail" src="data:image/jpeg;base64,' . base64_encode($file) . '" width="1100" height="auto"   /></div>';
}

If ((isset($_REQUEST['glosuj'])) and ( !(empty($_REQUEST['glosuj'])))) {

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }


    $database = new DB();
    $insert = array(
        'submit_time' => $tablicaGlosowania[$i]["submit_time"],
        'form_name' => $tablicaGlosowania[$i]["form_name"],
        'field_name' => $tablicaGlosowania[$i]["field_name"],
        'field_value' => $tablicaGlosowania[$i]["field_value"],
        'rating' => 1,
        'ip' => $ip
    );

    $database->insert('galeria_glosowanie', $insert);

    header("refresh:3;url=glosuj.php");
    ?>

    <a href="glosuj.php"<button type="button" class="btn btn-warning btn-lg centered" >Twój głos,</br> jest właśnie zapisny<br> w tablicy wyników. </br></br> Trwa losowanie kolejnego zestawu zdjęć.</button>
    <?php
    Session::set("tablicaGlosowania", NULL);
}