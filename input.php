<?php

include_once 'stale.php';
include_once 'include/baza.php';




if (empty($_REQUEST['nazwa'])) {
    
} else {
    $wichDb = "";
    If ((isset($_REQUEST['nazwa'])) and ( !(empty($_REQUEST['nazwa']))))  $nazwa = $_REQUEST["nazwa"];
    If ((isset($_REQUEST["login"])) and ( !(empty($_REQUEST["login"]))))  { $login = $_REQUEST["login"];    $wichDb = "monitor";}
    If ((isset($_REQUEST["monitor"])) and ( !(empty($_REQUEST["monitor"])))) { $monitor = base64_decode($_REQUEST["monitor"]);    $wichDb = "monitor";}
    If ((isset($_REQUEST["instalacje"])) and ( !(empty($_REQUEST["instalacje"])))) {$instalacje = base64_decode($_REQUEST["instalacje"]); $wichDb = "instalacje";} 
        If ((isset($_REQUEST["kiedy"])) and ( !(empty($_REQUEST["kiedy"])))) {$kiedy = base64_decode($_REQUEST["kiedy"]); $wichDb = "instalacje";} 
    $database = new DB();
    $database = DB::getInstance();

    if ($wichDb == "monitor") {
        $insert = array(
            'nazwa' => $nazwa,
            'login' => $login,
            'monitor' => $monitor
        );

        $database->insert('inne', $insert);
    } elseif ($wichDb == "instalacje") {

        $check_user = array(
            'nazwa' => $nazwa
        );
        $exists = $database->exists('instalacje', 'nazwa', $check_user);
        if ($exists) {
            $update = array(
                'instalacje' => $instalacje,
                    'kiedy' => $kiedy
                    );
            $update_where = array(
                'nazwa' => $nazwa,
                    );
            $database->update('instalacje', $update, $update_where, 1);
        } else {

            $insert = array(
                'nazwa' => $nazwa,
                'instalacje' => $instalacje,
                'kiedy'=>$kiedy
                    
            );

            $database->insert('instalacje', $insert);
        }
    } else {
        exit();
    }
}