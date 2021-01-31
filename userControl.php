<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
// Include config file
require_once "config.php";
?>

<?php
require_once("config.php");
$results = mysqli_query($con, "SELECT * FROM users WHERE user_role='customer'");
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
        <h2>Admin User Control</h2>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>User Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <form action="#">
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['user_role']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="editUser.php?id=<?php echo $row["id"]; ?>">Edit</a>
                            <a class="btn btn-danger" href="deleteUser.php?id=<?php echo $row["id"]; ?>">Delete</a>
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