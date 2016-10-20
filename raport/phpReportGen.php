<?php

/* * *****************************************************************************************
 *
 * Class Name : phpReportGenerator
 * Version    : 1.0
 * Written By : Hasin Hayder
 * Start Date : 4th July, 2004
 * Copyright  : Systech Digital. 
 *
 * *******************************************************************************************
 *
 * Script to generate report from a valid my sql connection.
 * user have to supply which fields he want to display in table.
 * All properties are changable.
 *
 */

class phpReportGenerator {
  
    var $header;
    var $fields = array();
    var $mysql_resource;

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
        echo "<P></P>";

        //Check If our table has to be surrounded by an additional table
        //which increase style of this table
        echo '<div><table  class="table table-bordered table-hover table-condensed" style="width: 100%;">';
        echo "<thead style=\"  white-space: nowrap; \">";

        //Header Draw
        for ($i = 0; $i < $field_count; $i++) {
            //Now Draw Headers
            echo "<th><center>" . $this->fields[$i] . "</center></th>";
        }

        echo "</tr></thead><tbody>";

        //Now fill the table with data
        while ($rows = mysql_fetch_row($this->mysql_resource)) {
            echo "<tr>";
            for ($i = 0; $i < $field_count; $i++) {
                //Now Draw Data
                echo "<td>" . $rows[$i] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

     
            echo "</td></tr></tbody></table></div>";
    }

    function csv() {

        require 'export.php';
        $now = gmdate("D, d M Y H:i:s");
        $filename = "export_" . date("Y-m-d") . ".xls";
        $exporter = new ExportDataExcel('browser', $filename);
        $exporter->initialize();
        $field_count = mysql_num_fields($this->mysql_resource);
        $i = 0;

        while ($i < $field_count) {
            $field = mysql_fetch_field($this->mysql_resource);
            $this->fields[$i] = $field->name;
            $this->fields[$i][0] = strtoupper($this->fields[$i][0]);
            $i++;
        }


        for ($i = 0; $i < $field_count; $i++) {
            $data[] =mysql_field_name($this->mysql_resource, $i);
        }
	$exporter->addRow($data);
         unset($data);
//      $data=  array("-12345678901234567890","0.0000000000123456789","-");
//        var_dump($data); die;

	
        while ($row = mysql_fetch_row($this->mysql_resource)) {
            unset($data);

            foreach ($row as $value) {
                $data[] = $value;
            }
            $exporter->addRow($data);
        }
        $exporter->finalize();
        exit();
    }

}

?>
