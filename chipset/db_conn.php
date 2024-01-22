<?php

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "ca_managment";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}