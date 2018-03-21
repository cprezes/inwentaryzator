<?php

class tabGen {

    public $fields;
    public $appNames;
    public $userLogin;
    public $compNames;

    public function generateTable() {

        echo '<div><table class="table table-bordered table-hover table-condensed" style="width: 100%;" >';
        echo "<thead style=\"  white-space: nowrap; \">";
        $fields = array_keys(array_shift(array_values($this->fields)));

        foreach ($fields as $fileld) {
            echo "<th><center>" . $fileld . " ";


            switch ($fileld) {
                case "Rodzaj_Prg":
                    echo "<a href='../raport/raport.php?numer=20' target='_blank'>[S]</a>";
                    break;
                case "Zdajacy_login":
                    echo "<a href='../raport/raport.php?numer=21' target='_blank'>[S]</a>";
                    break;
                case "Odbierajacy_login":
                    echo "<a href='../raport/raport.php?numer=21' target='_blank'>[S]</a>";
                    break;
                case "Nazwa_komputera":
                    echo "<a href='../raport/raport.php?numer=22' target='_blank'>[S]</a>";
                    break;
            }

            echo "</center></th>";
        }


        echo "</tr></thead><tbody>";
        $idOverwrite = 0;

        //Now fill the table with data
        foreach ($this->fields as $key1d => $values1d) {
            $idOverwrite++;
            echo "<tr>";
            foreach ($values1d as $key2d => $values2d) {
                if ($key2d == "Id")
                    $RealId = $values2d;
                echo "<td ";
                switch ($key2d) {
                    case "Rodzaj_Prg":
                        echo $this->checkListPrperties("program", $values2d);
                        break;
                    case "Zdajacy_login":
                        echo $this->checkListPrperties("login", $values2d);
                        break;
                    case "Odbierajacy_login":
                        echo $this->checkListPrperties("login", $values2d);
                        break;
                    case "Nazwa_komputera":
                        echo $this->checkListPrperties("nazawa", $values2d);
                        break;
                }
                if (!(($key2d == "Id") || ($key2d == "Timestamp")))
                    echo "contenteditable=\"true\" onBlur=\"saveToDatabase(this,'$key2d*-*$RealId')\" ";
                echo ">";
                If (($key2d == "Id"))
                    echo $idOverwrite;
                else
                    echo $values2d;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        echo "</td></tr></tbody></table></div>";

    }

    private function checkListPrperties($prop, $value) {
        $value = $this-> cleanSigns($value);
        $color = "";
        switch ($prop) {
            case "program":
                $color = $this->colors(in_array($value, $this->appNames));
                break;
            case "login":
                $color = $this->colors(in_array($value, $this->userLogin));
                break;
            case "nazawa":
                $color = $this->colors(in_array($value, $this->compNames));
                break;
        }
        return $color;
    }

    public function colors($data = FALSE) {
        if ($data) {
            return ' class="bg-success" ';
        } else {
            return ' class="bg-danger" ';
        }
    }

    public function prepareCleanArray($data){
        if (!is_array($data)) {
            $data = $this->cleanSigns($data);
        } else {
             $data = array_map(array($this, 'prepareCleanArray'), $data);
        }
        return $data;
 
    }
    
    private function cleanSigns($string) {
        $string = str_replace(array('[\', \']'), '', $string);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string);
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $string);
        return strtolower(trim($string, '-'));
    }

}
