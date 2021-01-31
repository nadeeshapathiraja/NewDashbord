<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
// Include config file
require_once "config.php";
?>

<?php
require_once("config.php");
$results = mysqli_query($con, "SELECT * FROM tbl_product");
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
        <br>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <a class="btn btn-info" href="addproduct.php?>">Add Product</a>
            </div>
        </div>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <form action="#">
                        <td><img src='images/<?php echo $row['image']; ?>' width=100px height=100px /><br /></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="editProduct.php?id=<?php echo $row["id"]; ?>">Edit</a>
                            <a class="btn btn-danger" href="deleteProduct.php?id=<?php echo $row["id"]; ?>">Delete</a>
                            <?php
                                if ($row['activity'] == 1) {

                                ?>
                            <input class="btn btn-primary" name="activity" type="submit" value="Active" readonly>
                            <?php
                                } else {
                                ?>
                            <input class="btn btn-secondary" name="activity" type="submit" value="Active" readonly>
                            <?php
                                }
                                ?>

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