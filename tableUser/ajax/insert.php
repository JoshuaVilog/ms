<?php
include "connection.php";

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$username = $_POST['username'];
$role = $_POST['role'];
$email = $_POST['email'];

$sql = "SELECT USER_ID FROM user WHERE USERNAME = '$username'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    $password = md5("1");

    $conn->query("INSERT INTO `user`(
        `USER_ID`,
        `USER_LNAME`,
        `USER_FNAME`,
        `USER_MNAME`,
        `USERNAME`,
        `PASSWORD`,
        `USER_ROLE`,
        `USER_STATUS`,
        `USER_EMAIL`
    )
    VALUES(
        DEFAULT,
        '$lastname',
        '$firstname',
        '$middlename',
        '$username',
        '$password',
        '$role',
        '1',
        '$email'
    )");
    echo $conn->insert_id;
} else {
    echo "duplicate";
}


function formatNumber($number, $desiredLength) {
    $formattedNumber = str_pad($number, $desiredLength, '0', STR_PAD_LEFT);
    return $formattedNumber;
}
?>