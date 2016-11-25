<?php

function kolorki($data) {
    $datetime2 = date_create(date("Y-m-d H:i:s"));
    $interval = date_diff(date_create($data), $datetime2);
    $kolorek = $interval->format('%a');
    if ($kolorek <= 40) {
        return 'class="bg-success"';
    } elseif ($kolorek >= 41 and $kolorek <= 59) {
        return'class="bg-info"';
    } elseif ($kolorek >= 60 and $kolorek <= 99) {
        return 'class="bg-danger"';
    } elseif ($kolorek >= 100) {
        return 'class="bg-info"';
    }
}


function ileDni($data){
     $datetime2 = date_create(date("Y-m-d H:i:s"));
    $interval = date_diff(date_create($data), $datetime2);
   return $interval->format('%a');
}
