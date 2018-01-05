<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <title>Tabela</title>   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <style>
     /*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css*/html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}.container{width:980px;margin-right:auto;margin-left:auto}.container-fluid{width:100%}.columns{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-flex-wrap:wrap;flex-wrap:wrap;list-style:none;margin:0;padding:0}.columns.align-top{-webkit-box-align:start;-webkit-align-items:flex-start;align-items:flex-start}.columns.align-bottom{-webkit-box-align:end;-webkit-align-items:flex-end;align-items:flex-end}.columns.align-center{-webkit-box-align:center;-webkit-align-items:center;align-items:center}.columns.align-stretch{-webkit-box-align:stretch;-webkit-align-items:stretch;align-items:stretch}.columns.justify-center{-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center}.column{-webkit-box-flex:1;-webkit-flex:1;flex:1}.column.align-top{-webkit-align-self:flex-start;align-self:flex-start}.column.align-bottom{-webkit-align-self:flex-end;align-self:flex-end}.column.align-center{-webkit-align-self:center;align-self:center}.column.one-third{-webkit-box-flex:0;-webkit-flex:0 0 33.333333%;flex:0 0 33.333333%}.column.two-thirds{-webkit-box-flex:0;-webkit-flex:0 0 66.666667%;flex:0 0 66.666667%}.column.one-fourth{-webkit-box-flex:0;-webkit-flex:0 0 25%;flex:0 0 25%}.column.one-half{-webkit-box-flex:0;-webkit-flex:0 0 50%;flex:0 0 50%}.column.three-fourths{-webkit-box-flex:0;-webkit-flex:0 0 75%;flex:0 0 75%}.column.one-fifth{-webkit-box-flex:0;-webkit-flex:0 0 20%;flex:0 0 20%}.column.four-fifths{-webkit-box-flex:0;-webkit-flex:0 0 80%;flex:0 0 80%}
</style>
     </head>
<body>

    <div class="container">    
		<div style="text-align:center;width:100%;font-size:24px;margin-bottom:20px;color: #2875BB;"><?php echo $rodzina; ?> <br/> Kliknij pdkreślenia, aby się dopisać.</div>
                <div class="row">
                    <table class= "table table-striped table-bordered table-hover">
                        <thead>
                            <tr>

                                <th colspan="1" rowspan="1" style="width: 10px;" tabindex="0">LP</th>

                                <th colspan="1" rowspan="1" style="width: 420px;" tabindex="0">Potrzeby rodziny</th>

                                <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">Dane darczyncy</th>
                                <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">Dane darczyncy</th>
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