<?php
// Include config file
require_once "config.php";
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<?php
require_once("config.php");
$results = mysqli_query($con, "SELECT * FROM orders ORDER BY id DESC");
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
        <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
        </script>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" onclick="toggle(this);">
            <label class="form-check-label" for="defaultCheck1">
                Select All
            </label>
        </div>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th> </th>
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </div>
                        </td>
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
                        <td style="width:250px"><?php
                                                    $data = JSON_DECODE($row['final_cart_item'], true);
                                                    foreach ($data as $item) {
                                                        // echo $item["item_name"];
                                                        $array = json_decode(json_encode($item), true);
                                                        echo "Name: " . $array['item_name'] . "  " . "Size: " . $array['cupsize'] . "<br>";
                                                        echo "Quantity: " . $array['item_quantity'] . "<br>";
                                                        //var_dump($array);
                                                    }
                                                    ?>

                        </td>
                        <td><?php echo $row['ordered_at']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="editProduct.php?id=<?php echo $row["id"]; ?>">Edit</a><br>
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