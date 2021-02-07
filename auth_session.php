<!-- For Host -->
<?php
//session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$currentplace = $_SESSION['currentplace'];

if (!$_SESSION["email"]) {

    echo "<script>window.location.href='login.php';</script>";
    exit;
}
require_once "config.php";
$email = $_SESSION['email'];
$array_agent = array();
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $user_role = $row["user_role"];
        $city = $row["city"];
    }
    if ($currentplace) {
        $query2 = "SELECT * FROM tbl_area WHERE area_name='$currentplace'";
        $result2 = mysqli_query($con, $query2);

        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_array($result2)) {

                $agent = $row2['agent'];
                // echo $agent . "<br>";
                array_push($array_agent, $row2['agent']);
            }
        }
    }
}
?>