<!-- Check user is loged in system -->
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
    header("location: login.php");
}
?>

<?php
require_once("config.php");
$results = mysqli_query($con, "SELECT * FROM orders");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br><br><br><br><br><br>

    <div class="container">
        <h2>Admin Product Control</h2>
        <br>
        <div class="row">
            <h2>Add Order</h2>
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <a class="btn btn-info" href="kolakanda.php?>">Kolakand</a>
                <a class="btn btn-info" href="breakfirst.php?>">Breckfirst</a>
            </div>
        </div>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Place</th>
                    <th>Comment</th>
                    <th>Cart Items</th>
                    <th>Ordered Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <form action="#">
                        <td>
                            <?php
                                echo $i;
                                $i++;
                                ?>
                        </td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['place']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo $row['final_cart_item']; ?></td>
                        <td><?php echo $row['ordered_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="editProduct.php?id=<?php echo $row["id"]; ?>">Edit</a>
                            <a class="btn btn-danger" href="deleteProduct.php?id=<?php echo $row["id"]; ?>">Delete</a>
                        </td>
                    </form>

                </tr>
                <?php
                    $id_delete =  $row['id'];
                } ?>
            </tbody>
        </table>

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>

<!-- Delete -->
<?php
require_once("config.php");

if (isset($_REQUEST["delete"])) {

    $sql2 = "DELETE FROM tbl_product WHERE id=$id_delete";

    $result2 = mysqli_query($con, $sql2);


    if ($con->query($sql2) === TRUE) {
        echo "Record Delete successfully: $result2<br />";
?>
<script type="text/javascript">
window.location = "fullcontrol.php";
</script>
<?php
    } else {
        echo "Error updating record: " . $con->error;
    }

    mysqli_close($con);
}
?>