<?php
/* Database credentials with established credentials */
$user = 'rmra';
$password = 'rmra';
$db = 'rmra';
$host = 'localhost';
$port = 80;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $sport
);
?>