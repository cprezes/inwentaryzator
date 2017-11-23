<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
    <title>Tabela</title>   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container">    
		<div style="text-align:center;width:100%;font-size:24px;margin-bottom:20px;color: #2875BB;"><?php echo $rodzina; ?> <br/> Kliknij pdkreślenia, aby się dopisać.</div>
                <div class="row">
                    <table class= "table table-striped table-bordered table-hover">
                        <thead>
                            <tr>

                                <th colspan="1" rowspan="1" style="width: 80px;" tabindex="0">LP</th>

                                <th colspan="1" rowspan="1" style="width: 420px;" tabindex="0">Potrzeby rodziny</th>

                                <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Dane darczyncy</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
						$query = mysql_query("select * from $baza");
						$i=0;
						while($fetch = mysql_fetch_array($query))
						{
							if($i%2==0) $class = 'even'; else $class = 'odd';
							
							echo'<tr class="'.$class.'">

                                <td>'.$fetch['lp'].'</td>

                                <td>'.$fetch['potrzeby_rodziny'].'</td>

                               <td><span class= "xedit" id="'.$fetch['lp'].'" column="dane_darczyncy_1">'.$fetch['dane_darczyncy_1'].'</span></td>
                               <td><span class= "xedit" id="'.$fetch['lp'].'" column="dane_darczyncy_2">'.$fetch['dane_darczyncy_2'].'</span></td>
                               <td><span class= "xedit" id="'.$fetch['lp'].'" column="dane_darczyncy_3">'.$fetch['dane_darczyncy_3'].'</span></td>
                               <td><span class= "xedit" id="'.$fetch['lp'].'" column="dane_darczyncy_4">'.$fetch['dane_darczyncy_4'].'</span></td>
                               <td><span class= "xedit" id="'.$fetch['lp'].'" column="dane_darczyncy_5">'.$fetch['dane_darczyncy_5'].'</span></td>
                            </tr>';							
						}
						?>
                        </tbody>
                    </table>
        </div>

		<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-editable.js" type="text/javascript"></script> 
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
                        var column= $(this).closest('td').children('span').attr('column');
                    	$.ajax({
				url: "process.php?id="+x+"&data="+y+"&column="+column,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error Processing your Request!');}
				},
				error: function(e){
					alert('Error Processing your Request!!');
				}
			});
		});
});
</script>
    </div>
</body>
</html>