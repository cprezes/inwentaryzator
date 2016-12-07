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
     
      $where = array( 'nazwa' => $nazwa );
      $database->delete( 'instalacje', $where);
        
      
        require_once  'include/ogonki.php';
        $out = array();
        $output = parseTable(TableHelp($instalacje));
        
        foreach ($output as $field) {
            $field["Nazwa"] = $nazwa;
            $field["Kiedy"] = $kiedy;
            array_push($out, $field);
        }
     
    
     
 
     $fields = array(
         'AppName', 
         'DisplayVersion',
         'Publisher',
         'InstallDate',
         'WindowsInstaller',
         'NoRemove',
         'nazwa',
         'kiedy'
          );
 
      $database->insert_multi( 'instalacje', $fields, $out );

       }
    else {
        exit();
    }
}