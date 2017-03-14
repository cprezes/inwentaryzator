<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of showTable
 *
 * @author php
 */
class tabGen {
    var $header;
    var $fields = array();
    var $mysql_resource;

    function generateTable() {


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
        echo "<P></P>";

        //Check If our table has to be surrounded by an additional table
        //which increase style of this table
        echo '<div><table class="table table-bordered table-hover table-condensed" style="width: 100%;" >';
        echo "<thead style=\"  white-space: nowrap; \">";
        $header = array();
        //Header Draw
        for ($i = 0; $i < $field_count; $i++) {
            //Now Draw Headers
            echo "<th><center>" . $this->fields[$i] . "</center></th>";
            $header[] =  $this->fields[$i];
        }

        echo "</tr></thead><tbody>";


        //Now fill the table with data
        while ($rows = mysql_fetch_row($this->mysql_resource)) {
            echo "<tr>";
            for ($i = 0; $i < $field_count; $i++) {
                //Now Draw Data
                echo "<td contenteditable=\"true\" onBlur=\"saveToDatabase(this,'$header[$i]*-*$rows[0]')\" >" . $rows[$i] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

     
            echo "</td></tr></tbody></table></div>";
    }
}
