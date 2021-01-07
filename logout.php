<?php
// init session
session_start();
 
// Unset session variables
$_SESSION = array();
 
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>