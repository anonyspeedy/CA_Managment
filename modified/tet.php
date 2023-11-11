<?php

if (isset($_POST['stock_id']) && isset($_POST['tag_no'])) {
  $stock_id = $_POST['stock_id'];
  $tag_no = $_POST['tag_no'];

  include "../db_conn.php";

  if (isset($_POST['serial_no']) && empty($_POST['serial_no'])) {
    header("Location: ../index.php?error=Serial number is required.");
    exit;
  }else {
    if (isset($_POST['Shutter'])){
        $Shutter = "Yes";
    }else {
        $Shutter = "No";
    }
    if (isset($_POST['Chipset'])){
      $Shutter = "Yes";
  }else {
      $Shutter = "No";
  } if (isset($_POST['Roller'])){
    $Shutter = "Yes";
  }else {
    $Shutter = "No";
  } if (isset($_POST['Track'])){
    $Shutter = "Yes";
  }else {
    $Shutter = "No";
  } if (isset($_POST['Prehead'])){
    $Shutter = "Yes";
  }else {
    $Shutter = "No";
  } if (isset($_POST['Motor'])){
    $Shutter = "Yes";
  }else {
    $Shutter = "No";
  } if (isset($_POST['plastic_cover'])){
    $Shutter = "Yes";
  }else {
    $Shutter = "No";
  }

    $sql = "INSERT INTO reciving (stock_id, tag_no, serial_no, Shutter, Chipset, Roller, 
                                  Track, Prehead, Motor, plastic_cover, Date, checked_by, board_serial) 
          VALUES('$stock_id', '$tag_no', '$serial_no', '$Shutter', '$Chipset', '$Roller',
                  '$Track', '$Prehead', '$Motor', '$plastic_cover', '$Date', '$checked_by', '$board_serial')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      $pass = "Successfully created";
      header("Location: ../index.php?success=" . urlencode($pass));
      exit;
  } else {
      $error = "Unknown error occurred";
      header("Location: ../index.php?error=" . urlencode($error));
      exit;
  }
  


}
} else {
  header("Location: ../index.php");
  exit;
}






/*
stock_id
tag_no
serial_no
Shutter
Chipset
Roller
Track
Prehead
Motor
plastic_cover
Date
checked_by
board_serial




*/