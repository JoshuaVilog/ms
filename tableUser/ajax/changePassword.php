<?php
include "connection.php";

$id = $_POST['id'];
$randomNumber = generateRandomNumber();
$newPassword = md5($randomNumber);

$conn->query("UPDATE `user` SET `PASSWORD`='$newPassword' WHERE USER_ID = '$id'");

echo $randomNumber;

function generateRandomNumber() {
    $min = 10000; // Minimum value for a 5-digit number
    $max = 99999; // Maximum value for a 5-digit number
    return rand($min, $max);
}
?>