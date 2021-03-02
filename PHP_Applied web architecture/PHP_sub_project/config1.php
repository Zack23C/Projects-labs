<?php

#our config file, has information about the database, about the current page we're on

$url = $_SERVER['REQUEST_URI'];//takes full domain

$strings = explode('/', $url);//php explodes

$current_page = end($strings);//

$dbname = 'library2';
$dbuser = 'root';
$dbpass = '';
$dbserver = 'localhost';

          
//set cookie with username

//if(!isset($_COOKIE['username'])){
    
  //  setcookie("username", "Njeri", time()+86400,"/");

//}//if
          






$cookieTimer = time()+86400;

if (isset($_COOKIE['username']))
  setcookie("username", "Njeri", $cookieTimer);

setcookie("language", "en-us", $cookieTimer);  
else
    $count = 0;
$count = $count + 1;


?>