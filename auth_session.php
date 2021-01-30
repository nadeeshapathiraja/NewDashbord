<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $user_role = $row["user_role"];
        $city = $row["city"];
    }
}
?>


<!-- For Host -->
<?php
// session_start();

// $email = $_SESSION['email'];
// $query = "SELECT * FROM users WHERE email='$email'";
// $result = mysqli_query($con, $query);
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_array($result)) {
//         $user_role = $row["user_role"];
//         $city = $row["city"];
//     }
// }

// if (!isset($_SESSION["email"])) {
//     echo "<script>alert("+$email+")</script>";
//     echo "<script>window.location.href='login.php';</script>";
//     // exit();
//     // header("Location: login.php");
//     // exit();
// }else{
//      echo "<script>window.location.href='./';</script>";
// }