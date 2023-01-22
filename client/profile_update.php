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
        <h3>Edit Profile</h3>
        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <label for="name">First name</label>
                    <input placeholder="Enter full name" class="form-control" type="text" name="new_first_name" value="<?php echo $db_first_name ?>" required>
                </div>
                <div class="col">
                    <label for="name">Middle Name</label>
                    <input placeholder="Enter middle name" class="form-control" type="text" name="new_middle_name" value="<?php echo $db_middle_name ?>" required>
                </div>
                <div class="col">
                    <label for="name">Last Name</label>
                    <input placeholder="Enter full name" class="form-control" type="text" name="new_last_name" value="<?php echo $db_last_name ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="name">Date of Birth</label>
                <input type="date" class="form-control" value="<?php echo $db_birth_date ?>" name="new_birth_date">
            </div>
            <div class="mb-3">
                <label for="name">Address</label>
                <textarea placeholder="Enter your address" class="form-control" type="text" name="new_address" rows="3" required><?php echo $db_address ?></textarea>
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
                <input onkeypress="return isNumberKey(event)" placeholder="Enter your phone number" maxlength="11" class="form-control" type="text" value="<?php echo $db_contact; ?>" name="new_contact">
            </div>
            <div class="mb-3">
                <label for="name">Change Password</label>
                <input placeholder="Enter your new password" class="form-control" type="password" name="new_password" required>
            </div>
            <div class="mb-3">
                <a href="profile.php" class="btn btn-outline-secondary">Cancel</a>
                <input name="save" type="submit" class="btn btn-info" value="UPDATE">
            </div>
        </form>
    </div>
</body>

</html>