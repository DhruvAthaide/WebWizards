<?php

$servername = "localhost";
$username = "sam";
$password = "";
$dbname = "sam";

$uname = "";
$pass = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $query = "SELECT * from data where Username='$uname' and Password='$pass'";

  $stmt = $conn->prepare($query);
  $stmt->execute();

  $stmt->store_result();

  $res = $stmt->num_rows;


  if ($res >= 1) {
    $_SESSION['auth'] = 'true';
    header("location: mainpage.php");

    $pass = "";
    $uname = "";
  } else {
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>DataBase</title>
  <style>
    html,
    body {
      width: 100%;
      height: 100%;
      font-family: "Helvetica Neue", Helvetica, sans-serif;
      color: #000770;
      -webkit-font-smoothing: antialiased;
      background: #A9AAA9;
    }

    #container {
      position: fixed;
      width: 340px;
      height: 280px;
      top: 50%;
      left: 50%;
      margin-top: -140px;
      margin-left: -170px;
      background: #fff;
      border-radius: 3px;
      border: 3px solid #ccc;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    form {
      margin: 0 auto;
      margin-top: 20px;
    }

    label {
      color: #555;
      display: inline-block;
      margin-left: 18px;
      padding-top: 10px;
      font-size: 14px;
    }

    p a {
      font-size: 11px;
      color: #000770;
      float: right;
      margin-top: -13px;
      margin-right: 20px;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
    }

    p a:hover {
      color: #000770;
    }

    input {
      font-family: "Helvetica Neue", Helvetica, sans-serif;
      font-size: 12px;
      outline: none;
    }

    input[type="text"],
    input[type="password"],
    input[type="time"] {
      color: #000770;
      padding-left: 10px;
      margin: 10px;
      margin-top: 12px;
      margin-left: 18px;
      width: 290px;
      height: 35px;
      border: 1px solid #c7d0d2;
      border-radius: 2px;
      box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, 0.4),
        0 0 0 5px #f5f7f8;
      -webkit-transition: all 0.4s ease;
      -moz-transition: all 0.4s ease;
      transition: all 0.4s ease;
    }

    input[type="text"]:hover,
    input[type="password"]:hover,
    input[type="time"]:hover {
      border: 1px solid #b6bfc0;
      box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, 0.7),
        0 0 0 5px #f5f7f8;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="time"]:focus {
      border: 1px solid #a8c9e4;
      box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, 0.4),
        0 0 0 5px #e6f2f9;
    }

    #lower {
      background: #ecf2f5;
      width: 100%;
      height: 69px;
      margin-top: 20px;
      box-shadow: inset 0 1px 1px #A9AAA9;
      border-top: 1px solid #ccc;
      border-bottom-right-radius: 3px;
      border-bottom-left-radius: 3px;
    }

    input[type="checkbox"] {
      margin-left: 20px;
      margin-top: 30px;
    }

    .check {
      margin-left: 3px;
      font-size: 11px;
      color: #444;
      text-shadow: 0 1px 0 #fff;
    }

    input[type="submit"] {
      float: right;
      margin-right: 20px;
      margin-top: 20px;
      width: 80px;
      height: 30px;
      font-size: 14px;
      font-weight: bold;
      color: #fff;
      background-color: #acd6ef;
      /*IE fallback*/
      background-image: -webkit-gradient(linear,
          left top,
          left bottom,
          from(#acd6ef),
          to(#6ec2e8));
      background-image: -moz-linear-gradient(top left 90deg,
          #acd6ef 0%,
          #6ec2e8 100%);
      background-image: linear-gradient(top left 90deg,
          #acd6ef 0%,
          #6ec2e8 100%);
      border-radius: 30px;
      border: 1px solid #66add6;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-image: -webkit-gradient(linear,
          left top,
          left bottom,
          from(#b6e2ff),
          to(#6ec2e8));
      background-image: -moz-linear-gradient(top left 90deg,
          #b6e2ff 0%,
          #6ec2e8 100%);
      background-image: linear-gradient(top left 90deg,
          #b6e2ff 0%,
          #6ec2e8 100%);
    }

    input[type="submit"]:active {
      background-image: -webkit-gradient(linear,
          left top,
          left bottom,
          from(#6ec2e8),
          to(#b6e2ff));
      background-image: -moz-linear-gradient(top left 90deg,
          #6ec2e8 0%,
          #b6e2ff 100%);
      background-image: linear-gradient(top left 90deg,
          #6ec2e8 0%,
          #b6e2ff 100%);
    }

    /* Footer */
    @import url(https://fonts.googleapis.com/css?family=Alegreya+Sans:300);

    body {
      font-family: 'Alegreya Sans', sans-serif;
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
      background-color: #292c2f;
      color: #bbb;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body style="background-color: #A9AAA9;">
  <div id="container">
    <form action="" method="post">
      <p style="
            margin-left: 16px;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
          ">
        <b>Student Login:</b>
      </p>
      <a href="adminlogin.php" style="
            margin-left: 16px;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
          ">Click here for admin login!</a><br />
      <label for="username">Username:</label>
      <input type="text" id="username" value="<?php $uname ?>" name="username" autocomplete="off" />
      <label for="password">Password:</label>
      <input type="password" id="password" value="<?php $pass ?>" name="password" />
      <div id="lower">
        <a href="register.php" style="
              margin: 16px;
              font-size: 15px;
              font-family: Arial, Helvetica, sans-serif;
            ">Click to Register!</a>
        <input type="submit" value="Login" />
      </div>
    </form>
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

</body>

</html>