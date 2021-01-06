<!-- Check user is loged in system -->
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Place Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br><br><br><br><br><br>
    <div class="container" style="margin-bottom: 50px;">
        <div class="card">
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
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Contact Number:</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usr">Address:</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sel1">Main City:</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="Colombo">Colombo</option>
                                    <option value="Rathmalana">Rathmalana</option>
                                    <optionn value="Modara">Modara</option>
                                        <option value="Moratuwa">Moratuwa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sel1">Nearest Place:</label>
                                <select class="form-control" id="place" name="place">
                                    <option value="test1">test1</option>
                                    <option value="test 2">test 2</option>
                                    <option value="test 3">test 3</option>
                                    <option value="test 4">test 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
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
        </div>

    </div>
    <?php include 'footer.php'; ?>
</body>

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

    require_once("config.php");

    $sql = "INSERT INTO orders (first_name, last_name, email,phone,address,city,place,comment,final_cart_item) VALUES ('$first_name','$last_name','$email','$phone','$address','$city','$place','$comment','$final_cart_item')";
    $result = mysqli_query($con, $sql);

    unset($_SESSION["shopping_cart"]);

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