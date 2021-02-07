<?php
session_start();
//include auth_session.php file on all user panel pages
include("auth_session.php");
// Include config file
require_once "config.php";

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

    <div class="container-fluid">
        <h2>Admin Product Control</h2>
        <br>
        <h2>Add Order</h2>
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-info" href="kolakanda.php?>">Kolakand</a>
                <a class="btn btn-info" href="breakfast.php?>">Breckfast</a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">

                <!-- Searh Form -->
                <form action="#" method="post">
                    <div class="row">
                        <!-- Take Filter Date -->
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" value="yyyy-mm-dd"
                                        max="<?php echo date('Y-m-d'); ?>" name="filterDate">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group">
                                <label for="example-date-input" class="col-3 col-form-label">Branch</label>
                                <div class="col-9">
                                    <!-- take filter City -->
                                    <div class="form-group">
                                        <select class="form-control" id="filterCity" name="filterCity">
                                            <?php
                                            $queryCity = "SELECT * FROM tbl_city ORDER BY city_name ASC";
                                            $resultCity = mysqli_query($con, $queryCity);
                                            if (mysqli_num_rows($resultCity) > 0) {
                                                while ($rowCity = mysqli_fetch_array($resultCity)) {
                                            ?>
                                            <option value="<?php echo $rowCity['city_name']; ?>">
                                                <?php echo $rowCity['city_name']; ?>
                                            </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-primary" value="Search" name="search" />
                            </div>
                        </div>
                    </div>
                </form>

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
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th> </th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Branch Name</th>
                            <th>Place</th>
                            <th>Cart Items</th>
                            <th>Ordered Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_POST['search'])) {
                            $filterDate = $_POST['filterDate'];
                            $filterCity = $_POST['filterCity'];

                            //$results = mysqli_query($con, "SELECT * FROM orders WHERE city=$filterCity AND ordered_at=$filterDate ORDER BY id DESC");
                            $results = mysqli_query($con, "SELECT * FROM orders WHERE city LIKE '%{$filterCity}%' AND ordered_at LIKE '%{$filterDate}%' ORDER BY id DESC");

                            $i = 1;
                            while ($rows = mysqli_fetch_array($results)) { ?>
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
                                <td><?php echo $rows['first_name'] . ' ' . $rows['last_name']; ?></td>
                                <td><?php echo $rows['phone']; ?></td>
                                <td><?php echo $rows['address']; ?></td>
                                <td><?php echo $rows['city']; ?></td>
                                <td><?php echo $rows['place']; ?></td>
                                <td style="width:250px"><?php
                                                                $data = JSON_DECODE($rows['final_cart_item'], true);
                                                                if (is_array($data) || is_object($data)) {
                                                                    foreach ($data as $item) {
                                                                        // echo $item["item_name"];
                                                                        $array = json_decode(json_encode($item), true);
                                                                        $size = '';
                                                                        if ($array["size"] == 0) {
                                                                            $size =  "Regular Pack";
                                                                        } else if ($array["size"] == 1) {
                                                                            $size =  "Combo Pack";
                                                                        } else if ($array["size"] == 300) {
                                                                            $size =  "300ml";
                                                                        } else if ($array["size"] == 400) {
                                                                            $size =  "400ml";
                                                                        }
                                                                        echo "Name: " . $array['item_name'] . "<br>";
                                                                        echo  "Size: " . $size  . "<br>";
                                                                        echo "Quantity: " . $array['item_quantity'] . "<br>";
                                                                        //var_dump($array);
                                                                    }
                                                                }
                                                                ?>

                                </td>
                                <td><?php echo $rows['ordered_at']; ?></td>
                                <td>
                                    <a class="btn btn-warning"
                                        href="editProduct.php?id=<?php echo $rows["id"]; ?>">Edit</a><br>
                                    <a class="btn btn-danger"
                                        href="deleteProduct.php?id=<?php echo $rows["id"]; ?>">Delete</a>
                                </td>
                            </form>

                        </tr>
                        <?php

                                $id_delete =  $rows['id'];
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <?php include 'footer.php'; ?>
</body>

</html>

<!-- Delete -->
<?php

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