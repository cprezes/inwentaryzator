<?php
echo genToken();
echo "<br>";

function  genToken(){
$tmp = number_format(floatval(date("Ymd")) * 676454534, 0, ",", "");
$tmp2 = substr($tmp, 10);
return base64_encode($tmp2);
}



$pass="CryptPassword";
$mystring="this is the string I am encrypting";

$tekst=  rc4Encrypt($pass,$mystring);
echo $tekst .  "<br>";
$tekst = rc4Decrypt($key,$tekstm);
echo $tekst .  "<br>";
        




function rc4Encrypt($key, $str) {
$s = array();
	for ($i = 0; $i < 256; $i++) {
		$s[$i] = $i;
	}
	$j = 0;
	for ($i = 0; $i < 256; $i++) {
		$j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
		$x = $s[$i];
		$s[$i] = $s[$j];
		$s[$j] = $x;
	}
	$i = 0;
	$j = 0;
	$res = '';
	for ($y = 0; $y < strlen($str); $y++) {
		$i = ($i + 1) % 256;
		$j = ($j + $s[$i]) % 256;
		$x = $s[$i];
		$s[$i] = $s[$j];
		$s[$j] = $x;
		$res .= $str[$y] ^ chr($s[($s[$i] + $s[$j]) % 256]);
	}
	return $res;
}

/**
 * Decrypt given cipher text using the key with RC4 algorithm.
 * All parameters and return value are in binary format.
 *
 * @param string key - secret key for decryption
 * @param string ct - cipher text to be decrypted
 * @return string
*/
function rc4Decrypt($key, $ct) {
	return rc4Encrypt($key, $ct);
}