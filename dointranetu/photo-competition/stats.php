<?php
require_once 'staticval.php';
Session::destroy();
$iIloscGlosow=100;
$oDbZdjecia = new DB();
$sQuery = "select count(submit_time) from `galeria_glosowanie`";
$iIloscZdj = $oDbZdjecia->get_row($sQuery);
?><div class="row">
<div class="container">
<div class="row"><center>
<?php if ($iIloscZdj[0] < $iIloscGlosow){?><br> <br><br> <br><br> <br><br> 
        <button type="button" class="btn btn-primary btn-lg  ">To juz wszystkie zdjęcia. <br> <br>  Dziękujemy za oddanie głosów.<br> <br> Na tej stronie zostaną <br> wyświetlone statystyki <br> zdjeć gdy liczba glosujących <br> przekroczy <?php echo $iIloscGlosow; ?>. </button>
<?php } ?>
        <br/><div class="row"> <br/>
<a href="glosuj.php"> <button type="button" class="btn btn-warning  btn-lg  ">Zagłosuj ponownie</button></a></center></div>
</div>
</div><div>

</div>
    
</div>
<?php if ($iIloscZdj[0] > $iIloscGlosow){?>
<div class="container">

    <div class="row">
<?php       

$sQueryColocate = "SELECT rating, file from
(select submit_time,field_value,form_name,field_name, count(rating) as rating 
from galeria_glosowanie 
group by submit_time,field_value,field_name 
order by rating desc) g ,galeria_pliki p
WHERE g.submit_time=p.submit_time AND g.field_value=p.field_value AND g.field_value=p.field_value 
order BY rating DESC
LIMIT 10";

$aResult=$oDbZdjecia->get_results($sQueryColocate);
$iTmpLicznik=1;

echo "<div class='row'><center><h1>Poniżej ranking zdjęć </h1><center></div>";
foreach ($aResult as $row){
    
    echo "<div class='row'><center><a href='img/".$row["file"]."'><h1>".$iTmpLicznik++."</h1></a><center></div>";
}

?>
    </div></div>
<?php } ?>