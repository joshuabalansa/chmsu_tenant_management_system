<?php
include("../connections.php");
if (isset($_GET['update'])) {
    $id = $_GET["update"];
    $get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_first_name = $row["fname"];
        $db_middle_name = $row["midname"];
        $db_last_name = $row["lname"];
        $db_address = $row["address"];
        $db_email = $row["email"];
        $db_birth_date = $row["birth_date"];
        $db_contact = $row["contact"];
    }
}

if (isset($_POST["save"])) {
    $new_first_name = $_POST["new_first_name"];
    $new_middle_name = $_POST["new_middle_name"];
    $new_last_name = $_POST["new_last_name"];
    $new_birth_date = $_POST["new_birth_date"];
    $new_address = $_POST["new_address"];
    $new_email = $_POST["new_email"];
    $new_contact = $_POST["new_contact"];
    $new_password = $_POST["new_password"];

    //change info in table Tenants
    mysqli_query($connections, "UPDATE tenants
    SET fname='$new_first_name', midname='$new_middle_name', lname='$new_last_name', address='$new_address', birth_date='$new_birth_date', email='$new_email', contact='$new_contact' WHERE id='$id'");

    // change info in table users
    mysqli_query($connections, "UPDATE users SET password='$new_password' WHERE user_id='$id'");

    header("location: profile.php");
}
?>
<?php
include("profile_update.php");

?>
