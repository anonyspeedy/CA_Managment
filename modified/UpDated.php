<?php

if (isset($_POST['stock_id']) && isset($_POST['tag_no'])) {
    $stock_id = $_POST['stock_id'];
    $tag_no = $_POST['tag_no'];
    $serial_no = $_POST['serial_no'];
    $Date = $_POST['Date'];
    $checked_by = $_POST['checked_by'];
    $board_serial = $_POST['board_serial'];

    include "../db_conn.php";

    if (isset($_POST['serial_no']) && empty($_POST['serial_no'])) {
        header("Location: ../index.php?error=Serial number is required.");
        exit;
    } else {
        $Shutter = (isset($_POST['Shutter'])) ? "Yes" : "No";
        $Chipset = (isset($_POST['Chipset'])) ? "Yes" : "No";
        $Roller = (isset($_POST['Roller'])) ? "Yes" : "No";
        $Track = (isset($_POST['Track'])) ? "Yes" : "No";
        $Prehead = (isset($_POST['Prehead'])) ? "Yes" : "No";
        $Motor = (isset($_POST['Motor'])) ? "Yes" : "No";
        $plastic_cover = (isset($_POST['plastic_cover'])) ? "Yes" : "No";

        // Add other variables as needed...

        $sql = "INSERT INTO reciving (stock_id, tag_no, serial_no, Shutter, Chipset, Roller, 
                                      Track, Prehead, Motor, plastic_cover, Date, checked_by, board_serial) 
                VALUES('$stock_id', '$tag_no', '$serial_no', '$Shutter', '$Chipset', '$Roller',
                      '$Track', '$Prehead', '$Motor', '$plastic_cover', '$Date', '$checked_by', '$board_serial')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $error = "Successfully created";
            header("Location: ../index.php?error=");
            exit;
        } else {
            $error = "Unknown error occurred";
            header("Location: ../index.php?error=");
            exit;
        }
    }
} else {
    header("Location: ../index.php");
    exit;
}
