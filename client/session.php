<?php 
if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];

    include("../connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_first_name = $row["first_name"];
        $db_id = $row["user_id"];
    }
?>