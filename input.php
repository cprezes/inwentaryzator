<?php

include_once 'stale.php';
include_once 'include/baza.php';

if (!(empty($_REQUEST['nazwa']))) {
    $wichDb = "";
    If ((isset($_REQUEST['nazwa'])) and ( !(empty($_REQUEST['nazwa'])))) {
        $nazwa = $_REQUEST["nazwa"];
    }
    If ((isset($_REQUEST["login"])) and ( !(empty($_REQUEST["login"])))) {
        $login = $_REQUEST["login"];
        $wichDb = "monitor";
    }
    If ((isset($_REQUEST["monitor"])) and ( !(empty($_REQUEST["monitor"])))) {
        $monitor = base64_decode($_REQUEST["monitor"]);
        $wichDb = "monitor";
    }
    If ((isset($_REQUEST["instalacje"])) and ( !(empty($_REQUEST["instalacje"])))) {
        $instalacje = base64_decode($_REQUEST["instalacje"]);
        $wichDb = "instalacje";
    }
    If ((isset($_REQUEST["kiedy"])) and ( !(empty($_REQUEST["kiedy"])))) {
        $kiedy = base64_decode($_REQUEST["kiedy"]);
        $wichDb = "instalacje";
    }
    If ((isset($_REQUEST["uzytkownicy"])) and ( !(empty($_REQUEST["uzytkownicy"])))) {
        $sWorkingDirectory = "dane";


        if (!file_exists($sWorkingDirectory)) {
            mkdir($sWorkingDirectory, 0777, true);
        }
        $dane = "empty";
        If ((isset($_REQUEST["dane"])) and ( !(empty($_REQUEST["dane"])))) {
            if (isset($_REQUEST['part']) and (! empty($_REQUEST['part']))) {
                $partFile = $_REQUEST['part'];
                if (is_numeric($partFile)) {
                    $dane = $_REQUEST['dane'];

                    $hFleHeandler = fopen($sWorkingDirectory . '/' . $partFile . '.txt', 'a');
                    if (fwrite($hFleHeandler, $dane)) {
                        echo "Data saved";
                    } else {
                        echo "Data error";
                    }
                    fclose($hFleHeandler);
                } elseif ($partFile == 'end') {
                    $sAllText = "";
                    $files = glob($sWorkingDirectory . '/*');

                    foreach ($files as $file) {
                        if (is_file($file))
                            $handle = fopen($file, "r");
                        $sAllText = $sAllText . fread($handle, filesize($file));
                        fclose($handle);
                        if (unlink($file)) {
                            echo " Data read " . $file;
                        } else {
                            echo " Error read " . $file;
                        }
                    }
                    $dane = base64_decode($sAllText);

                    $wichDb = "users";
                }
            }
        }
    }

    $database = new DB();

    if ($wichDb == "monitor") {
        $insert = array(
            'nazwa' => $nazwa,
            'login' => $login,
            'monitor' => $monitor
        );

        $database->insert('inne', $insert);
    } elseif ($wichDb == "instalacje") {

        $where = array('nazwa' => $nazwa);
        $database->delete('instalacje', $where);


        require_once 'include/ogonki.php';
        $out = array();
        $output = parseTable(TableHelp($instalacje));

        foreach ($output as $field) {
            $field["Nazwa"] = $nazwa;
            $field["Kiedy"] = $kiedy;
            array_push($out, $field);
        }

        $fields = array(
            'AppName',
            'DisplayVersion',
            'Publisher',
            'InstallDate',
            'WindowsInstaller',
            'NoRemove',
            'nazwa',
            'kiedy'
        );

        $database->insert_multi('instalacje', $fields, $out);
    } elseif ($wichDb == "users") {
        if (!($dane == "empty")) {

            require_once 'include/ogonki.php';
            $output = parseTable(TableHelp($dane));

            $fields = array(
                "login",
                "opis",
                "EmailAddress",
                "MobilePhone",
                "OfficePhone",
                "Enabled",
                "Department",
                "Description",
                "Title",
                "StreetAddress",
                "PostalCode",
                "State",
                "Manager",
                "LastLogonDate"
            );
            if (count($fiels) > 10) {
                $database->query("TRUNCATE TABLE users");
            }
            echo (" Add rows " . $database->insert_multi('users', $fields, $output));
        }
    } else {
        exit();
    }
} 