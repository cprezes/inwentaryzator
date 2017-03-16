<?php

class tabGen {
    var $header;
    var $fields = array();
    var $mysql_resource;

    function generateTable() {


        if (!is_resource($this->mysql_resource))
            die("<br>Zapytanie nie jest poprawne");


        $field_count = mysql_num_fields($this->mysql_resource);
        $i = 0;

        while ($i < $field_count) {
            $field = mysql_fetch_field($this->mysql_resource);
            $this->fields[$i] = $field->name;
            $this->fields[$i][0] = strtoupper($this->fields[$i][0]);
            $i++;
        }




        echo "<b><i>" . $this->header . "</i></b>";
        echo "<P></P>";

        echo '<div><table class="table table-bordered table-hover table-condensed" style="width: 100%;" >';
        echo "<thead style=\"  white-space: nowrap; \">";
        $header = array();
        for ($i = 0; $i < $field_count; $i++) {
            echo "<th><center>" . $this->fields[$i] . "</center></th>";
            $header[] =  $this->fields[$i];
        }

        echo "</tr></thead><tbody>";
        $idOverwrites=0;

        //Now fill the table with data
        while ($rows = mysql_fetch_row($this->mysql_resource)) {
            $idOverwrites++;
            echo "<tr>";
            for ($i = 0; $i < $field_count; $i++) {
                
                echo "<td ";
               if (!(($header[$i]=="Id") || ($header[$i]=="Timestamp"))) echo  "contenteditable=\"true\" onBlur=\"saveToDatabase(this,'$header[$i]*-*$rows[0]')\" ";
                        echo ">" ;
                     If(($header[$i]=="Id") )echo $idOverwrites  ; else echo   $rows[$i]; 
                               echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

     
            echo "</td></tr></tbody></table></div>";
    }
}
