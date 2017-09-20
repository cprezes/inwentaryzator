
<?php
$uploadOk=0;
If (((isset($_REQUEST['name'])) and ( !(empty($_REQUEST['name']))))){

$target_dir = "pracownicy/";
echo "<h1>";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileNewName= $target_dir .$_POST["name"].".jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Twój plik jest typu  - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        echo "Plik nie jest akceptowalnym plikiem graficznym. Zapisz plik ponwonie jako JPG za pomocą MS Paint.<br/>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
  @unlink($target_file);
    echo "Podmieniono plik. <br/>";
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Maksymalna wielkość pliku to 5MB. <br/>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" ) {
    echo "Plik może być JPG. <br/>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Plik nie został dodany.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileNewName)) {
        echo "Plik  ". basename( $_FILES["fileToUpload"]["name"]). " dodano. zminieniono nazwę na ".$_POST["name"].".jpg";
    } else {
        echo "Wystąpił błąd.";
    }
}
} 
if ( $uploadOk ==1) { header("refresh:3;url=".$_SERVER["HTTP_REFERER"]);}

