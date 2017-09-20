<?php
If (((isset($_REQUEST['img'])) and ( !(empty($_REQUEST['img']))))){
$target_dir = "./pracownicy/";
 $file = @file_get_contents($target_dir . $_REQUEST['img'], true);
    echo '</br><div align="center"><img id="myImg" class="thumbnail" src="data:image/jpeg;base64,' . base64_encode($file) . '" width="auto" height="640"   /></div>';
}