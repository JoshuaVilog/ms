<?php
include "connection.php";

$sql = "SELECT RID, SAMPLE_DESC, SAMPLE_ID FROM list_sample2 WHERE COALESCE(DELETED_AT, '') = ''";
$result = $conn->query($sql);

// Convert result set to JSON
$records = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = array(
            "a" => $row['RID'],
            "b" => $row['SAMPLE_DESC'],
            "c" => $row['SAMPLE_ID'],
        );
    }
}

header('Content-Type: application/json');
echo json_encode($records);

?>