<!-- Delete -->
<?php
require_once("config.php");
$id_delete = $_REQUEST['id'];

$sql = "DELETE FROM users WHERE id=$id_delete";

$result = mysqli_query($con, $sql);
header("Location: userControl.php");
?>