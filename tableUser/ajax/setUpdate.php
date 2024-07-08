<?php
include "connection.php";

$id = $_POST['id'];

$sql = "SELECT `USER_ID`, `USER_LNAME`, `USER_FNAME`, `USER_MNAME`, `USERNAME`, `USER_ROLE`, `USER_STATUS`, `USER_EMAIL` FROM user WHERE USER_ID = $id";
$result = $conn->query($sql);

$records = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records['a'] = $row['USER_ID'];
        $records['b'] = $row['USER_LNAME'];
        $records['c'] = $row['USER_FNAME'];
        $records['d'] = $row['USER_MNAME'];
        $records['e'] = $row['USERNAME'];
        $records['f'] = $row['USER_ROLE'];
        $records['g'] = $row['USER_STATUS'];
        $records['h'] = $row['USER_EMAIL'];
    }
}

header('Content-Type: application/json');
echo json_encode($records);

?>