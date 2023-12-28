<?php
if (isset($_GET['id'])) {
include("db_conn.php");
$id = $_GET['id'];
$sql = "DELETE FROM b_reciving WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Deleted Successfully!";
    header("Location:b_display.php");
}else{
    die("Something went wrong");
}
}else{
    echo "Board does not exist";
}
?>