<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RMRA Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
      <div class="nav-wrapper">
        <div class="left-side">
          <div class="nav-link-wrapper">
            <a href="home.php">Home</a>
          </div>

          <div class="nav-link-wrapper">
            <a href="schedule.php">Schedule</a>
          </div>

          <div class="nav-link-wrapper active-nav-link">
            <a href="register.php">Volunteer</a>
          </div>
          
          <div class="nav-link-wrapper">
            <a href="logout.php">Sign Out</a>
          </div>
        </div>
      </div>    

  <?php 
  require_once 'config.php';
  $eventDesc = "SELECT event_Name FROM events";
  $event = mysqli_query($link, $eventDesc) or die(mysqli_error($link));
  ?>

  <div class="container">
    <div style="text-align:center">
      <h2>Volunteer</h2>
      <p>Select the event that you wish to volunteer at:</p>
    </div>
    <div class="row">
      <div class="column">
        <img src="registration.jpg" style="width:100%">
      </div>
      <div class="column">
      <form method="post" action="volunteer.php">   <!--add user to event-->
            <label for="uname">Username</label>
            <input type="text" id="uname" name="uname" placeholder="Username..">
            <label for="event">Events</label>
            <select id="event" name="event">
              <option>---Select Event---</option>
              <?php while($eventData = mysqli_fetch_array($event)){ ?>
                <option value="<?php echo $eventData['event_Name'];?>"> <?php echo $eventData['event_Name'];?>
                </option>
                <?php }?> 
            </select>
            <button type="submit">Submit</button>
      </form>
      </div>
  </div>    

</body>
</html>