<?php

	
function ogonki($string)
{
 $utf8iso = array(
	"\xc4\x85" => "a",
	"\xc4\x84" => "A",
	"\xc4\x87" => "c",
	"\xc4\x86" => "C",
	"\xc4\x99" => "e",
	"\xc4\x98" => "E",
	"\xc5\x82" => "l",
	"\xc5\x81" => "L",
	"\xc5\x84" => "n",
	"\xc5\x83" => "N",
	"\xc3\xb3" => "o",
	"\xc3\x93" => "O",
	"\xc5\x9b" => "s",
	"\xc5\x9a" => "S",
	"\xc5\xbc" => "z",
	"\xc5\xbb" => "Z",
	"\xc5\xba" => "z",
	"\xc5\xb9" => "Z"
 );
 return strtr($string, $utf8iso);
}