<?php
include "connection.php";

date_default_timezone_set('Asia/Manila');
$createdAt = date("Y-m-d H:i:s");
$getIP = getClientIP();


$desc = $conn->real_escape_string($_POST['desc']);
$category = $_POST['category'];

$sql = "SELECT `SAMPLE_DESC` FROM `list_sample2` WHERE SAMPLE_DESC = '$desc'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){

    $conn->query("INSERT INTO `list_sample2`(
        `RID`,
        `SAMPLE_DESC`,
        `SAMPLE_ID`
    )
    VALUES(
        DEFAULT,
        '$desc',
        '$category'
    )");
    
} else {
    echo "duplicate";
}


function formatNumber($number, $desiredLength) {
    $formattedNumber = str_pad($number, $desiredLength, '0', STR_PAD_LEFT);
    return $formattedNumber;
}
?>