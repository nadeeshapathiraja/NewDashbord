<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
// Include config file
require_once "config.php";
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
    $ordered_at = date("Y-m-d H:i:s");

    require_once("config.php");

    $sql = "INSERT INTO orders (first_name, last_name, email,phone,address,city,place,comment,final_cart_item,ordered_at) VALUES ('$first_name','$last_name','$email','$phone','$address','$city','$place','$comment','$final_cart_item','$ordered_at')";
    $result = mysqli_query($con, $sql);

    unset($_SESSION["shopping_cart"]);

?>
<script type=" text/javascript">
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