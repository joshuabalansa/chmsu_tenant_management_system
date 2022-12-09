<?php
include("connections.php");

//Delete process
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connections, "DELETE FROM users WHERE id = $id");
    header("location: viewRecord.php");
}
//Update Process
if (isset($_GET['update'])) {
    $id = $_GET["update"];
    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$id'");
    while ($row_edit = mysqli_fetch_assoc($get_record)) {
        $db_name = $row_edit["name"];
        $db_address = $row_edit["address"];
        $db_email = $row_edit["email"];
        $db_type = $row_edit["account_type"];
    }
}

if (isset($_POST["save"])) {
    $new_name = $_POST["new_name"];
    $new_address = $_POST["new_address"];
    $new_email = $_POST["new_email"];
    mysqli_query($connections, "UPDATE users SET name='$new_name', address='$new_address', email='$new_email' WHERE id='$id'");
    header("location: viewRecord.php");
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
        <h6>EDIT USER</h6>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="name">Full Name</label>
                <input placeholder="Enter full name" class="form-control" type="text" name="new_name" value="<?php echo $db_name ?>" required>
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
                <a href="viewRecord.php" class="btn btn-secondary">Cancel</a>
                <input name="save" type="submit" class="btn btn-info" value="UPDATE">
            </div>
        </form>
    </div>
</body>

</html>