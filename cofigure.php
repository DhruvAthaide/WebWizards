<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background: orangered;
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
            background-color: #292c2f;
            color: #bbb;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
    <div class="page" id="three">
        <nav>
            <img src="mh1.png" alt="logo" class="navlogo" />
            <a href="adminpage.php" class="navbar">Home</a>
            <a href="adminpage.php#two" class="navbar">Verification</a>
            <a href="#three" class="navbar">DataBase</a>
        </nav>
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
</body>

</html>