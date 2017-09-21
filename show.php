<?php

If (((isset($_REQUEST['img'])) and ( !(empty($_REQUEST['img']))))) {
    include_once("stale.php");
    $target_dir = ZDJECIA_PRACOWNIKOW_FOLDER . "/";
    $data = $_REQUEST['img'];
    $fileName = base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    $file = @file_get_contents($target_dir . $fileName . ".jpg", true);
    echo '</br><div align="center"><img id="myImg" class="thumbnail" src="data:image/jpeg;base64,' . base64_encode($file) . '" width=auto height="320"   /></div>';
}