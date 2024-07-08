<?php
include "connection.php";

$userCode = $_POST['userCode'];

$sql = "SELECT USER_STATUS FROM user WHERE USER_CODE = '$userCode'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo $row['USER_STATUS'];

?>