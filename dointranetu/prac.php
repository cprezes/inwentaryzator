
<?php
var_dump( unpack('H*', "Stack"));
$target_dir = "./uploads";
$files = array_diff(scandir($target_dir), array('.', '..'));
var_dump($files);

var_dump( in_array('redkupa.pn',$files) );
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"/>
    <input type="hidden" name ="name" value="Inna nazwa"/>
    <input type="submit" value="Upload Image" name="submit"/>
</form>

</body>
</html>

