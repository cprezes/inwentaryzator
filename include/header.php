<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/style.css" />
<script language="javascript" src="js/bootstrap.js" ></script>
<script language="javascript" src="js/nanoajax.min.js"></script>  
<script language="javascript">
   function zmienText( elmnt , id )
       nanoajax.ajax({url: "include/user.php", method: 'POST',  body: "login=" + id }, function ( header, resp) {
       elmnt.innerHTML = id  +  " |"  + resp.trim() ;
    });
</script> 
</head>    
    <body>