<?php

session_start();
 
$_SESSION = array();
 
// tuhotaan sessio
session_destroy();
 
// ohjataan takaisin etusivulle
header("location: login.php");
exit;
?>
