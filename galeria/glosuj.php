<?php
require_once 'staticval.php';
$zdjNaStronie = 6;
$database = new DB($galeriaDB_HOST, $galeriaDB_USER, $galeriaDB_PASS, $galeriaDB_NAME);
if (empty(Session::get("lista"))) { //ładuj do sesji tablice wszystkich zdjeć
    $query = "SELECT submit_time,form_name,field_name,field_value 
         FROM `$galeriaTabela` 
         where `form_name` LIKE '$sFormName' and `field_name` LIKE \"%zdj%\" and LENGTH(`field_value`)>0";
    $results = $database->get_results($query);
    Session::set("zdjId", $results);
    $numbers = range(1, count($results));
    shuffle($numbers);
    Session::set("lista", $numbers);
} else {
    $results = Session::get("zdjId");
    $numbers = Session::get("lista");
}



//sprawddz czy strona nie sostała odświerzona zamiast zaglosować 

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
   $zaglosowano=FALSE;
} else {
    if (count($numbers) < $zdjNaStronie) {
    header('Location: ' . "stats.php"); 
    die;}
  $zaglosowano=TRUE;
}
echo '<div class="container"> <div class="row ">';
if ($zaglosowano==FALSE){ // nie zaglosowano 
            $tablicaGlosowania = Session::get("tablicaGlosowania");

}
        for ($i = 1; $i <= $zdjNaStronie; $i++) {
           if ($zaglosowano) {
                $tablicaGlosowania[$i] = $results[$numbers[0] - 1];
                array_shift($numbers);
              }
              
            $query = "SELECT `file` 
                                FROM `$galeriaTabela` 
                                WHERE  `form_name` LIKE '$sFormName' and  
                                `field_value` = '" . $tablicaGlosowania[$i]["field_value"] . "' and  
                                `submit_time` = '" . $tablicaGlosowania[$i]["submit_time"] . "' and  
                                `field_name` = '" . $tablicaGlosowania[$i]["field_name"] . "'";
            $pics = $database->get_results($query);
            echo '<div class="col-md-4 nopadding"> <div class="row top-buffer">';
            echo'<a href="util.php?show=1&nr=' . $i . '" class="image-trigger" target="_blank"> '
            . '<img id="myImg" class="thumbnail" src="data:image/jpeg;base64,'
            . base64_encode($pics [0] ['file']) .
            '" width="300" height="auto"  /><a>';

            echo '<div><a href="util.php?glosuj=1&nr=' . $i . '"><button  type="button" class="btn btn-secondary btn-lg col-md-offset-1" > Głosuję na powyższe zdjecie </button></a></div></div></div>';
          if (count($numbers) < 1)
                    break;
            
           }

      Session::set("tablicaGlosowania", $tablicaGlosowania);
      if ($zaglosowano) {// zaglosowano 
      Session::set("lista", $numbers);
      
      }


        ?>

</div></div>

<style>
    /* Style the Image Used to Trigger the Modal */
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image (Image Text) - Same Width as the Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    .nopadding {
        padding: 0 !important;
        margin: 0 !important;
    }


    .centered {
        text-align: center;
        font-size: 0;
    }
    .centered > div {
        float: none;
        display: inline-block;
        text-align: left;
        font-size: 13px;
    }
    .top-buffer { margin-top:20px; }
</style>