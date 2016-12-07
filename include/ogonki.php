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

function TableHelp($string)
{
 $trTd = array(
        "[+]" => "<",
	"[-]" => ">"
	
 );
 return strtr($string, $trTd);
}



function parseTable($html)
{
  // Find the table
  preg_match("/<table.*?>.*?<\/[\s]*table>/s", $html, $table_html);

  // Get title for each row
  preg_match_all("/<th.*?>(.*?)<\/[\s]*th>/", $table_html[0], $matches);
  $row_headers = $matches[1];

  // Iterate each row
  preg_match_all("/<tr.*?>(.*?)<\/[\s]*tr>/s", $table_html[0], $matches);

  $table = array();

  foreach($matches[1] as $row_html)
  {
    preg_match_all("/<td.*?>(.*?)<\/[\s]*td>/", $row_html, $td_matches);
    $row = array();
    for($i=0; $i<count($td_matches[1]); $i++)
    {
      $td = strip_tags(html_entity_decode($td_matches[1][$i]));
      $row[$row_headers[$i]] = $td;
    }

    if(count($row) > 0)
      $table[] = $row;
  }
  return $table;
}


