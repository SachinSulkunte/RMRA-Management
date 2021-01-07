<?php

require_once 'config.php';

$text = $_REQUEST['text'];
$date = $_REQUEST['goaldate'];
$complete= $_REQUEST['complete'];

if($complete == '' || $complete == null){
    $complete = 0;
}

$sql = "INSERT INTO goals (goal_description, goal_date, goal_complete) VALUES";
$sql .= "('" . $text . "',";
$sql .= "'" . $date . "',";
$sql .= "'" . $complete . "')";

//print
if(mysqli_query($link, $sql)){
    print("Stored");
}

else 
    print("Failure");

echo "<script>location.href='home.php'</script>";

?>