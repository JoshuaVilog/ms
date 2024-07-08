<?php
include "connection.php";

date_default_timezone_set('Asia/Manila');
$createdAt = date("Y-m-d H:i:s");
$getIP = getClientIP();


$desc = $conn->real_escape_string($_POST['desc']);

$sql = "SELECT SAMPLE_DESC FROM list_sample WHERE CONCAT(SAMPLE_DESC, COALESCE(DELETED_AT, '')) = '$desc'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){

    $conn->query("INSERT INTO `list_sample`(
        `RID`,
        `SAMPLE_DESC`
    )
    VALUES(
        DEFAULT,
        '$desc'
    )");
    
} else {
    echo "duplicate";
}


function formatNumber($number, $desiredLength) {
    $formattedNumber = str_pad($number, $desiredLength, '0', STR_PAD_LEFT);
    return $formattedNumber;
}
?>