<?php
include('../db_conn.php');

if (isset($_POST["Add"])) {
    // Your existing code for inserting data before this point
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $tag_no = mysqli_real_escape_string($conn, $_POST['tag_no']);
    // Check if the serial number is empty, if yes, set it to "no-serial"
    $serial_no = isset($_POST['serial_no']) && !empty($_POST['serial_no']) ? mysqli_real_escape_string($conn, $_POST['serial_no']) : "no-serial";
    
    $Remark = mysqli_real_escape_string($conn, $_POST['Remark']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);
    $checked_by = mysqli_real_escape_string($conn, $_POST['checked_by']);
    
    // Check if the board serial is empty, if yes, set it to "no-serial"
    $board_serial = isset($_POST['board_serial']) && !empty($_POST['board_serial']) ? mysqli_real_escape_string($conn, $_POST['board_serial']) : "no-serial";


    // Check if the date is empty
    if (empty($Date)) {
        // Query to get the last date from the database
        $lastDateQuery = "SELECT MAX(Date) AS last_date FROM reciving";
        $lastDateResult = mysqli_query($conn, $lastDateQuery);

        // Fetch the last date
        $lastDateRow = mysqli_fetch_assoc($lastDateResult);
        $lastDate = $lastDateRow['last_date'];

        // If the last date is available, use it
        if ($lastDate) {
            $Date = $lastDate;
        }
    }
        
    
        $Shutter = (isset($_POST['Shutter'])) ? "Yes" : "No";
        $Chipset = (isset($_POST['Chipset'])) ? "Yes" : "No";
        $Roller = (isset($_POST['Roller'])) ? "Yes" : "No";
        $Track = (isset($_POST['Track'])) ? "Yes" : "No";
        $Prehead = (isset($_POST['Prehead'])) ? "Yes" : "No";
        $Motor = (isset($_POST['Motor'])) ? "Yes" : "No";
        $plastic_cover = (isset($_POST['plastic_cover'])) ? "Yes" : "No";

        $sqlInsert = "INSERT INTO reciving (stock_id, tag_no, serial_no, Shutter, Chipset, Roller, 
                                      Track, Prehead, Motor, plastic_cover, Remark, Date, checked_by, board_serial) 
                  VALUES('$stock_id', '$tag_no', '$serial_no', '$Shutter', '$Chipset', '$Roller',
                         '$Track', '$Prehead', '$Motor', '$plastic_cover', '$Remark', '$Date', '$checked_by', '$board_serial')";


        if (mysqli_query($conn, $sqlInsert)) {
            session_start();
            $_SESSION["create"] = "Added Successfully!";
            header("Location:../Add.php");
            exit();
        } else {
            die("Something went wrong");
        }
    }


if (count($_POST) > 0) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $tag_no = mysqli_real_escape_string($conn, $_POST['tag_no']);
    $serial_no = mysqli_real_escape_string($conn, $_POST['serial_no']);
    $board_serial = mysqli_real_escape_string($conn, $_POST['board_serial']);

    $Shutter = (isset($_POST['Shutter'])) ? "Yes" : "No";
    $Chipset = (isset($_POST['Chipset'])) ? "Yes" : "No";
    $Roller = (isset($_POST['Roller'])) ? "Yes" : "No";
    $Track = (isset($_POST['Track'])) ? "Yes" : "No";
    $Prehead = (isset($_POST['Prehead'])) ? "Yes" : "No";
    $Motor = (isset($_POST['Motor'])) ? "Yes" : "No";
    $plastic_cover = (isset($_POST['plastic_cover'])) ? "Yes" : "No";

    if (isset($_POST['Date']) && empty($_POST['Date'])) {
        header("Location: ../edit.php?error=Date is required.");
        exit;
    }

    
        mysqli_query($conn, "UPDATE reciving SET stock_id = '$stock_id', tag_no = '$tag_no', serial_no = '$serial_no',
                      Shutter = '$Shutter', Chipset = '$Chipset', Roller = '$Roller', Track = '$Track',
                      Prehead = '$Prehead', Motor = '$Motor', plastic_cover = '$plastic_cover', board_serial = '$board_serial' WHERE id='$id'");
        $result = mysqli_query($conn, "SELECT * FROM reciving WHERE id='$id'");
        $row = mysqli_fetch_array($result);

        
        session_start();
        $_SESSION["update"] = "Record updated successfully!";
        header("Location: ../edit.php?id=$id");
        exit();
    }



?>
