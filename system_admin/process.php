<?php
include("../connections.php");

if (isset($_GET["view"])) {
    $id = $_GET["view"];

    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_firstname = $row["first_name"];
    }
    echo $db_firstname;
}
