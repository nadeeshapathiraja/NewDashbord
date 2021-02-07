<?php
session_start();
if (isset($_REQUEST['save'])) {
    if (isset($_POST['name']) && isset($_POST['type'])) {
        if (count($_POST) > 0) {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $city = $_POST['city'];
            // $file_tmp = $_FILES['image']['tmp_name'];
            // $file_name = $_FILES['image']['name'];
            $activity = 1;
            if ($type == 'kolakanda') {
                $file_name = 'kola.jpeg'; //change default pic
            } else if ($type == 'breakfast') {
                $file_name = 'bk.jpg'; //change default pic
            }

            // // include config file
            require_once("config.php");
            // $target = "images/" . basename($file_name);

            $sql = "INSERT INTO tbl_product (name, image, description,type,city,activity) VALUES ('$name','$file_name','$description','$type','$city','$activity')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                $SESSION['addproduct_msg'] = 'Item Inseration Success..!';
            } else {
                echo '<div class="alert alert-danger">Fill All Fields..!</div>';
            }

            // header('location: fullcontrol.php');
        } else {
            echo "erro 1";
        }
    } else {
        echo "erro 2";
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Kolakenda/Breckfirst</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br><br><br><br><br><br>
    <?php
        if ($SESSION['addproduct_msg']) {
            echo '<div class="alert alert-Success">Item Inseration Success..!</div>';
        }
        ?>
    <div class="container">

        <form method="post" action="#" enctype="multipart/form-data">
            <div class="message">
                <?php if (isset($message)) {
                        echo $message;
                    } ?>
            </div>
            <h2>Admin Add Product</h2>
            <div class="card" style="width:400px">

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <!-- <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div> -->
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="description">Type:</label><br>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="kolakanda"
                                    id="type">Kola Kanda
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type"
                                    value="breakfast">Breakfast
                            </label>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="form-control-label">City</label>

                        <select id="city" name="city"><br>
                            <?php
                                require_once("config.php");
                                $query = "SELECT * FROM tbl_city";
                                $result2 = mysqli_query($con, $query);
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row = mysqli_fetch_array($result2)) {
                                ?>
                            <option value="<?php echo $row['city_name'] ?>">
                                <?php echo $row["city_name"]; ?></option>
                            <?php }
                                } ?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                    <button class="btn btn-warning" type="reset" value="Reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>

<?php } else {
    if (isset($_REQUEST['save'])) {
        if (isset($_POST['name']) && isset($_POST['type'])) {
            if (count($_POST) > 0) {

                $name = $_POST['name'];
                $description = $_POST['description'];
                $type = $_POST['type'];
                $city = $_POST['city'];
                // $file_tmp = $_FILES['image']['tmp_name'];
                // $file_name = $_FILES['image']['name'];
                $activity = 1;
                if ($type == 'kolakanda') {
                    $file_name = 'kola.jpeg'; //change default pic
                } else if ($type == 'breakfast') {
                    $file_name = 'bk.jpg'; //change default pic
                }

                // // include config file
                require_once("config.php");
                // $target = "images/" . basename($file_name);

                $sql = "INSERT INTO tbl_product (name, image, description,type,city,activity) VALUES ('$name','$file_name','$description','$type','$city','$activity')";

                $result = mysqli_query($con, $sql);

                if ($result) {
                    $SESSION['addproduct_msg'] = 'Item Inseration Success..!';
                } else {
                    echo '<div class="alert alert-danger">Fill All Fields..!</div>';
                }

                // header('location: fullcontrol.php');
            } else {
                echo "erro 1";
            }
        } else {
            echo "erro 2";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Kolakenda/Breckfirst</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br><br><br><br><br><br>

    <div class="container">

        <form method="post" action="#" enctype="multipart/form-data">

            <h2>Admin Add Product</h2>
            <div class="card" style="width:400px">

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <!-- <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div> -->
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="description">Type:</label><br>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="kolakanda"
                                    id="type">Kola Kanda
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type"
                                    value="breakfast">Breakfast
                            </label>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="form-control-label">City</label>

                        <select id="city" name="city"><br>
                            <?php
                                require_once("config.php");
                                $query = "SELECT * FROM tbl_city";
                                $result2 = mysqli_query($con, $query);
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row = mysqli_fetch_array($result2)) {
                                ?>
                            <option value="<?php echo $row['city_name'] ?>">
                                <?php echo $row["city_name"]; ?></option>
                            <?php }
                                } ?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                    <button class="btn btn-warning" type="reset" value="Reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>

<?php } ?>