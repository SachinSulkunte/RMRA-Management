<?php
require_once 'config.php';

$id = $_REQUEST['id'];

$sql = "UPDATE goals SET goal_complete = '1' WHERE goal_id = '" . $id . "'";
if(mysqli_query($link, $sql)){
    print("Stored");
}
else{
    print("Failure");
}

echo "<script>location.href='home.php'</script>";