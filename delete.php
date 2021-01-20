<!-- Delete -->
<?php
require_once("config.php");
$id_delete = $_REQUEST['id'];

$sql = "DELETE FROM tbl_product WHERE id=$id_delete";

$result = mysqli_query($con, $sql);
header("Location: fullcontrol.php");
// $result = mysqli_query($con, $sql);


// if ($con->query($sql) === TRUE) {
//     echo "Record Delete successfully: $result<br />";
//     header("Location: view.php");
// }
?>