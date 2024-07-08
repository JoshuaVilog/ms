<?php
include "connection.php";

$sql = "SELECT RID, SAMPLE_DESC FROM list_sample WHERE COALESCE(DELETED_AT, '') = ''";
$result = $conn->query($sql);

// Convert result set to JSON
$records = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = array(
            "a" => $row['RID'],
            "b" => $row['SAMPLE_DESC'],
        );
    }
}

header('Content-Type: application/json');
echo json_encode($records);

?>