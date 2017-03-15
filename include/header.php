
<?php
$root_serwera = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . "/" . explode("/", $_SERVER['PHP_SELF'])[1] . "/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo $root_serwera; ?>css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo $root_serwera; ?>css/style.css" />
        <script  src="<?php echo $root_serwera; ?>js/bootsrap.js" ></script>
        <script  src="<?php echo $root_serwera; ?>js/nanoajax.min.js"></script>  
        <script >
            function zmienText(elmnt, id) {
                nanoajax.ajax({
                    url: "<?php echo $root_serwera; ?>include/user.php",
                    method: 'POST', 
                    body: "login=" + id
                    },
                    function (header, resp) {
                            elmnt.innerHTML = id + " | " + resp.trim();
                        });
            };
        </script> 
    </head>    
    <body>