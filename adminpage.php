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
      color: #222;
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
      background: #000770;
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

<body style="background-color: #A9AAA9;">
  <!-- Page 1-Home -->
  <div class="one">
    <nav>
      <img src="mh1.png" alt="logo" class="navlogo" />
      <a href="#one" class="navbar">Home</a>
      <a href="./cofigure.php" class="navbar">DataBase</a>
    </nav>
    <div class="card text-center" style="display: flex;justify-content: center;align-self: center;margin-top: 50px;">
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
  </div>

  <!-- Page 2-DataBase -->
  <div class="page" id="two" style="background-color: #A9AAA9;">
    <nav>
      <img src="mh1.png" alt="logo" class="navlogo" />
      <a href="#one" class="navbar">Home</a>
      <a href="#two" class="navbar">DataBase</a>
    </nav>
    <div class="wrap">
      <div class="search">
        <input type="text" class="searchTerm" placeholder="What are you looking for?">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
    <div class="tabledata" style="overflow: auto;  height: 60%;">
      <table align="center" class="table">
        <thead>
          <th>Sno</th>
          <th>Username</th>
          <th>Email</th>
          <th>GradYear</th>
          <th>Stream</th>
          <th>Actions</th>
        </thead>
        <?php
        $servername = "localhost";
        $username = "sam";
        $password = "";
        $dbname = "sam";

        $uname = "";
        $pass = "";

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM data";
        $result = $conn->query($sql);

        if (!$result) {
          die("Invalid query" . $conn->error);
        }

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
        <td>$row[sno]</td>
        <td>$row[Username]</td>
        <td>$row[Email]</td>
        <td>$row[gradYear]</td>
        <td>$row[Stream]</td>
        <td>
          <a class='btn btn-primary btn-sm' href='/WebWizards/edit.php?sno=$row[sno]&uname=$row[Username]&email=$row[Email]&gY=$row[gradYear]&st=$row[Stream]'>Edit</a>
          <a class='btn btn-danger btn-sm' href='/WebWizards/delete.php?sno=$row[sno]'>Delete</a>
        </td>
        </tr>";
        }

        ?>
      </table>
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