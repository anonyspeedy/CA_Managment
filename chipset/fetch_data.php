<?php
// fetch_data.php - Fetch data from the database
include "db_conn.php";

$sql = "SELECT * FROM c_reciving";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>