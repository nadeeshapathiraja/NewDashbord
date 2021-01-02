<?php
require_once("config.php");
$results = mysqli_query($con, "SELECT * FROM tbl_product");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Admin Full Control</h2>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
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
                        <td>
                            <a href="full.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                            <input class="btn btn-danger" name="delete" type="submit" value="Delete">
                        </td>
                    </form>

                </tr>
                <?php
                    $id_delete = $row['id'];
                } ?>
            </tbody>
        </table>

    </div>

</body>

</html>
<?php

require_once("config.php");
if (isset($_REQUEST["delete"])) {



    $sql2 = "DELETE FROM tbl_product WHERE id=$id_delete";

    $result2 = mysqli_query($con, $sql2);


    if ($con->query($sql2) === TRUE) {
        echo "Record Delete successfully: $result2<br />";
    } else {
        echo "Error updating record: " . $con->error;
    }

    mysqli_close($con);

    header('location: fullcontrol.php');
}
?>