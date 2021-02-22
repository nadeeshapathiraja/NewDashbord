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

    <!-- Jquery For Get report -->
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- jQuery UI JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br><br><br><br><br><br>

    <div class="container-fluid">
        <h2>Admin Order Control</h2>
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
                                <label for="example-date-input" class="col-4 col-form-label">From Date</label>
                                <div class="col-8">
                                    <input class="form-control" name="from_date" id="from_date" type="date"
                                        placeholder="ssssssssss" max="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-4 col-form-label">To Date</label>
                                <div class="col-8">
                                    <input class="form-control" name="to_date" id="to_date" type="date"
                                        value="yyyy-mm-dd" max="<?php echo date('Y-m-d'); ?>">
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


        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>

                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Branch Name</th>
                            <th>Cart Items</th>
                            <th>Total</th>
                            <th>Ordered Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_POST['search'])) {
                            $from_date = $_POST['from_date'];
                            $to_date = $_POST['to_date'];
                            $filterCity = $_POST['filterCity'];

                            if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
                                $sqlq = "SELECT * FROM orders WHERE  ordered_at BETWEEN '" . $from_date . "' AND '" . $to_date . "' AND city LIKE '%{$filterCity}%'  ORDER BY id DESC";
                            }
                            if (isset($_POST['from_date'])) {
                                $sqlq = "SELECT * FROM orders WHERE  ordered_at LIKE '%{$from_date}%' AND city LIKE '%{$filterCity}%'  ORDER BY id DESC";
                            }

                            //$results = mysqli_query($con, "SELECT * FROM orders WHERE city=$filterCity AND ordered_at=$filterDate ORDER BY id DESC");
                            $results = mysqli_query($con, $sqlq);

                            $i = 1;
                            while ($rows = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <form action="#">

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
                                                                        // echo "Name: " . $array['item_name'] . "<br>";
                                                                        // echo  "Size: " . $size  . "<br>";
                                                                        // echo "Quantity: " . $array['item_quantity'] . "<br>";
                                                                        echo $array['item_name'] . "," . $size . "," . $array['item_quantity'] . "<br>";
                                                                        //var_dump($array);
                                                                    }
                                                                }
                                                                ?>

                                </td>
                                <td><?php echo $rows['total']; ?></td>
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
        <?php

        ?>

    </div>

</body>
<?php include 'footer.php'; ?>

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
window.location = "orderControl.php";
</script>
<?php
    } else {
        echo "Error updating record: " . $con->error;
    }

    mysqli_close($con);
}
?>