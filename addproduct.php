<?php

if (isset($_POST['name'])) {
    if (count($_POST) > 0) {

        $errors = array();
        $name = $_POST['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];
        $description = $_POST['description'];

        // include config file
        require_once("config.php");
        $target = "images/" . basename($file_name);
    
        $sql = "INSERT INTO tbl_product (name, image, description) VALUES ('$name','$file_name','$description')";
        $result = mysqli_query($con, $sql);

        if ($result == 1) {
            //uplord file to server
            //make file uplord path
            $path = "images/" . $_FILES["image"]["name"];
            //uplord
            move_uploaded_file($_FILES["image"]["tmp_name"], $path);
            //header('location: fullcontrol.php');
        }
        header('location: addproduct.php');
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Kolakenda</title>
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
    <div class="container">

        <form method="post" action="#" enctype="multipart/form-data">
            <div class="message">
                <?php if (isset($message)) {
                    echo $message;
                } ?>
            </div>
            <div class="card" style="width:400px">

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                </div>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                    <button class="btn btn-warning" type="reset" value="Reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>