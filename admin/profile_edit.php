<!DOCTYPE html>
<html lang="en">
<?php include("../connections.php") ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <form method="post">
        <div class="container mt-5" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
            <div class="content" style="width: 40%;">
                <h4>Edit Info</h4>
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" value="<?php echo $db_first_name ?>" name="new_fname" class="form-control" placeholder="Enter First Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" value="<?php echo $db_middle_name ?>" name="new_mname" class="form-control" placeholder="Enter Middle Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" value="<?php echo $db_last_name ?>" name="new_lname" class="form-control" placeholder="Enter Last Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="text" value="<?php echo $db_user ?>" name="new_uname" class="form-control" placeholder="Enter Username">
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" value="<?php echo $db_pass ?>" name="new_password" class="form-control" placeholder="Password">
                </div>
                <a href="profile.php" class="btn btn-outline-secondary">Cancel</a>
                <input type="submit" name="saveProfile" value="Update Info" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>

</html>