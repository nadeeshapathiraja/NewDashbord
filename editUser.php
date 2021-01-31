<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
// Include config file
require_once "config.php";
?>
<!-- load updated data -->
<?php
require_once("config.php");
$id_editUser = $_REQUEST['id'];
$query = "SELECT * from users where id='$id_editUser' ";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
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
            <h2>Admin Edit Usera</h2>
            <div class="card" style="width:400px">

                <?php while ($row = mysqli_fetch_array($result)) { ?>

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">User Name:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $row['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">User Role:</label>
                        <input type="text" class="form-control" id="user_role" name="user_role"
                            value="<?php echo $row['user_role']; ?>">
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                    <button class="btn btn-warning" type="reset" value="Reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>

<?php
if (isset($_POST['update'])) {
    if (isset($_POST['username']) && isset($_POST['user_role'])) {
        if (count($_POST) > 0) {

            $username = $_POST['username'];
            $user_role = $_POST['user_role'];

            $sql2 = "UPDATE users SET username='$username' , user_role='$user_role' WHERE id=$id_editUser";
            $result2 = mysqli_query($con, $sql2);

            mysqli_close($con);
            echo "<script>alert('Successfully Updated!!!'); window.location='userControl.php'</script>";
        }
    } else {
        echo "<script class='alert alert-danger'>alert('Fill All Fields');</script>";
    }
}



?>