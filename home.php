<?php
// init session
session_start();
 
// Check user is logged in else redirect
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RMRA Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
    <link rel="stylesheet" href="goals.css">
    <link rel="stylesheet" href="home.css">
    <style>
      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #243b55;
        color: #D4AF37;
        text-align: center;
      }
    </style>
</head>
<body>
    <div class="container">
      <div class="nav-wrapper">
        <div class="left-side">
          <div class="nav-link-wrapper active-nav-link">
            <a href="home.php">Home</a>
          </div>

          <div class="nav-link-wrapper">
            <a href="schedule.php">Schedule</a>
          </div>

          <div class="nav-link-wrapper">
            <a href="register.php">Volunteer</a>
          </div>

          <div class="nav-link-wrapper">
            <a href="logout.php">Sign Out</a>
          </div>
        </div>
      </div>

      <h1>New Goal</h1>
      <form action="new_goal.php" method="post">
          <label for="text">Goal</label> 
          <textarea name="text" id="text"></textarea>
          <label for="goaldate">Date (YYYY/MM/DD)</label>
          <input type="date" id="goaldate" name="goaldate"/>
          <label for="complete">Goal Completed</label>
          <input type="checkbox" id="complete" name="complete" value="1" /><br/>
          <button type="submit">Submit Goal</button>
      </form>

    <?php
    require_once 'config.php';
    //store data
    $sql = "SELECT * FROM goals ORDER BY goal_date DESC"; //sets events in date order newest to oldest
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

    print("<h2>In Progress</h2>");

    //in progress goals
    while($row = mysqli_fetch_array($result)){ //selects only goals where goal_complete = 0
        if($row['goal_complete'] == 0){
        
            echo "<div class='goal'>";
            echo "<a href='complete.php?id=" . $row['goal_id'] . "'><button class='btnComplete'>Complete</button></a><strong>";
            echo "</strong><p>" . $row['goal_description'] . "</p>Goal Date: " . $row['goal_date'];
            echo "</div>";
        }
    }

    //completed goals
    print("<h2>Complete Goals</h2>");
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    while($row = mysqli_fetch_array($result)){ //selects only goals where goal_complete is true
        if($row['goal_complete'] != 0){
        
            echo "<div class='goal'>";
            echo "<a href='delete.php?id=" . $row['goal_id'] . "'><button class='btnComplete'>Delete</button></a><strong>";
            echo "</strong><p>" . $row['goal_description'] . "</p>Goal Date: " . $row['goal_date'];
            echo "</div>";

        }
    }
  ?>
     
  </div>
  <footer><a href="https://www.google.com/drive/">Document Respository</a> <p>Create a New Account: <a href="signUp.php">New Volunteer</a>.</p></footer>

</body>

</html>