<?php 

$date = new DateTime('2018-05-01');
$now = new DateTime();

if($date < $now) {
echo "Strona sieci Web wygasła.";
    die();
}



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Plakat</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
      iframe {
   height:155px;    
   width:130px; 
   border: 0 !important;
   overflow: hidden;
     
}
body
{
  background-color: #fcfcfc;
}
.center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100px;
  height: 100px;
  background-color: #ccc;
  border-radius: 3px;
}

  </style>
  <body>
      <div class="container">
      <div class="row">
        <div class="col-md-2" align="right" >
            <p> <iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-2" align="right">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
        </div>
        <div class="col-md-8">
            <p> <iframe src="demo"  style=" width:740px;    height:380px;  border-radius: 30px; padding-right: 15px; " ></iframe> </p>
          
        </div>
        <div class="col-xs-12 col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2" align="right">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"   scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-xs-12 col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
        <div class="col-md-2">
          <p><iframe src="images.php"  scrolling="no"></iframe> </p>
          
        </div>
      </div>
    </div>

  </body>
  
  <script src="js/swal.js"></script>
  <script src="js/swalalert.js"></script>
    <script>
 swal({
  title: 'Text ',
  text: 'Okno zamknie się za 20 sec.',
  timer: 20000,
  onOpen: () => {
    swal.showLoading()
  }
}).then((result) => {
  if (
 
    result.dismiss === swal.DismissReason.timer
  ) {
   
  }
})

    </script>
    
</html>
