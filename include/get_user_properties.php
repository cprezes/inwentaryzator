<?php

require   '../stale.php';
require  'baza.php';
require  'header.php';

If ((isset($_REQUEST['email'])) and ( !(empty($_REQUEST['email']))))
    $email =  trim ($_REQUEST["email"] , " \t\n\r\0\x0B" ) ; else die(); 

$oDb = new DB(DB_HOST, KONTO2, KONTO2_PASS);

$query = "select user.login as login, user.opis as opis, user.EmailAddress as EmailAddress , user.MobilePhone, user.OfficePhone, user.Department ,
przel.login as przel_login, przel.opis as przel_opis, przel.EmailAddress as przel_EmailAddress,przel.MobilePhone as przel_MobilePhone, przel.OfficePhone as przel_OfficePhone
from
(select LOWER(login) as login, opis,Title,LOWER(EmailAddress) as EmailAddress,TRIM( LEADING '+48 ' FROM  MobilePhone) as MobilePhone,TRIM( LEADING '+48 ' FROM  OfficePhone) as  OfficePhone,Department, LOWER(Manager) as Manager  , LastLogonDate from users  where Enabled='true') user 
left join
(select LOWER(login) as login, opis,Title,LOWER(EmailAddress) as EmailAddress,TRIM( LEADING '+48 ' FROM  MobilePhone) as MobilePhone,TRIM( LEADING '+48 ' FROM  OfficePhone) as  OfficePhone,Department, LOWER(Manager) as Manager from users  where Enabled='true') przel 
on user.Manager=przel.login
where  user.EmailAddress like lower(\"$email\") LIMIT 1 ";
$result = $oDb->get_results($query); 

if  (@strlen($oDb->getSingleDataFormfistRow($result,"opis"))> 1) {
$oDb->generateList($result);
  
$loginsd = $oDb->getSingleDataFormfistRow($result, "login");

$guery2='select   t2.nazwa as Logowal_sie_na ,t1.razy , ip as Ostatnio_z_adresu_IP , 
case  WHEN (DATEDIFF( NOW(), max(t2.data) ) =0 ) then concat( "Dziś o" , " ",time( max(t2.data)))  WHEN (DATEDIFF( NOW(), max(t2.data) ) >0 ) then max(t2.data)  end  as Zalogowany_ostatnio
from 
( select nazwa ,count(nazwa) as razy  from `komputery` where DATEDIFF( NOW(), data ) < 60 
and lower(login) ="'.$loginsd.'"
group by nazwa
) t1  
inner join 
(select distinct(nazwa) as nazwa  ,ip ,data from komputery  
where DATEDIFF( NOW(), data )<  60 
order by id desc) t2 
on t2.nazwa=t1.nazwa
group by 1
order by razy desc';
$oDb->generateReport( $oDb->get_results($guery2));


echo 'Powyższe statystyki dotyczą ostatnich 60 dni ';

} else {
 echo $email ;
}
