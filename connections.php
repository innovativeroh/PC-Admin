<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "instacred";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
date_default_timezone_set("Asia/Calcutta");

$sql = "SELECT *,DATE_FORMAT(dob,'%Y-%m-%d') AS dob FROM `user`";
$query = mysqli_query($conn, $sql);
$result = $conn->query($sql);
?>
