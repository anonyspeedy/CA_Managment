<?php
// Include your database connection file
include('db_conn.php');

$start_date_error = '';
$end_date_error = '';

if (isset($_POST["export"])) {
    if (empty($_POST["start_date"])) {
        $start_date_error = '<label class="text-danger">Start Date is required</label>';
    } else if (empty($_POST["end_date"])) {
        $end_date_error = '<label class="text-danger">End Date is required</label>';
    } else {
        $file_name = 'Reciving_Data.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        $file = fopen('php://output', 'w');

        $header = array("Stock_ID", "Tag_no", "Board Serial", "Date", "Remark", "status");

        fputcsv($file, $header);

        $query = "
        SELECT * FROM b_reciving 
        WHERE Date >= ? 
        AND Date <= ? 
        ORDER BY Date DESC
        ";

        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];

        $statement = $conn->prepare($query);
        $statement->bind_param('ss', $start_date, $end_date);
        $statement->execute();
        $result = $statement->get_result();

        while ($row = $result->fetch_assoc()) {
            $data = array(
                $row["stock_id"],
                $row["tag_no"],
                $row["board_serial"],
                $row["Date"],
                $row["Remark"],
                $row["status"]
                
            );
            fputcsv($file, $data);
        }

        fclose($file);
        exit;
    }
}

$query = "SELECT * FROM b_reciving ORDER BY Date DESC";
$result = $conn->query($query);
?>
