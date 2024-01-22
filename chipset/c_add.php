<?php
include('../db_conn.php');

if (isset($_POST["Add"])) {
    // Your existing code for inserting data before this point
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $tag_no = mysqli_real_escape_string($conn, $_POST['tag_no']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);
    $Remark = mysqli_real_escape_string($conn, $_POST['Remark']);
 
   
    if (empty($Date)) {
        // Query to get the last date from the database
        $lastDateQuery = "SELECT MAX(Date) AS last_date FROM c_reciving";
        $lastDateResult = mysqli_query($conn, $lastDateQuery);

        // Fetch the last date
        $lastDateRow = mysqli_fetch_assoc($lastDateResult);
        $lastDate = $lastDateRow['last_date'];

        // If the last date is available, use it
        if ($lastDate) {
            $Date = $lastDate;
        }
    }

        $sqlInsert = "INSERT INTO c_reciving (stock_id, tag_no, Date, Remark  ) 
                  VALUES('$stock_id', '$tag_no', '$Date', '$Remark'   )";


        if (mysqli_query($conn, $sqlInsert)) {
            session_start();
            $_SESSION["create"] = "Added Successfully!";
            header("Location:c_reciving.php");
            exit();
        } else {
            die("Something went wrong");
        }
    }


if (count($_POST) > 0) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $tag_no = mysqli_real_escape_string($conn, $_POST['tag_no']);   
    if (isset($_POST['Date']) && empty($_POST['Date'])) {
        header("Location: edit.php?error=Date is required.");
        exit;
    }

    
        mysqli_query($conn, "UPDATE c_reciving SET stock_id = '$stock_id', tag_no = '$tag_no', Remark = '$Remark' WHERE id='$id'");
        $result = mysqli_query($conn, "SELECT * FROM b_reciving WHERE id='$id'");
        $row = mysqli_fetch_array($result);

        
        session_start();
        $_SESSION["update"] = "Record updated successfully!";
        header("Location: edit.php?id=$id");
        exit();
    }



?>
