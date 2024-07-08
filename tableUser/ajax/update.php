<?php
include "connection.php";

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$username = $_POST['username'];
$role = $_POST['role'];
$email = $_POST['email'];
$status = $_POST['status'];
$id = $_POST['id'];

$sql = "SELECT USER_ID FROM user WHERE USERNAME = '$username' AND USER_ID != $id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){

    $conn->query("UPDATE
        `user`
    SET
        `USER_LNAME` = '$lastname',
        `USER_FNAME` = '$firstname',
        `USER_MNAME` = '$middlename',
        `USERNAME` = '$username',
        `USER_ROLE` = '$role',
        `USER_STATUS` = '$status',
        `USER_EMAIL` = '$email'
    WHERE
        `USER_ID` = $id
    ");

} else {
    echo "duplicate";
}


?>