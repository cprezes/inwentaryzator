<?php

include_once '../stale.php';
include_once '../include/header.php';
include_once '../loader.php';


If ((isset($_REQUEST['c1'])) and ( !(empty($_REQUEST['c1']))))
    $user = $_REQUEST["c1"];
If ((isset($_REQUEST["c27"])) and ( !(empty($_REQUEST["c27"]))))
    $opis = $_REQUEST["c27"];
If ((isset($_REQUEST["c3"])) and ( !(empty($_REQUEST["c3"]))))
{ $query = $_REQUEST["c3"];
 $query= str_replace( "'", '"',$query);       
}
If ((isset($_REQUEST["usun"])) and ( !(empty($_REQUEST["usun"]))))
    $usun = "0"; else $usun = "1"; //tu jest odwrotna logika 
If ((isset($_REQUEST['id'])) and ( !(empty($_REQUEST['id']))))
    $id = $_REQUEST["id"];


$database = new DB();
$database = DB::getInstance();

if ($id < 0) {


     $insert = array(
        'user' => $user,
        'opis' => $opis,
        'query' => $query,
        'widoczny' => $usun
    );

// var_dump($insert);

$database->insert( 'zapytania', $insert );
} else {
    $update = array(
        'widoczny' => $usun,
        'user' => $user,
        'opis' => $opis,
        'query' => $query,
       );

    $where_clause = array(
        'id' => $id
    );
    $updated = $database->update('zapytania', $update, $where_clause, 1);
    if ($updated) {
        echo '<p>Zrobione</p>';
    }
}
header("Location: index.php");
