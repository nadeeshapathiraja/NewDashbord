<!-- For Host -->
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!$_SESSION["email"]) {

    echo "<script>window.location.href='login.php';</script>";
    exit;
}
require_once "config.php";
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $user_role = $row["user_role"];
        $city = $row["city"];
    }
}