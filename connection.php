<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "management_system";

/*
$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";


$conn->query($sql);


$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    USER_CODE VARCHAR(128) NOT NULL,
    USER_LNAME VARCHAR(128) NOT NULL,
    USER_FNAME VARCHAR(128) NOT NULL,
    USER_MNAME VARCHAR(128) NOT NULL,
    USERNAME VARCHAR(128) NOT NULL,
    PASSWORD VARCHAR(128) NOT NULL,
	USER_ROLE VARCHAR(128) NOT NULL,
    USER_STATUS VARCHAR(128) NOT NULL
)";

$conn->query($sql);


$sql = "INSERT IGNORE INTO
        `user`(
            `id`,
            `USER_CODE`,
            `USER_LNAME`,
            `USER_FNAME`,
            `USER_MNAME`,
            `USERNAME`,
            `PASSWORD`,
            `USER_ROLE`,
            `USER_STATUS`
        )
        VALUES(
        1,
        '0001',
        'ADMIN',
        'ADMIN',
        '',
        'admin',
        '827ccb0eea8a706c4c34a16891f84e7b',
        '0',
        '1'
    )";
$conn->query($sql);

$conn->close();
*/


$conn = new mysqli($servername, $username, $password, $dbname);
$testConn = "Connection Successfully";


function getClientIP() {
    // Check for shared Internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IP addresses passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Extract IP addresses from CSV list
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ipList as $ip) {
            // Use the first non-local IP address
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                return $ip;
            }
        }
    }
    // Use remote address if nothing else found
    return $_SERVER['REMOTE_ADDR'];
}
?>