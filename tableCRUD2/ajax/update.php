<?php
include "connection.php";

date_default_timezone_set('Asia/Manila');
$createdAt = date("Y-m-d H:i:s");
$getIP = getClientIP();

$id = $_POST['id'];
$desc = $conn->real_escape_string($_POST['desc']);
$category = $conn->real_escape_string($_POST['category']);

$sql = "SELECT SAMPLE_DESC FROM list_sample2 WHERE CONCAT(SAMPLE_DESC, COALESCE(DELETED_AT, '')) = '$desc' AND RID != $id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){

    $conn->query("UPDATE
        `list_sample2`
    SET
        `SAMPLE_DESC` = '$desc',
        `SAMPLE_ID` = '$category'
    WHERE
        `RID` = $id");
    
} else {
    echo "duplicate";
}

?>