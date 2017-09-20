
<?php
include_once 'stale.php';
include_once 'include/baza.php';



if (empty($_REQUEST['login'])) {
    $tmp = number_format(floatval(date("Ymd")) * 85061015, 0, ",", "");
    $tmp2 = substr($tmp, 10);

    If (((isset($_REQUEST['tokien'])) and ( !(empty($_REQUEST['tokien']))))) {
        $tokien = $_REQUEST["tokien"];
        if (base64_encode($tmp2) == $tokien) {
            ?> <link rel="stylesheet" href="css/bootstrap.css" /> <link rel="stylesheet" href="css/style.css" />
            <style>
                input { 
                    white-space: nowrap;}
                .inputItem {
                    padding-left: 2px;
                    padding-right: 2px;
                }

            </style>
            <?php
            $prg = new userView();
            $query = "select login as Login , opis as Imie_Nazwisko, EmailAddress as E_mail, MobilePhone as Telefon, "
                    . "case Enabled when 'True' then '' when 'False' then 'Zablokowany'  end as Czy_zablokowany "
                    . ", data as Sprawdzono from users";

            $link = mysql_connect(DB_HOST, KONTO2, KONTO2_PASS);
            mysql_set_charset('utf8', $link);

            //pobierz liste plików z katalogu
            $target_dir = "./pracownicy";
            $files = array_diff(scandir($target_dir), array('.', '..'));

            mysql_select_db(DB_NAME);
            $res = mysql_query($query);
            $files = array_map('strtolower', $files);
            $prg->mysql_resource = $res;
            $prg->filesArray = $files;
            $prg->targetDir = $target_dir;
            $prg->generateReport();
        }
    }
}

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
            if ($i == $field_count - 1) {
                echo "<th><center>Zdjęcie </center></th> ";
            }
        }

        echo "</tr></thead><tbody >";

        //Now fill the table with data
        while ($rows = mysql_fetch_row($this->mysql_resource)) {
            echo "<tr>";
            for ($i = 0; $i < $field_count; $i++) {
                //Now Draw Data
                echo "<td>" . $rows[$i] . "</td>";
                if ($i == $field_count - 1) {
                    $loginToHex = strtolower(unpack('H*', "$rows[0]")[1]);
                    $loginToHexJPG = strtolower($loginToHex . '.jpg');
                    echo "<td>";

                    if (in_array($loginToHexJPG, $this->filesArray)) {
                        echo"  <div class='col-sm-2'><a href='" . $this->targetDir . "/" . $loginToHexJPG . "'>Zdjecie</a></div> ";
                    }
                    ?>   
                    <form action="upload.php" method="post" enctype="multipart/form-data"  > 
                        <div class="form-group">  
                            <div class="btn-group btn-group-xs">   

                                <input  type="hidden" name ="name" value="<?php echo $loginToHex; ?>"/>
                                <div class="col-sm-2"> <input  class="btn btn-default" type="submit" value="Dodaj" name="submit"/></div>
                                <div class="col-sm-3"> <input class="btn btn-default"  type="file" name="fileToUpload" id="fileToUpload" /></div>
                                </form></div></div></td>
                    <?php
                }
            }
            echo "</tr>";
        }
        echo "</table>";


        echo "</td></tr></tbody></table></div>";
    }

}
