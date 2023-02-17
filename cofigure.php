<?php
session_start();

error_reporting(0);

$admin_prof = $_SESSION['adm'];

if ($admin_prof == true) {
} else {
    header('location:index.php');
}
?>

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

        .tabledata {
            margin-top: 40px;
        }

        /* NavBar Ends */

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body style="background-color:#DADADA">
    <div class="page" id="three" style="background-color:#DADADA">
        <nav>
            <img src="mh1.png" alt="logo" class="navlogo" />
            <a href="adminpage.php" class="navbar">Home</a>
            <a href="aSearch.php" class="navbar">Search</a>
            <a href="#three" class="navbar">DataBase</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>

        </nav>

        <div class="tabledata" style="overflow: auto;  height: 60%;">
            <table align="center" class="table">
                <thead>
                    <th>Sno</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>GradYear</th>
                    <th>Stream</th>
                    <th>College</th>
                    <th>Actions</th>
                </thead>
                <?php
                $servername = "localhost";
                $username = "sam";
                $password = "";
                $dbname = "sam";

                $uname = "";
                $pass = "";

                error_reporting(0);

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
        <td>$row[gradyear]</td>
        <td>$row[Stream]</td>
        <td>$row[college]</td>
        <td>
          <a class='btn btn-primary btn-sm' href='/WebWizards_Git/edit.php?sno=$row[sno]&uname=$row[Username]&email=$row[Email]&gy=$row[gradyear]&st=$row[Stream]&cl=$row[college]'>Edit</a>
          <a class='btn btn-danger btn-sm' href='/WebWizards_Git/delete.php?sno=$row[sno]'>Delete</a>
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