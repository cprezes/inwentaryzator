
<?php

include_once("stale.php");
$uploadOk = 0;
If (((isset($_REQUEST['name'])) and ( !(empty($_REQUEST['name']))))) {

    $target_dir = ZDJECIA_PRACOWNIKOW_FOLDER;
    $target_dir = ltrim($target_dir, "./") . "/";

    echo "<h1><br/><br/>";

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileNewName = $target_dir . strtolower($_POST["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "Twój plik jest typu  - " . $check["mime"] . ". <br/>";
            $uploadOk = 1;
        } else {
            echo "Plik nie jest akceptowalnym plikiem graficznym.<br/> Zapisz plik ponwonie jako JPG za pomocą MS Paint.<br/>";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($fileNewName)) {
        @unlink($fileNewName);
        echo "Podmieniono plik. <br/><br/><br/>";
        $uploadOk = 1;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "Maksymalna wielkość pliku to 5MB. <br/>";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "JPEG") {
        echo "Plik może być JPG. <br/>";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Plik nie został dodany.<br/><br/>";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileNewName)) {
            echo "Plik  " . basename($_FILES["fileToUpload"]["name"]) . " dodano.<br/> Zmieniono nazwę na " . $fileNewName . "<br/>";
        } else {
            echo "Wystąpił błąd.<br/><br/>";
        }
    }
}
if ($uploadOk == 1) {
    header("refresh:3;url=" . $_SERVER["HTTP_REFERER"]);
}

