<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "instacred";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
date_default_timezone_set("Asia/Calcutta");

if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
    $sql = "SELECT * FROM admin WHERE email='$user'";
    $query = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_assoc($query)) {
        $global_id = $rows['id'];
        $global_name = $rows['name'];
        $global_email = $rows['email'];
        if($global_name == "") {
            $global_name = "User";
        } else {
            $global_name = $global_name;
        }
    }
}
?>
