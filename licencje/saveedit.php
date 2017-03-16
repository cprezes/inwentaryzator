<?php

require_once '../loader.php';

require_once '../include/key.php';

If ((isset($_REQUEST['fildID'])) and ( !(empty($_REQUEST['fildID'])))) {
    $fildID = $_REQUEST["fildID"];
    $filds = explode("*-*", $fildID);
    $column = $filds[0];
    $id = $filds[1];
    $editval = trim($_REQUEST["editval"], "<br>");
    if ($column == "Id" or $column == "Timestamp")
        die();

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }



    $database = new DB();
    $database = DB::getInstance();

    //Log changes
    $return = $database->get_results("SELECT $column FROM " . Session::get("EditDB") . " WHERE Id=$id");
    $oldValue = $return[0][$column];
    $return = $database->get_results("SELECT Rodzaj_Prg FROM " . Session::get("EditDB") . " WHERE Id=$id");
    $Rodzaj_Prg = $return[0]["Rodzaj_Prg"];


    $user_change = array(
        'cloumn' => $column,
        'Rodzaj_Prg' => $Rodzaj_Prg,
        'from_id' => $id,
        'old_value' => $oldValue,
        'nev_value' => $editval,
        'user' => $ip
    );
    $database->insert(Session::get("EditDB") . "_log", $user_change);

    //Save change
    $update = array($column => $editval);
    $update_where = array('Id' => $id);
    $database->update(Session::get("EditDB"), $update, $update_where, 1);


    //Get value to check if 
    $return = $database->get_results("SELECT $column FROM " . Session::get("EditDB") . " WHERE Id=$id");
    echo $return[0][$column];
} elseif ((isset($_REQUEST['nowy']))) {
    $database = new DB();
    $database = DB::getInstance();

    $user_data = array(
        'Rodzaj_Prg' => 'Pusta'
    );
    $database->insert(Session::get("EditDB"), $user_data);

    $previous = "javascript:history.go(-1)";
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }
    echo "<a href= $previous>Powórt</a>";
    echo ' <body onload="javascript:history.go(-1);">';
} else
    die(); 


