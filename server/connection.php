<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "tp_php");

if (!$conn) {
    die("Could not connect to database: " . mysqli_connect_error());
}
?>
