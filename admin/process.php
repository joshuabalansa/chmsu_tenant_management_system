<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
</head>

<body>
    <?php
    include("../connections.php");

    //Delete process
    // if (isset($_GET['delete'])) {
    //     $id = $_GET['delete'];
    //     mysqli_query($connections, "UPDATE user_register SET status='disable' WHERE id='$id'");
    //     header("location: tenants.php");
    // }
    //Update Process
    if (isset($_GET['update'])) {
        $id = $_GET["update"];
        $get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
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
        mysqli_query($connections, "UPDATE tenants SET fname='$new_first_name', midname='$new_middle_name', lname='$new_last_name', address='$new_address', email='$new_email', contact='$new_contact' WHERE id='$id'");
        header("location: tenants.php");
    }
    ?>


    <div class="container mt-5">
        <h3>Edit Tenant</h3>

        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <label for="name">First Name</label>
                    <input placeholder="Enter first name" class="form-control" type="text" name="new_first_name" value="<?php echo $db_first_name ?>" required>
                </div>

                <div class="col">
                    <label for="name">Middle Name</label>
                    <input placeholder="Enter middle name" class="form-control" type="text" name="new_middle_name" value="<?php echo $db_middle_name ?>" required>
                </div>
                <div class="col">
                    <label for="name">Last Name</label>
                    <input placeholder="Enter last name" class="form-control" type="text" name="new_last_name" value="<?php echo $db_last_name ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="name">Address</label>
                <input placeholder="Enter your address" class="form-control" type="text" name="new_address" value="<?php echo $db_address ?>" required>
            </div>
            <div class="mb-3">
                <label for="name">Email</label>
                <input placeholder="Enter your email" class="form-control" type="email" name="new_email" value="<?php echo $db_email ?>" required>
            </div>
            <div class="mb-3">
                <label for="name">Contact</label>
                <input onkeypress="return isNumberKey(event)" placeholder="Enter your contact #" maxlength="11" class="form-control" type="text" name="new_contact" value="<?php echo $db_contact ?>" required>
            </div>
            <div class="mb-3">
                <a href="tenants.php" class="btn btn-outline-secondary">Cancel</a>
                <input name="save" type="submit" class="btn btn-info" value="UPDATE">
            </div>
        </form>
    </div>


</body>

</html>