<?php
session_start();
error_reporting(0);
//include auth_session.php file on all user panel pages
include("auth_session.php");
// Include config file
require_once "config.php";
$currentplace = $_SESSION['currentplace'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Place Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    .card {
        margin: 0;
        padding: 0;
        font-family: "Roboto", sans-serif;
    }

    .card:before {
        content: '';
        position: fixed;
        width: 100vw;
        height: 100vh;
        background-image: url("images/logo.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: 550px;
        -webkit-filter: opacity(0.5);
        -moz-filter: opacity(0.5);
        filter: saturate()
    }

    input[type="text"] {

        border: none;
        background-color: rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid #0db8de;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        margin-bottom: 20px;
        padding-left: 0px;
        color: Black;
    }

    input[type="email"] {
        /* background-color: #1a2226; */
        border: none;
        background-color: rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid #0db8de;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        margin-bottom: 20px;
        padding-left: 0px;
        color: Black;
    }

    input[type="tel"] {
        /* background-color: #1a2226; */
        border: none;
        background-color: rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid #0db8de;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        margin-bottom: 20px;
        padding-left: 0px;
        color: Black;
    }

    .comment {

        border: none;
        background-color: rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid #0db8de;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        margin-bottom: 20px;
        padding-left: 0px;
        color: Black;
    }

    .classPlace {
        border: none;
        background-color: rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid #0db8de;
        border-top: 0px;
        border-radius: 0px;
        font-weight: bold;
        outline: 0;
        padding-left: 0px;
        margin-bottom: 20px;
        color: Black;
    }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br><br><br><br><br><br>
    <div class="container" style="margin-bottom: 50px;">
        <div class="card">
            <?php
            if (isset($_COOKIE['first_name'])) {
                echo "Helloooooooooooooooooo";
            ?>
            <div class="card-body">
                <h4 class="card-title">Order Details</h4>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="<?php echo $_COOKIE['first_name']; ?>">
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="usr">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Contact Number:</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="usr">Address:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                    </div>

                    <?php
                        if ($user_role == 'customer') {
                        ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="usr">Agent:</label> -->
                                <input type="hidden" class="form-control" id="city" name="city"
                                    value="<?php echo $agent; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="usr">Place:</label> -->
                                <input type="hidden" class="form-control" id="place" name="place"
                                    value="<?php echo $currentplace; ?>">
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        if ($user_role == "admin") {

                        ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sel1">Main City:</label>
                                <select class="form-control classPlace" id="city" name="city">
                                    <?php
                                            $queryCity = "SELECT * FROM tbl_city ORDER BY city_name ASC";
                                            $resultCity = mysqli_query($con, $queryCity);
                                            if (mysqli_num_rows($resultCity) > 0) {
                                                while ($rowCity = mysqli_fetch_array($resultCity)) {
                                            ?>
                                    <option value="<?php echo $rowCity['city_name']; ?>">
                                        <?php echo $rowCity['city_name']; ?>
                                    </option>
                                    <?php
                                                }
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sel1">Nearest Place:</label>
                                <select class="form-control classPlace" id="place" name="place">
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
                        </div>
                    </div>
                    <?php

                        }
                        ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control comment" rows="5" id="comment" name="comment"></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-info" name="order" value="Order Now">
                            <input type="submit" class="btn btn-danger" name="cancle" value="Cancle Order">
                        </div>
                    </div>

                </form>
            </div>
            <?php
            } else {
            ?>


            <div class="card-body">
                <h4 class="card-title">Order Details</h4>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Contact Number:</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="usr">Address:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                    </div>

                    <?php
                        if ($user_role == 'customer') {
                        ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="usr">Agent:</label> -->
                                <input type="hidden" class="form-control" id="city" name="city"
                                    value="<?php echo $agent; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="usr">Place:</label> -->
                                <input type="hidden" class="form-control" id="place" name="place"
                                    value="<?php echo $currentplace; ?>">
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        if ($user_role == "admin") {

                        ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sel1">Main City:</label>
                                <select class="form-control classPlace" id="city" name="city">
                                    <?php
                                            $queryCity = "SELECT * FROM tbl_city ORDER BY city_name ASC";
                                            $resultCity = mysqli_query($con, $queryCity);
                                            if (mysqli_num_rows($resultCity) > 0) {
                                                while ($rowCity = mysqli_fetch_array($resultCity)) {
                                            ?>
                                    <option value="<?php echo $rowCity['city_name']; ?>">
                                        <?php echo $rowCity['city_name']; ?>
                                    </option>
                                    <?php
                                                }
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sel1">Nearest Place:</label>
                                <select class="form-control classPlace" id="place" name="place">
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
                        </div>
                    </div>
                    <?php

                        }
                        ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control comment" rows="5" id="comment" name="comment"></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-info" name="order" value="Order Now">
                            <input type="submit" class="btn btn-danger" name="cancle" value="Cancle Order">
                        </div>
                    </div>

                </form>
            </div>
            <?php } ?>
        </div>

    </div>

</body>
<?php include 'footer.php'; ?>

</html>

<?php

//$final = json_decode($final);


if (isset($_REQUEST['order'])) {
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $place = $_REQUEST['place'];
    $comment = $_REQUEST['comment'];
    $cart_item = $_SESSION["shopping_cart"];
    $final_cart_item = json_encode($cart_item);
    $ordered_at = date("Y-m-d H:i:s");
    $total = $_SESSION['total'];

    setcookie($first_name, $first_name);

    $sql = "INSERT INTO orders (first_name, last_name, email,phone,address,city,place,comment,final_cart_item,total,ordered_at) VALUES ('$first_name','$last_name','$email','$phone','$address','$city','$place','$comment','$final_cart_item','$total','$ordered_at')";
    $result = mysqli_query($con, $sql);

    unset($_SESSION["shopping_cart"]);
    $_SESSION["order_message"] = "Your Last Order Send Success..! You can Order again Now. Thank You.";


    $queryAgent = "SELECT * FROM tbl_city WHERE city_name=$city";
    $resultAgent = mysqli_query($con, $queryAgent);
    if (mysqli_num_rows($resultAgent) > 0) {
        while ($rowAgent = mysqli_fetch_array($resultAgent)) {
            echo $rowAgent['email'];
        }
    }


?>
<script type="text/javascript">
window.location = "index.php";
$(document).ready(function() {
    $("form").submit(function() {
        alert("Thank You for Order");

    });
});
</script>
<?php
}
?>

<?php
if (isset($_REQUEST['cancle'])) {
?>
<script type="text/javascript">
window.location = "index.php";
</script>

<?php
}
?>