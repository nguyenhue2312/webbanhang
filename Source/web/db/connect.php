<?php
    // $conn=mysqli_connect("localhost", "root", "") or die("can't connect database");
    // mysqli_select_db($conn,"web");

$conn = new mysqli('localhost','root', '', 'web');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>