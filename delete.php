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

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sno = $_GET['sno'];

$sql = "DELETE FROM data WHERE sno='$sno'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " .
        mysqli_close($conn);
    mysqli_error($conn);
}
