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