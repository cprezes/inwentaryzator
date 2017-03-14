<?php


If ((isset($_REQUEST['fildID'])) and ( !(empty($_REQUEST['fildID'])))){
$fildID = $_REQUEST["fildID"];
$filds =  explode("*-*",$fildID);
$column=$filds[0];  
$id=$filds[1];
 
}else die(); 


include_once '../loader.php';

include_once '../include/key.php';


$database = new DB();
$database = DB::getInstance();

$update = array( $column => $_REQUEST["editval"] );
$update_where = array( 'Id' => $id );
$database->update( Session::get("EditDB"), $update, $update_where, 1 );

 $return = $database->get_results( "SELECT $column FROM ".Session::get("EditDB")." WHERE Id=$id" );
echo  $return[0][$column];
   

