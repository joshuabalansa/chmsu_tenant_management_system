<?php
include("../connections.php");
if (isset($_GET['update'])) {
    $id = $_GET["update"];
    $get_record = mysqli_query($connections, "SELECT * FROM user_register WHERE id='$id'");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_first_name = $row["fname"];
        $db_middle_name = $row["midname"];
        $db_last_name = $row["lname"];
        $db_address = $row["address"];
        $db_email = $row["email"];
        $db_contact = $row["contact"];
    }

}

if (isset($_POST["save"])) {
    $new_first_name = $_POST["new_first_name"];
    $new_middle_name = $_POST["new_middle_name"];
    $new_last_name = $_POST["new_last_name"];
    $new_address = $_POST["new_address"];
    $new_email = $_POST["new_email"];
    $new_contact = $_POST["new_contact"];
    $new_password = $_POST["new_password"];
    //change info in table user_register
    mysqli_query($connections, "UPDATE user_register
    SET fname='$new_first_name', midname='$new_middle_name', lname='$new_last_name', address='$new_address', email='$new_email', contact='$new_contact' WHERE id='$id'");

    // change info in table users
    mysqli_query($connections, "UPDATE users SET first_name='$new_first_name',  last_name='$new_last_name', password='$new_password' WHERE user_id='$id'");

    header("location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>

    <div class="container mt-5">
        <h6>EDIT PROFILE</h6>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name">First name</label>
                <input placeholder="Enter full name" class="form-control" type="text" name="new_first_name" value="<?php echo $db_first_name ?>" required>
            </div>
            <div class="mb-3">
                <label for="name">Middle Name</label>
                <input placeholder="Enter middle name" class="form-control" type="text" name="new_middle_name" value="<?php echo $db_middle_name ?>" required>
            </div>
            <div class="mb-3">
                <label for="name">Last Name</label>
                <input placeholder="Enter full name" class="form-control" type="text" name="new_last_name" value="<?php echo $db_last_name ?>" required>
            </div>
            <div class="mb-3">
                <label for="name">Address</label>
                <textarea placeholder="Enter your address" class="form-control" type="text" name="new_address" rows="3" required><?php echo $db_address ?></textarea>
            </div>
            <div class="mb-3">
                <label for="name">Email</label>
                <input placeholder="Enter your email" class="form-control" type="email" name="new_email" value="<?php echo $db_email ?>" required>
            </div>
            <div class="mb-3">
                <label for="name">Contact</label>
                <input placeholder="Enter your phone number" maxlength="11" class="form-control" type="text" value="<?php echo $db_contact; ?>" name="new_contact">
            </div>
            <div class="mb-3">
                <label for="name">Change Password</label>
                <input placeholder="Enter your new password" class="form-control" type="password" name="new_password" required>
            </div>
            <div class="mb-3">
                <a href="profile.php" class="btn btn-secondary">Cancel</a>
                <input name="save" type="submit" class="btn btn-info" value="UPDATE">
            </div>
        </form>
    </div>
</body>

</html>