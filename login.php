<?php
session_start();
error_reporting(0);
$_SESSION['register_msg'] = '';
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// Include config file
require_once "config.php";

if ($_SESSION['register_msg']) {
    echo '<div class="alert alert-success">Successfully Registered..! Thank You.</div>';
    unset($_SESSION['register_msg']);
}

// When form submitted, check and create user session.
// Check if username is empty
if (isset($_REQUEST['submit'])) {

    if (empty(trim($_REQUEST["email"]))) {
        echo '<div class="alert alert-danger">Please enter your Email.</div>';
    } else {
        $email = $_REQUEST['email'];
        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            echo '<div class="alert alert-danger">Please enter your password.</div>';
        } else {
            $password = $_REQUEST['password'];
            if (isset($_REQUEST['email'])) {

                $hashpassword = md5($password);
                // Check user is exist in the database
                $query    = "SELECT * FROM users WHERE email='$email'
                             AND password='$hashpassword'";
                $result = mysqli_query($con, $query);

                if ($row = mysqli_fetch_array($result)) {

                    $_SESSION["email"] = $email;
                    $_SESSION['currentplace'] = $_POST['currentplace'];
                    // header("Location:index.php");
                    echo "<script>window.location.href='index.php';</script>";
                    exit;
                } else {
                    echo '<div class="alert alert-danger">Incorrect Username/password...!</div>';
                }
                mysqli_close($con);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 350px;
        padding: 20px;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: "Roboto", sans-serif;
    }

    body:before{
        content: '';
        position: fixed;
        width: 100vw;
        height: 100vh;
        background-image: url("images/logo.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed; 
        background-size: 800px;
        -webkit-filter: opacity(0.5);
        -moz-filter: opacity(0.5);
        filter:

    }

    .login-box {
        margin-top: 75px;
        height: auto;
        /* background: #1a2226; */
        text-align: center;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .login-key {
        height: 100px;
        font-size: 80px;
        line-height: 100px;
        background: -webkit-linear-gradient(#27ef9f, #0db8de);
        -webkit-text-fill-color: transparent;
    }

    .login-title {
        margin-top: 15px;
        text-align: center;
        font-size: 50px;
        letter-spacing: 2px;
        margin-top: 15px;
        font-weight: bold;
        color: white;
    }

    .login-form {
        margin-top: 25px;
        text-align: left;
    }


    input[type="email"] {
        /* background-color: #1a2226; */
        border: none;
        border-bottom: 2px solid #0db8de;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        margin-bottom: 20px;
        padding-left: 0px;
        color: Black;
    }

    input[type="password"] {
        /* background-color: #1a2226; */
        border: none;
        border-bottom: 2px solid #0db8de;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        padding-left: 0px;
        margin-bottom: 20px;
        color: Black;
    }

    .form-group {
        margin-bottom: 40px;
        outline: 0px;
    }

    .form-control:focus {
        border-color: inherit;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-bottom: 2px solid #0db8de;
        outline: 0;
        background-color: #1a2226;
        color: #ecf0f5;
    }

    input:focus {
        outline: none;
        box-shadow: 0 0 0;
    }

    label {
        margin-bottom: 0px;
    }

    .form-control-label {
        font-size: 15px;
        color: Black;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .btn-outline-primary {
        border-color: #0db8de;
        color: #0db8de;
        border-radius: 0px;
        font-weight: bold;
        letter-spacing: 1px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .btn-outline-primary:hover {
        background-color: #0db8de;
        right: 0px;
    }

    .login-btm {
        float: left;
    }

    .login-button {
        padding-right: 0px;
        text-align: right;
        margin-bottom: 25px;
    }

    .login-text {
        text-align: left;
        padding-left: 0px;
        color: #a2a4a4;
    }

    .loginbttm {
        padding: 0px;
    }

    .redirect-page {
        color: Black;
    }

    .help-block {
        color: red;
    }
    </style>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">

                <!-- <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt="#" style="width: 150px;" /></a>
                </div> -->
                <div class="col-lg-12 login-title">
                    Sign In
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action='#' method='post'>

                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" class="form-control" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Please Select Your Current Place:</label>
                                <select class="form-control" id="currentplace" name="currentplace">
                                    <?php
                                    $queryArea = "SELECT * FROM tbl_all_area ORDER BY area_name ASC";
                                    $resultArea = mysqli_query($con, $queryArea);
                                    if (mysqli_num_rows($resultArea) > 0) {
                                        while ($rowArea = mysqli_fetch_array($resultArea)) {
                                    ?>
                                    <option value="<?php echo $rowArea['area_name']; ?>">
                                        <?php echo $rowArea['area_name']; ?>
                                    </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary" name="submit">Login</button>
                                </div>
                            </div>
                            <p class="redirect-page">Don't have an account? <a href="register.php">Sign up now</a></p>
                            <p class="redirect-page">Reset Your Password <a href="reset-password.php">Click here..</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>

</html>