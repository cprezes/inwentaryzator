
<?php
include_once '../stale.php';
include_once '../include/header.php';
include_once '../loader.php';
 echo "<a style=' position: absolute; top: 0px; right: 10px;' href=\"javascript:history.go(-1)\">Powrót >></a> "  ;
          
If ((isset($_REQUEST["numer"])) and ( !(empty($_REQUEST["numer"]))) and (is_numeric($_REQUEST["numer"])) )
    $id = $_REQUEST["numer"]; else die();
     
    
$user  = ""; 
$opis = "";
$query = "";    
$hiden=''; 
if ($id>0)
{
  $hiden='<div class="checkbox">
  	<input  id="usun" name="usun"  type="checkbox" value="usun" >
  	<label >Usuń raport</label>
  </div>';  
$database = new DB();
$database = DB::getInstance();
  $query = "SELECT user,opis,query FROM zapytania WHERE id = $id";
 
if( $database->num_rows( $query ) > 0 )
{
    list( $user , $opis , $query) = $database->get_row( $query );
 }
else
{
    echo 'Błąd nie znaleziono rekordu ';
}
}
    
?>
<div class="container jf-form">
<form  action='update.php' method='post' enctype='multipart/form-data'>
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">


<div class="form-group c1 required" data-cid="c1">
  <label class="control-label" for="c1">Imie Nazwisko</label>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-user"></i> </span>
    <input type="text" class="form-control" id="c1" name="c1" value="<?php echo $user ?>"    
    data-rule-required="true"  />
</div>

  
</div>




<div class="form-group c27 " data-cid="c27">
  <label class="control-label" for="c27">Opis zapytania</label>


<input type="text" class="form-control" id="c27" name="c27" value="<?php echo $opis ?>"     />


  
</div>




<div class="form-group c3 required" data-cid="c3">
  <label class="control-label" for="c3">Zapytanie</label>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-edit"></i> </span>
<textarea class="form-control" id="c3" name="c3" rows="3" data-rule-required="true" ><?php echo $query ?></textarea>
</div>
  
</div>

<?php echo $hiden;?>






<div class="form-group submit c100 " data-cid="c100" style="position: relative;">
 
  <div class="progress" style="display: none; z-index: -1; position: absolute;">
    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:100%">
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-lg" style="z-index: 1;">
  		Zatwierdz
  </button>


  
</div>

</form>


</div>


</form>




