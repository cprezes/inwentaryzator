<?php


function generateRandomString($length = 10, $alphaCapital = true, $alphaLower = true, $numbers = true, $date = false) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $nums = '123456780';
    $characters = "";
    if ($alphaCapital) {
        $characters .=  ucwords($alphabet);
    }
    if ($alphaLower) {
        $characters .=  $alphabet;
    }
    if ($numbers) {
        $characters .= $nums;
    }

    $charactersLength = strlen($characters);
    if (! $charactersLength) {
        return false;
    }
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    if ($date) {
        $randomString .=  date("njHis", time());
    }

    return $randomString;
}
