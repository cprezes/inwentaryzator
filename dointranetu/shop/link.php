<?php
If ((isset($_REQUEST['link'])) and ( !(empty($_REQUEST['link']))))
    $link =  trim ($_REQUEST["link"] , " \t\n\r\0\x0B" ) ; else die(); 
    $link = 'https://www.google.pl/search?&q='.$link;
echo '<script type="text/javascript">
           window.location = "'.$link.'"
      </script>';

echo '<h1><a href="'.$link.'">Kliknij tutaj</a></h1>';