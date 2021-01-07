<?php

require_once 'config.php';

$eventName = $_REQUEST['event'];
$eventDate = $_REQUEST['eventDate'];
$location= $_REQUEST['location'];


$sql = "INSERT INTO events (event_Name, event_sTime, event_Location) VALUES";
$sql .= "('" . $eventName . "',";
$sql .= "'" . $eventDate . "',";
$sql .= "'" . $location . "')";

//print
if(mysqli_query($link, $sql)){
    print("Stored");
}

else 
    print("Failure");

echo "<script>location.href='schedule.php'</script>";

?>