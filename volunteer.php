<?php

require_once 'config.php';

$eventName = $_REQUEST['event'];
$username = $_REQUEST['uname'];

$sql = "INSERT INTO eventUsers (event_Name, username) VALUES";
$sql .= "('" . $eventName . "',";
$sql .= "'" . $username . "')";

//print
if(mysqli_query($link, $sql)){
    print("Stored");
}

else 
    print("Failure");

    echo "<script>location.href='register.php'</script>";

?>