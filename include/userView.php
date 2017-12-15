<?php

class userView {

    public $allowUpload;
    public $headerFields = array();
    public $mysql_resource;
    public $filesArray = array();
    public $targetDir;
    private $field_count;

                function __construct() {
        $this->allowUpload = FALSE;
    }

    function generateReport() {

        //echo "modified_width : ".$this->modified_width."<br>"; 
        $this->checkIfIsData();
        
        $this->field_count = count( array_keys($this->mysql_resource[0]));;

        echo '<div><table class="table table-bordered table-hover table-condensed" style="width: 100%;" >';
        echo "<thead style=\"  white-space: nowrap; \">";

        $this->grabHeader();
        $this->headerDarw($this->headerFields);


        echo "</tr></thead>";
        echo "<tbody >";

        //Now fill the table with data
        $this->drawTable();
        echo "</table>";

        echo "</tbody></table></div>";
    }

    function array_change_value_case($array, $case = CASE_LOWER) {
        if (!is_array($array))
            return false;
        foreach ($array as $key => &$value) {
            
            if (is_array($value))
                call_user_func_array(__function__, array(&$value, $case));
            else
                $array[$key] = ($case == CASE_UPPER ) ? strtoupper($array[$key]) : strtolower($array[$key]);
        }
        return $array;
    }

    private function checkIfIsData() {
        if ( ($this->mysql_resource)< 1)
            die("<br>Zapytanie nie jest poprawne");
    }

    private function headerDarw($line) {
        foreach ($line as $field) {
            $this->headerFieldDocorator($field);
        }
    }

    private function headerFieldDocorator($field) {
        echo "<th><center>" . $field . "</center></th>";
    }

    private function drawTable() {
       foreach ($this->mysql_resource as $row) {
            echo "<tr>";
            $this->takeTableLine($row);
           
            echo "</tr>";
        }
    }

    private function takeTableLine($rows) {
            $i=0;
         foreach ($this->headerFields as $fileld){
            $sField = $rows[$fileld];
   
            if ($i == $this->field_count-1 ) {
                $sField = strtolower($sField);
                if (in_array($sField, $this->filesArray)) {
                    $this->fieldDecorator($sField, "plusLink");
                } else {
                    $this->fieldDecorator($sField, "noLink");
                }
            } else {
                $this->fieldDecorator($sField);
            
        }
          $i++;
       }
     
            }
  

    private function fieldDecorator($field, $type = "normal") {
        echo "<td>";
       
        
        if ($type == "plusLink") {
            $linkShader = rtrim(base64_encode(rtrim($field, ".jpg")), '=');

            echo" <a href='show.php?img=" . $linkShader .
            "' onclick=\"window.open(this.href, 'mywin','left=20,top=20,width=600,height=400,toolbar=0,resizable=0'); return false;\" "
            . ">Zdjecie</a>";

            if ($this->allowUpload) {
                $this->addUploadForm($field);
            }
        } elseif ($type == "noLink") {
            if ($this->allowUpload) {
                $this->addUploadForm($field);
            }
        } else {
            echo $field;
        }
        echo "</td>";
    }

    private function addUploadForm($field) {
        ?>   
        <form action="upload.php" method="post" enctype="multipart/form-data"  > 
            <div class="form-group">  
                <div class="btn-group btn-group-xs">   

                    <input  type="hidden" name ="name" value="<?php echo $field; ?>"/>
                    <div class="col-sm-2"> <input  class="btn btn-default" type="submit" value="Dodaj" name="submit"/></div>
                    <div class="col-sm-3"> <input class="btn btn-default"  type="file" name="fileToUpload" id="fileToUpload" /></div>
                    </form></div></div>         
            <?php
        }

        private function grabHeader() {

             $this->headerFields=array_keys($this->mysql_resource[0]);
        }

    }
    