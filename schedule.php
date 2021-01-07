<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    </style>
    <title>RMRA Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
    <link rel="stylesheet" href="goals.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
      <div class="nav-wrapper">
        <div class="left-side">
          <div class="nav-link-wrapper">
            <a href="home.php">Home</a>
          </div>

          <div class="nav-link-wrapper active-nav-link">
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

      <h1>Add New Event</h1>
      <form action="new_Event.php" method="post">
          <label for="event">Event</label> 
          <textarea name="event" id="event"></textarea>
          <label for="eventDate">Date (YYYY/MM/DD)</label>
          <input type="date" id="eventDate" name="eventDate"/>
          <label for="location">Location</label>
          <input type="text" id="location" name="location"/><br/>
          <button type="submit">Submit Event</button>
      </form>

    <!--print out existing events-->
    <?php
    require_once 'config.php';
    //store all data
    $sql = "SELECT * FROM events ORDER BY event_sTime ASC"; //sets events in date order oldest to newest
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  
    print("<h2>Events</h2>");
    
    //upcoming events
    while($row = mysqli_fetch_array($result)){ 
            echo "<div class='goal'>";
            echo "<a href='delete_Event.php?id=" . $row['event_id'] . "'><button class='btnComplete'>Delete</button></a><strong>";
            echo $row['event_Name'] . "</strong><p>" . $row['event_Location'] . "</p>" . "Event Date: " . $row['event_sTime'];
            echo "<p>Volunteers: ";
            $attribute = $row['event_Name'];
            $user = "SELECT username FROM eventUsers WHERE event_Name = '$attribute'";
            $volunteers = mysqli_query($link, $user) or die(mysqli_error($link));
            while($u_row = mysqli_fetch_array($volunteers)){
              echo $u_row['username'] . ",     ";
            }
            echo "</div>";
    }
  ?>   
  </div> 

</body>
</html>