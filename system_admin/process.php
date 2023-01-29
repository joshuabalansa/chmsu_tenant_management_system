<?php
include("../connections.php");

if (isset($_GET["view"])) {
    $id = $_GET["view"];

    $get_record = mysqli_query($connections, "SELECT * FROM coordinators WHERE id='$id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_user_id = $row["user_id"];
        $db_firstname = $row["first_name"];
        $db_user_id = $row["user_id"];
        $db_middlename = $row["middle_name"];
        $db_lastname = $row["last_name"];
        $db_email = $row["email"];
        $db_contact = $row["contact"];
    }
    $fullname = ucfirst($db_firstname) . " " . ucfirst($db_middlename) . ", " . ucfirst($db_lastname);
    include("users_info.php");
}
if (isset($_GET["archive"])) {
    $id = $_GET["archive"];

    $get_record = mysqli_query($connections, "SELECT * FROM coordinators WHERE id='$id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_user_id = $row["user_id"];
        $db_firstname = $row["first_name"];
        $db_user_id = $row["user_id"];
        $db_middlename = $row["middle_name"];
        $db_lastname = $row["last_name"];
        $db_email = $row["email"];
        $db_contact = $row["contact"];
    }
    $fullname = ucfirst($db_firstname) . " " . ucfirst($db_middlename) . ", " . ucfirst($db_lastname);
    include("archive_info.php");
}

if (isset($_GET["deactivate"])) {
    $id = $_GET["deactivate"];
    mysqli_query($connections, "UPDATE users SET account_type='archived' WHERE user_id='$id' ");

    mysqli_query($connections, "UPDATE coordinators SET status='archived' WHERE user_id='$id' ");
    header("location: users.php");
}

if (isset($_GET["reactivate"])) {
    $id = $_GET["reactivate"];
    mysqli_query($connections, "UPDATE users SET account_type='active' WHERE user_id='$id' ");

    mysqli_query($connections, "UPDATE coordinators SET status='active' WHERE user_id='$id' ");
    header("location: users.php");
}
