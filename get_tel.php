<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<?php
include_once("stale.php");


$prg = new userView();


$link = mysql_connect(DB_HOST, KONTO2, KONTO2_PASS);
mysql_set_charset('utf8', $link);
mysql_select_db(DB_NAME);

$res = mysql_query("SELECT `data` FROM `users` WHERE `id` = 1 ");
echo " Ostatnia aktualizacja =====>>>" . (mysql_fetch_assoc($res)["data"] ) . "<br>";

$queryToTun = "select opis as Imie_Nazwisko,OfficePhone as Telefon , EmailAddress as 'E-Mail', Title as Stanowisko , Department as Dział ,  StreetAddress as Adres ,CONCAT(hex(LOWER(login)), '.jpg') as zdjęcie  
    from `users` where  length(OfficePhone) > 5 and Enabled like 'True' ORDER BY 1 ASC";
$res = mysql_query($queryToTun);
$prg->mysql_resource = $res;


echo '<link rel="stylesheet" href="css/bootstrap.css" /> <link rel="stylesheet" href="css/style.css" />';
?>
<style type="text/css">

    table{
        border-top:1px solid #000;
        margin-left : auto; 
        margin-right : auto; 
    }
    tr{
        border:1px solid #000;
        border:1px solid #000;
    }
    td{border:1px solid #000;}

</style>
<?php


       //pobierz liste plików z katalogu
            $target_dir = "./pracownicy";
            $files = array_diff(scandir($target_dir), array('.', '..'));
            $files = array_map('strtolower', $files);
            $prg->mysql_resource = $res;
            $prg->filesArray = $files;
            $prg->targetDir = $target_dir;
            $prg->generateReport();


class userView {

    var $header;
    var $fields = array();
    var $mysql_resource;
    var $filesArray = array();
    var $targetDir;

    function generateReport() {

        //echo "modified_width : ".$this->modified_width."<br>"; 

        if (!is_resource($this->mysql_resource))
    die("<br>Zapytanie nie jest poprawne");

        /*
         * Lets calculate how many fields are there in supplied resource
         * and store their name in $this->fields[] array
         */

        $field_count = mysql_num_fields($this->mysql_resource);
        $i = 0;

        while ($i < $field_count) {
            $field = mysql_fetch_field($this->mysql_resource);
            $this->fields[$i] = $field->name;
            $this->fields[$i][0] = strtoupper($this->fields[$i][0]);
            $i++;
        }


        /*
         * Now start table generation
         * We must draw this table according to number of fields
         */

        echo "<b><i>" . $this->header . "</i></b>";


        //Check If our table has to be surrounded by an additional table
        //which increase style of this table
        echo '<div><table class="table table-bordered table-hover table-condensed" style="width: 100%;" >';
        echo "<thead style=\"  white-space: nowrap; \">";

        //Header Draw
        for ($i = 0; $i < $field_count; $i++) {
            //Now Draw Headers
            echo "<th><center>" . $this->fields[$i] . "</center></th>";
 
        }

        echo "</tr></thead><tbody >";

        //Now fill the table with data
        while ($rows = mysql_fetch_row($this->mysql_resource)) {
            echo "<tr>";
            for ($i = 0; $i < $field_count; $i++) {
                echo "<td>";
                if ($i == $field_count-1){
                     if (in_array(strtolower( $rows[$i]), $this->filesArray)) {
                        echo" <a href='show.php?img=" .strtolower( $rows[$i]) . "' onclick=\"window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;\" >Zdjecie</a>";
                    }
                }  else {
                  echo  $rows[$i] ;  
                }
                 echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        echo "</td></tr></tbody></table></div>";
    }

}
