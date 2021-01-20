<?php
require_once("config.php");
$id_edit = $_REQUEST['id'];
$query = "SELECT * from tbl_product where id='$id_edit' ";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Kolakenda/Breckfirst</title>
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

                <?php while ($row = mysqli_fetch_array($result)) { ?>

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <img src='images/<?php echo $row['image']; ?>' width=100px height=100px /><input type="text"
                            class="form-control" id="image" name="image" value="<?php echo $row['image']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <?php if ($row['type'] == 'kolakanda') { ?>
                        <label for="description">Type:</label><br>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="kolakanda" id="type"
                                    checked>Kola Kanda
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type"
                                    value="breakfirst">Breakfirst
                            </label>
                        </div>
                        <?php } else if ($row['type'] == 'breakfirst') {
                            ?>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="kolakanda" id="type"
                                    checked>Kola Kanda
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type"
                                    value="breakfirst">Breakfirst
                            </label>
                        </div>
                        <?php } ?>


                    </div>
                </div>
                <?php
                }
                ?>
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