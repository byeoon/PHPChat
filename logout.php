<?php 
session_start();
require_once('db_conn.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $update_status_sql = "UPDATE userTable SET status='offline' WHERE username='$username'";
    mysqli_query($conn, $update_status_sql);
}
session_unset();
session_destroy();
header("Location: https://github.com/byeoon/PHPChat");
?>
