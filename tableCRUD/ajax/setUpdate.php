<?php
include "connection.php";

$id = $_POST['id'];

$sql = "SELECT RID, SAMPLE_DESC FROM list_sample WHERE RID = $id";
$result = $conn->query($sql);

// Convert result set to JSON
$records = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records['a'] = $row['RID'];
        $records['b'] = $row['SAMPLE_DESC'];
    }
}

header('Content-Type: application/json');
echo json_encode($records);

?>