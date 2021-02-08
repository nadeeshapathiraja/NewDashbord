<?php
session_start();
//include auth_session.php file on all user panel pages
include("auth_session.php");
// Include config file
require_once "config.php";

?>
<?php
require_once "config.php";


if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        // if (!in_array($_GET["id"], $item_array_id)) {
        $count = count($_SESSION["shopping_cart"]);
        if ($_POST["size"] == '0') {

            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'size'        =>    $_POST["size"],
                'item_quantity'        =>    $_POST["quantity"],
                'item_price' => 150
            );
        } elseif ($_POST["size"] == '1') {
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'size'        =>    $_POST["size"],
                'item_quantity'        =>    $_POST["quantity"],
                'item_price' => 200
            );
        }


        $_SESSION["shopping_cart"][$count] = $item_array;
        // } else {
        //     echo '<script>alert("Item Already Added")</script>';
        // }
    } else {

        if ($_POST["size"] == '0') {
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'size'        =>    $_POST["size"],
                'item_quantity'        =>    $_POST["quantity"],
                'item_price' => 150 //Change value 
            );
        } elseif ($_POST["size"] == "1") {
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'size'        =>    $_POST["size"],
                'item_quantity'        =>    $_POST["quantity"],
                'item_price' => 200 //cahange value
            );
        }
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}


if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="breakfast.php"</script>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart In PHP and MySql | Webdevtrick.com</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
    <div class="container">
        <br>
        <h3 align="center">Shoping Cart </h3><br />

        <br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="40%">Item Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Size</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                </tr>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td>
                        <?php
                                if ($values["size"] == 0) {
                                    echo "Regular Pack";
                                } else if ($values["size"] == 1) {
                                    echo "Combo Pack";
                                } else if ($values["size"] == 300) {
                                    echo "300ml";
                                } else if ($values["size"] == 400) {
                                    echo "400ml";
                                }
                                ?>
                    </td>
                    <td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <td><a href="breakfast.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                class="text-danger">Remove</span></a></td>
                </tr>
                <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">Rs <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
                }
                ?>

            </table>
        </div>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <script>
                function myFunction() {
                    var msg = confirm("Do you Want to buy Kolakanda?");
                    if (msg == true) {
                        window.location.replace("kolakanda.php");
                    } else {
                        window.location.replace("placeOrder.php");
                    }
                }
                </script>
                <!-- <input type="submit" class="btn btn-outline-secondary" onclick="location.href = 'placeOrder.php';"
                    value="Place Oreder"> -->
                <input type="submit" class="btn btn-outline-secondary" onclick="myFunction() " value="Place Order">
            </div>

        </div>


        <br />
        <h3 align="center">Your Tommorow Breakfast Menu</h3><br />
        <br /><br />


        <div class="row">

            <?php
            $query = "SELECT * FROM tbl_product ORDER BY id ASC";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $secondtype =  $row["type"];
                    $suppler_city = $row['city'];
                    foreach ($array_agent as $value) {

                        if ($suppler_city == $value  && $user_role == "customer") { //Check User city equal to product city
                            if ($row["type"] == 'breakfast') {
            ?>
            <div class="col-md-4">
                <form method="post" action="breakfast.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px; width: 300px;height: 410px;"
                        align="center">

                        <img src="images/<?php echo $row["image"]; ?>" class="img-responsive"
                            style="width: 250px; height: 200px;" /><br />

                        <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size" value="0" checked>
                            <label class="form-check-label" for="inlineCheckbox2">Regular</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size" value="1">
                            <label class="form-check-label" for="inlineCheckbox2">Combo Pack</label>
                        </div>


                        <input type="text" name="quantity" value="1" class="form-control" />

                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                            value="Add to Cart" />

                    </div>
                </form>
            </div>


            <?php
                            }
                        }
                    }
                    if ($user_role == "admin") {
                        if ($row["type"] == 'breakfast') {
                            ?>
            <div class="col-md-4">
                <form method="post" action="breakfast.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px; width: 300px;height: 450px;"
                        align="center">

                        <img src="images/<?php echo $row["image"]; ?>" class="img-responsive"
                            style="width: 250px; height: 200px;" /><br />

                        <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size" value="0" checked>
                            <label class="form-check-label" for="inlineCheckbox2">Regular</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="size" id="size" value="1">
                            <label class="form-check-label" for="inlineCheckbox2">Combo Pack</label>
                        </div>


                        <input type="text" name="quantity" value="1" class="form-control" />

                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                            value="Add to Cart" />

                    </div>
                </form>
            </div>

            <?php
                        }
                    }
                }
            }
            ?>
        </div>
        <div style="clear:both"></div>
        <br />

    </div>
    </div>
    <br />

</body>
<?php include 'footer.php'; ?>

</html>