
<?php
include_once 'stale.php';
include_once 'include/baza.php';
 
if( empty($_REQUEST['login'])){
 $tmp= number_format( floatval(date("Ymd")) *85061015 ,0,",","" );
 $tmp2 =  substr($tmp, 10);

 If ((isset($_REQUEST['tokien'])) and (!(empty($_REQUEST['tokien'])))){
          $tokien=$_REQUEST["tokien"];
 if (base64_encode($tmp2) == $tokien ) {
     
 $database = new DB();
$database = DB::getInstance();
$query = "SELECT * FROM users";
$results = $database->get_results( $query );
echo '<table border="1">';
foreach( $results as $row )
{
      echo "<tr><td>". strtolower($row['login']) . '</td><td>' . $row['opis']. '</td><td>' . $row['data']. '</td><td>' . $row['param1'] ."</td>" ;
}
echo '</table>';
 }
 }
       


}
 else {
    
   If ((isset($_REQUEST['login'])) and (!(empty($_REQUEST['login'])))) $login=base64_decode($_REQUEST["login"]);
   If ((isset($_REQUEST["opis"])) and (!(empty($_REQUEST["opis"])))) $opis=base64_decode($_REQUEST["opis"]);
   If ((isset($_REQUEST["param"])) and (!(empty($_REQUEST["param"])))) $param=base64_decode($_REQUEST["param"]);
   If ((isset($_REQUEST["param1"])) and (!(empty($_REQUEST["param1"])))) $param1=  base64_decode ($_REQUEST["param1"]);




$database = new DB();


$database = DB::getInstance();

$insert = array(
    'login' => $login,
    'opis' => $opis,
    'param' => $param,
    'param1' => $param1
);



$database->insert( 'users', $insert );
}
If ((isset($_REQUEST['czysc'])) and (!(empty($_REQUEST['czysc'])))and ((base64_decode($_REQUEST["czysc"]))=="TAK"))
{
$database = new DB();
$database = DB::getInstance();
$database->query("TRUNCATE TABLE users");

}
