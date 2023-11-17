<?php
include('../db_conn.php');

if (isset($_POST["Add"])) {
    // Your existing code for inserting data before this point
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $tag_no = mysqli_real_escape_string($conn, $_POST['tag_no']);
    $serial_no = mysqli_real_escape_string($conn, $_POST['serial_no']);
    $Remark = mysqli_real_escape_string($conn, $_POST['Remark']);
    $Date = mysqli_real_escape_string($conn, $_POST['Date']);
    $checked_by = mysqli_real_escape_string($conn, $_POST['checked_by']);
    $board_serial = mysqli_real_escape_string($conn, $_POST['board_serial']);

    if (isset($_POST['Date']) && empty($_POST['Date'])) {
        header("Location: ../Add.php?error=Date is required.");
        exit;
    }

    if (isset($_POST['serial_no']) && empty($_POST['serial_no'])) {
        header("Location: ../Add.php?error=Serial number is required.");
        exit;
    } else {
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

    if (isset($_POST['serial_no']) && empty($_POST['serial_no'])) {
        header("Location: ../edit.php?error=Serial number is required.");
        exit;
    } else {
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
}

?>
