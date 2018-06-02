<?php

function log_add($parametry = "") {
    // MySQL command create table  
    //CREATE TABLE `log`.`komputery` ( `id` BIGINT NOT NULL AUTO_INCREMENT ,
    // `timestamp` TIMESTAMP on update CURRENT_TIMESTAMP() NOT NULL DEFAULT CURRENT_TIMESTAMP() , `user_name` VARCHAR(32) NULL DEFAULT NULL , 
    // `ip` VARCHAR(16) NULL DEFAULT NULL , `adress` TEXT NULL DEFAULT NULL , `parmas` TEXT NULL DEFAULT NULL , 
    // PRIMARY KEY (`id`)) ENGINE = InnoDB;


        $parametry = str_replace(array('[\', \']'), ' ', $parametry);
        $parametry = preg_replace('/\[.*\]/U', ' ', $parametry);
        $parametry = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', ' ', $parametry);
        $parametry = htmlentities($parametry, ENT_COMPAT, 'utf-8');
        $parametry = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $parametry);
        $parametry = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), ' ', $parametry);
    
    $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ip = $_SERVER['REMOTE_ADDR'];
    $user = "undefined";
    if (Session::get("user"))
        $user = Session::get("user");
    include_once __DIR__ . '/baza.php';
    include_once __DIR__ .'/../stale.php';
    $logDB = new DB(LOG_DB_HOST, LOG_DB_USER, LOG_DB_PASSWD, LOG_DB_NAME);
    $data = array(
        'user_name' => $user,
        'ip' => $ip,
        'adress' => $link,
        'parmas' => $parametry
    );

    $logDB->insert(LOG_DB_TABLE, $data);
}

