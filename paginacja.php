<?php



echo "(Rekordów $wierszy. Stron ". $stron .")";
      

//if( $strona <> 1  )
//{
    print(" [<a href = '". $adres_tmp ."strona=1 '>Pierwsza</a>]... ");
//}




for ($i=-20; $i<20 ; $i++)
{
    $tmp22=$strona+$i;
 if (($tmp22 > 0) and ($tmp22 <= $stron) and ($i <> 0 ) ) { echo (" <a href='".$adres_tmp. "strona=$tmp22'> [$tmp22] </a>"); }  
 elseif ($i == 0) { echo "<b> $tmp22 </b>"; }
 

}





if( $strona <> $stron )
{
    print(" ...[<a href = '". $adres_tmp . "strona=". $stron ."'>Ostatnia</a>]");
}