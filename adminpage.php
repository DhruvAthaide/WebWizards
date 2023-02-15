<?php

session_start();

$admin_prof = $_SESSION['adm'];

if ($admin_prof == true) {
} else {
  header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DataBase</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <style>
    /* Navbar */
    nav {
      padding-top: 19px;
      width: 70vw;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: auto;
    }

    .navlogo {
      display: flex;
      max-width: 10%;
      height: auto;
    }

    .navbar {
      position: relative;
      text-decoration: none;
      color: #0A2540;
      font-size: 18px;
      letter-spacing: 5px;
      padding: 0 20px;
      cursor: pointer;
    }

    .navbar:before,
    .navbar:after {
      content: "";
      position: absolute;
      height: 3px;
      width: 0;
      background: #0A2540;
      transition: 0.5s;
    }

    .navbar:after {
      left: 0;
      bottom: -10px;
    }

    .navbar:before {
      right: 0;
      top: -10px;
    }

    .navbar:hover:after,
    a:hover:before {
      width: 100%;
    }

    /* NavBar Ends */

    /* Pages */
    .body {
      margin: 0em;
    }

    .page {
      width: 100vw;
      height: 100vh;
      position: fixed;
      top: 0;
      left: -100vw;
      overflow-y: auto;
      z-index: 0;
      background-color: hsl(0, 0%, 100%);
    }

    .page:target {
      left: 0vw;
      z-index: 1;
    }

    /* Pages End */

    /* Search Button Page 3 */
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    .search {
      width: 40%;
      position: relative;
      display: flex;
    }

    .searchTerm {
      width: 100%;
      border: 3px solid #0A2540;
      border-right: none;
      padding: 5px;
      height: 36px;
      border-radius: 5px 0 0 5px;
      outline: none;
      color: #9DBFAF;
    }

    .searchTerm:focus {
      color: #0A2540;
    }

    .searchButton {
      height: 36px;
      width: auto;
      border: 1px solid #0A2540;
      background: #0A2540;
      text-align: center;
      color: #fff;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrap {
      width: 38%;
      position: absolute;
      top: 15%;
      left: 95%;
      transform: translate(-50%, -50%);
    }



    /* Events */
    .event-container {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f7f7f7;
    }

    .event-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
    }

    .event-container>form {
      display: flex;
      flex-direction: column;
    }

    .event-container>label {
      margin-bottom: 10px;
      font-weight: bold;
    }

    .event-container>input[type="text"],
    .event-container>textarea {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
      font-size: 16px;
    }

    .event-container>input[type="checkbox"] {
      margin-right: 10px;
    }

    .event-container>input[type="submit"] {
      background-color: #008cba;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    .event-container>input[type="submit"]:hover {
      background-color: #0077a3;
    }




    /* Footer */
    @import url(https://fonts.googleapis.com/css?family=Alegreya+Sans:300);

    body {
      font-family: "Alegreya Sans", sans-serif;
    }

    .footer {
      position: absolute;
      bottom: 0;
      height: 0px;
      align-items: center;
      width: 100%;
      justify-content: center;
      display: flex;
      height: min-content;
    }

    footer {
      padding-top: 0;
      background-color: #4F5254;
      color: #bbb;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background-color: #DADADA;">
  <!-- Page 1-Home -->
  <div class="one">
    <nav>
      <img src="mh1.png" alt="logo" class="navlogo" />
      <a href="#one" class="navbar">Home</a>
      <a href="aSearch.php#two" class="navbar">Search</a>
      <a href="cofigure.php#three" class="navbar">DataBase</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>
    <div class="card text-center" style="display: block;justify-content: center;align-items: center;margin:auto;width:601px;height:200px;margin-top: 40px;">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Events:</h5>
        <p class="card-text">Create Events for the Alumini Students</p>
        <a href="eventcreaton.php" class="btn btn-primary">Event Creation Panel</a>
      </div>
      <div class="card-footer text-muted">

      </div>
    </div>
    <div style="background-color: transparent; height: 10px; margin:auto;"></div>
    <div class="event-container" style="font-size: 16px">
      <form action="" method="post">
        <label for="email_to">To:</label>
        <input type="text" name="email_to" id="email_to" required />
        <label for="email_subject">Subject:</label>
        <input type="text" name="email_subject" id="email_subject" required />
        <label for="email_message">Message:</label>
        <textarea name="email_message" id="email_message" required></textarea>
        <input type="submit" name="submit" value="submit" id="submit" />
      </form>
    </div>
  </div>


  <footer class="footer">
    <br>
    <div class="content">
      <p align="center">&copy; 2023 Nirman -Web Wizards</p>
    </div>
    </div>
    </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>