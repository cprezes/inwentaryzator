
<?php
$target_dir = "uploads";
$files = scandir($target_dir);
$files = array_diff(scandir($path), array('.', '..'));
foreach ($files as $row ){
    echo $row ."<br/>";
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"/>
    <input type="hidden" name ="name" value="kupa"/>
    <input type="submit" value="Upload Image" name="submit"/>
</form>

</body>
</html>

