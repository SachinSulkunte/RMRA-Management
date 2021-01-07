<?php
require_once 'config.php';

$event_id = $_REQUEST['id'];

$sql = "DELETE FROM events WHERE event_id = '" . $event_id . "'";
if(mysqli_query($link, $sql)){
    print("Stored");
}
else{
    print("Failed");
}

echo "<script>location.href='schedule.php'</script>";