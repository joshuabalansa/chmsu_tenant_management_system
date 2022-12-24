<?php
include("../connections.php");
//Fetch Index Summary
$result = mysqli_query($connections, "SELECT COUNT(*) AS `count` FROM tenants WHERE status='pending'");
$row = mysqli_fetch_assoc($result);
$pending = $row['count'];

$result = mysqli_query($connections, "SELECT COUNT(*) AS `count` FROM tenants WHERE status='approved'");
$row = mysqli_fetch_assoc($result);
$tenants = $row['count'];
//Fetch Index Summary

//Fetch Users user_name/ 
$get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_username = $row["username"];
    $db_id = $row["user_id"];
}
    //Fetch Users Name
