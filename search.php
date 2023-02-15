<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div style="display:flex; justify-content:center; width:100%; text-align:center;">
        <form action="search.php" method="post">
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
                <input type="text" name="search" class="form-control" placeholder="What Data to Search?" />
                <input type="submit" name="submit" value="search">
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



    </table>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div style="display:flex; justify-content:center; width:100%; text-align:center;">
        <form action="search.php" method="post">
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
                <input type="text" name="search" class="form-control" placeholder="What Data to Search?" />
                <input type="submit" name="submit" value="search">
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



    </table>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $search = $_POST["search"];
    $conn = mysqli_connect("localhost", "sam", "", "sam");

    $tables = mysqli_query($conn, "SHOW TABLES");
    while ($table = mysqli_fetch_object($tables)) {
        $table_name = $table->{""};

        $sql = "SELECT * FROM data WHERE ";
        $fields = array();

        $columns = mysqli_query($conn, "SHOW COLUMNS FROM data");
?>

        <table>

            <caption>
                <?php echo $table_name; ?>
            </caption>

            <tr>

                <?php while ($col = mysqli_fetch_object($columns)) {

                    array_push($fields, $col->Field . " LIKE '%" . $search . "%'");

                ?>
                    <th>
                        <?php echo $col->Field; ?>
                    </th>
                <?php }

                mysqli_data_seek($columns, 0);

                ?>

            </tr>

            <?php
            $sql .= implode(" OR ", $fields);
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_object($result)) {
            ?>

                <tr>

                    <?php while ($col = mysqli_fetch_object($columns)) { ?>

                        <td>

                            <?php
                            if (stripos($row->{$col->Field}, $search) !== false) {
                                echo "<mark>" . $row->{$col->Field} . "</mark>";
                            } else {
                                echo $row->{$col->Field};
                            }
                            ?>

                        </td>

                    <?php }
                    mysqli_data_seek($columns, 0); ?>

                </tr>

            <?php
            }
            ?>

        </table>

<?php
    }
}
