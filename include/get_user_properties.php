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
(select LOWER(login) as login, opis,Title,LOWER(EmailAddress) as EmailAddress,TRIM( LEADING '+48 ' FROM  MobilePhone) as MobilePhone,TRIM( LEADING '+48 ' FROM  OfficePhone) as  OfficePhone,Department, LOWER(Manager) as Manager  , LastLogonDate from users  where Enabled='true') user,
(select LOWER(login) as login, opis,Title,LOWER(EmailAddress) as EmailAddress,TRIM( LEADING '+48 ' FROM  MobilePhone) as MobilePhone,TRIM( LEADING '+48 ' FROM  OfficePhone) as  OfficePhone,Department, LOWER(Manager) as Manager from users  where Enabled='true') przel
where user.Manager=przel.login and user.EmailAddress = LOWER(\"$email\") LIMIT 1 ";
$result = $oDb->get_results($query); 

if  (@strlen($oDb->getSingleDataFormfistRow($result,"opis"))> 1) {
$oDb->generateList($result);
          
             
} else {
 echo $email ;
}
