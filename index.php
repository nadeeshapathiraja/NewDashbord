<?php
// Include config file
require_once "config.php";
//include auth_session.php file on all user panel pages
include("auth_session.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>kolakanda Menu</title>
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
    <div class="container" style="margin-top: 50px;">
        <?php
        if ($user_role == "admin") {
        ?>

        <div class="row">
            <div class="col-md-3">
                <a href="addproduct.php">
                    <div class="card" style="height: 350px;">
                        <img src="images/about.png" alt="#" />
                        <div class="card-body">
                            <h4 class="card-title">Add Products</h4>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="fullcontrol.php">
                    <div class="card" style="height: 350px;">
                        <img src="images/about.png" alt="#" />
                        <div class="card-body">
                            <h4 class="card-title">Product Control</h4>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="userControl.php">
                    <div class="card" style="height: 350px;">
                        <img src="images/about.png" alt="#" />
                        <div class="card-body">
                            <h4 class="card-title">User Control</h4>

                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="orderControl.php">
                    <div class="card" style="height: 350px;">
                        <img src="images/about.png" alt="#" />
                        <div class="card-body">
                            <h4 class="card-title">Order Control</h4>

                        </div>
                    </div>
                </a>
            </div>
        </div>

        <?php

        } else if ($user_role == "customer") {

        ?>

        <div class="row">
            <div class="col-md-6">
                <a href="kolakanda.php">
                    <div class="card" style="width:400px; height: 450px;">
                        <img src="images/logo.png" alt="#" />
                        <div class="card-body">
                            <h4 class="card-title">Kola Kanda</h4>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="breakfirst.php">
                    <div class="card" style="width:400px; height: 450px;">
                        <img src="images/logo2.jpg" alt="#" />
                        <div class="card-body">
                            <h4 class="card-title">Breakfirst</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php

        }

        ?>

        <br>
    </div>
    <br>
    <?php include 'footer.php'; ?>

</body>

</html>