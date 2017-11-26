<?php
/*
 * Core file for library and parameter handling:
 *
 * - $LastChangedDate: 2009-12-09 23:39:18 +0100 (Mi, 09 Dez 2009) $
 * - $Rev: 276 $
 */

// include("config/config.php");

  $dbname     = "eshop";
  $dbserver   = "localhost"; 
  $dbuser     = "root"; 
  $dbpass     = ""; 

  date_default_timezone_set('Europe/Bratislava');

// --- Connect to DB, retry 5 times ---
for ($i = 0; $i < 5; $i++) {
  
    $link = mysqli_connect("$dbserver", "$dbuser", "$dbpass");
   
}

global $link;

mysqli_select_db($link, $dbname);

//
// Setup the UTF-8 parameters:
// * http://www.phpforum.de/forum/showthread.php?t=217877#PHP
//
// header('Content-type: text/html; charset=utf-8');
mysqli_query($link, "set character set `utf8`");
mysqli_query($link, "SET NAMES `utf8`");


?>
