<!-- Delete -->
<?php
require_once("config.php");
$id_delete = $_GET['id'];

$sql = "DELETE FROM tbl_product WHERE id=$id_delete";

$result = mysqli_query($con, $sql);


if ($result) {
    echo "<script>window.location.href='fullcontrol.php';</script>";
    exit;
}
?>