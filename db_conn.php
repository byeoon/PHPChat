<?php
$conn = new mysqli("IP:PORT","USERNAME",'PASSWORD',"DB NAME");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
