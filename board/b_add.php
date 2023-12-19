<?php
include('../db_conn.php');

if (isset($_POST["Add"])) {
    // Your existing code for inserting data before this point
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $tag_no = mysqli_real_escape_string($conn, $_POST['tag_no']);
    // Check if the serial number is empty, if yes, set it to "no-serial"
    $board_serial = isset($_POST['board_serial']) && !empty($_POST['board_serial']) ? mysqli_real_escape_string($conn, $_POST['board_serial']) : "no-serial";

    $Remark = mysqli_real_escape_string($conn, $_POST['Remark']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $Remark = mysqli_real_escape_string($conn, $_POST['Remark']);
 
    
    // Check if the board serial is empty, if yes, set it to "no-serial"
    

    // Check if the date is empty
    if (empty($Date)) {
        // Query to get the last date from the database
        $lastDateQuery = "SELECT MAX(Date) AS last_date FROM b_reciving";
        $lastDateResult = mysqli_query($conn, $lastDateQuery);

        // Fetch the last date
        $lastDateRow = mysqli_fetch_assoc($lastDateResult);
        $lastDate = $lastDateRow['last_date'];

        // If the last date is available, use it
        if ($lastDate) {
            $Date = $lastDate;
        }
    }

        $sqlInsert = "INSERT INTO b_reciving (stock_id, tag_no, board_serial, Date, status, Remark  ) 
                  VALUES('$stock_id', '$tag_no', '$board_serial', '$Date', '$status', '$Remark'   )";


        if (mysqli_query($conn, $sqlInsert)) {
            session_start();
            $_SESSION["create"] = "Added Successfully!";
            header("Location:b_reciving.php");
            exit();
        } else {
            die("Something went wrong");
        }
    }


if (count($_POST) > 0) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $tag_no = mysqli_real_escape_string($conn, $_POST['tag_no']);   
    $board_serial = mysqli_real_escape_string($conn, $_POST['board_serial']);

    if (isset($_POST['Date']) && empty($_POST['Date'])) {
        header("Location: edit.php?error=Date is required.");
        exit;
    }

    
        mysqli_query($conn, "UPDATE b_reciving SET stock_id = '$stock_id', tag_no = '$tag_no', board_serial = '$board_serial', status = '$status' WHERE id='$id'");
        $result = mysqli_query($conn, "SELECT * FROM b_reciving WHERE id='$id'");
        $row = mysqli_fetch_array($result);

        
        session_start();
        $_SESSION["update"] = "Record updated successfully!";
        header("Location: edit.php?id=$id");
        exit();
    }



?>
