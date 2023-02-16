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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search DataBase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
</head>

<body style="background-color:#DADADA">
    <div class="two">
        <nav>
            <img src="mh1.png" alt="logo" class="navlogo" />
            <a href="adminpage.php#one" class="navbar">Home</a>
            <a href="#two" class="navbar">Search</a>
            <a href="cofigure.php#three" class="navbar">DataBase</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </nav>
        <div style="display:flex; justify-content:center; width:100%; text-align:center;">
            <form action="aSearch.php" method="post">
                <div>
                    Category:
                    <select name="category" id="category">
                        <option value="Username">Username</option>
                        <option value="Email">Email</option>
                        <option value="gradYear">Graduation Year</option>
                        <option value="Stream">Stream</option>
                        <option value="sno">Unique ID</option>
                        <option value="college">College</option>
                    </select>
                </div>
                <br>
                <div>
                    <input type="text" name="search" class="form-control" placeholder="What Data to Search?" autocomplete="off" required />
                    <input type="submit" name="submit" value="Search">
                </div>
            </form>
        </div>
        <table class="table" align="center">
            <thead>
                <th>Sno</th>
                <th>Username</th>
                <th>Email</th>
                <th>GradYear</th>
                <th>Stream</th>
                <th>College</th>
                <th>Actions</th>
            </thead>

            <tbody>

                <?php

                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $category = $_POST['category'];
                    $conn = mysqli_connect("localhost", "sam", "", "sam");

                    switch ($category) {
                        case 'Username':
                            $query = "SELECT * FROM data where Username='$search'";
                            break;
                        case 'Email':
                            $query = "SELECT * FROM data where Email='$search'";
                            break;
                        case 'gradYear':
                            $query = "SELECT * FROM data where gradYear='$search'";
                            break;
                        case 'Stream':
                            $query = "SELECT * FROM data where Stream='$search'";
                            break;
                        case 'sno':
                            $query = "SELECT * FROM data where sno='$search'";
                            break;
                        case 'college':
                            $query = "SELECT * FROM data where college='$search'";
                            break;
                    }

                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);

                            echo "
            <td>$row[sno]</td> 
            <td>$row[Username]</td> 
            <td>$row[Email]</td> 
            <td>$row[gradyear]</td> 
            <td>$row[college]</td> 
            <td>$row[Stream]</td> 
            <td>
            <a class='btn btn-primary btn-sm' href='/WebWizards_Git/edit.php?sno=$row[sno]&uname=$row[Username]&email=$row[Email]&gy=$row[gradyear]&st=$row[Stream]&cl=$row[college]'>Edit</a>
            <a class='btn btn-danger btn-sm' href='/WebWizards_Git/delete.php?sno=$row[sno]'>Delete</a>
            </td>
            ";
                        } else {
                            echo "<h2 style='color:red;'>Not Found</h2>";
                        }
                    }
                }
                ?>
            </tbody>

        </table>
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