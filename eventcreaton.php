<?php

session_start();

$admin_prof = $_SESSION['adm'];

if ($admin_prof == true) {
} else {
  header('location:index.php');
}

$servername = "localhost";
$username = "sam";
$password = "";
$dbname = "sam";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST["submit"])) {
  $event_name = $_POST["event_name"];
  $event_date = $_POST["event_date"];
  $event_time = $_POST["event_time"];
  $event_location = $_POST["event_location"];
  $event_description = $_POST["event_description"];


  $query = "INSERT INTO events (event_name, date, time, location, description)" . " VALUES ('$event_name', '$event_date', '$event_time', '$event_location', '$event_description')";

  $conn->query($query);

  header("location:adminpage.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event Creation</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #DADADA;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    textarea {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
      font-size: 16px;
    }

    input[type="checkbox"] {
      margin-right: 10px;
    }

    input[type="submit"] {
      background-color: #008cba;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0077a3;
    }

    h3 {
      font-weight: bold;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container" style="font-size: 16px;margin-top: 70px;">
    <form action="" method="post">
      <label for="event_name">Event Name:</label>
      <input type="text" name="event_name" id="event_name" autocomplete="off" required />
      <label for="event_date">Date:</label>
      <input type="date" name="event_date" id="event_date" required />
      <label for="event_time">Time:</label>
      <input type="time" name="event_time" id="event_time" required />
      <label for="event_location">Location:</label>
      <input type="text" name="event_location" id="event_location" required />
      <label for="event_description">Description:</label>
      <textarea name="event_description" id="event_description" required></textarea>
      <input type="submit" name="submit" value="Create Event" id="submit" />
    </form>
  </div>
</body>

</html>