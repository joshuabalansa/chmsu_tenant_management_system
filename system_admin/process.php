<?php
include("../connections.php");

if (isset($_GET["view"])) {
    $id = $_GET["view"];

    $get_record = mysqli_query($connections, "SELECT * FROM coordinators WHERE id='$id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_firstname = $row["first_name"];
        $db_middlename = $row["middle_name"];
        $db_lastname = $row["last_name"];
        $db_email = $row["email"];
        $db_contact = $row["contact"];
    }
    $fullname = ucfirst($db_firstname) . " " . ucfirst($db_middlename) . ", " . ucfirst($db_lastname);
    include("users_info.php");
}

if (isset($_GET["deactivate"])) {
    $id = $_GET["deactivate"];
    $get_info = mysqli_query($connections, "SELECT * FROM coordinators WHERE id='$id'");

    while ($row = mysqli_fetch_assoc($get_info)) {
        $db_firstname = $row["first_name"];
    }
    echo $db_firstname;
}
