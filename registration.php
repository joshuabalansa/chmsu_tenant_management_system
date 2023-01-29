<?php
include("connections.php");
include("validate.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Registration</title>
</head>

<body>
    <div class=" container" style="width: 40rem; margin-top: 30px;">
        <form action="<?php htmlspecialchars("PHP_SELF") ?>" method="POST" enctype="multipart/form-data">
            <center>
                <h2 class="animate__animated animate__bounceInDown">Register</h2><br>
            </center>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input name="fname" value="<?php echo $fname; ?>" type="text" class="form-control" placeholder="Enter your first name" autocomplete="off">
                <span class="error"><?php echo $fnameErr ?></span>
            </div>
            <div class="mb-3">
                <label for="middlename" class="form-label">Middle Name</label>
                <input name="midname" value="<?php echo $midname; ?>" type="text" class="form-control" placeholder="Enter middle name" autocomplete="off">
                <span class="error"><?php echo $midnameErr ?></span>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input name="lname" value="<?php echo $lname; ?>" type="text" class="form-control" placeholder="Enter your last name" autocomplete="off">
                <span class="error"><?php echo $lnameErr ?></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" value="<?php echo $email ?>" type="email" class="form-control" placeholder="email@example.com" autocomplete="off">
                <span class="error"><?php echo $emailErr ?></span>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact #</label>
                <input name="contact" onkeypress="return isNumberKey(event)" type="text" value="<?php echo $contact; ?>" maxlength="11" class="form-control" placeholder="Enter your contact number" autocomplete="off">
                <span class="error"><?php echo $contactErr ?></span>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Date of birth</label>
                <input name="birth_date" type="date" value="<?php echo $birth_date ?>" class="form-control" autocomplete="off">
                <span class="error"><?php echo $birth_dateErr ?></span>
            </div>
            <div class="mb-3">
                <label for="businessType" class="form-label">Business type</label>
                <input name="business_type" value="<?php echo $business_type ?>" type="text" class="form-control" placeholder="e.g. Coffee" autocomplete="off">
                <span class="error"><?php echo $business_typeErr ?></span>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" placeholder="Enter your complete address" rows="3" autocomplete="off"><?php echo $address ?></textarea>
                <span class="error"><?php echo $addressErr ?></span>
            </div>
            <center>
                <h5>Legal Requirements</h5>
            </center>
            <div class="mb-3">
                <label for="upload" class="form-label">Letter of intent</label>
                <input name="l_intent" value="<?php echo $l_intent ?>" type="file" class="form-control" autocomplete="off">
                <span class="error"><?php echo $l_intentErr ?></span>
            </div>
            <div class="mb-3">
                <label for="upload" class="form-label">Sanitary Permit to Operate</label>
                <input name="s_permit" value="<?php echo $s_permit ?>" type="file" class="form-control" autocomplete="off">
                <span class="error"><?php echo $s_permitErr ?></span>
            </div>
            <div class="mb-3">
                <label for="upload" class="form-label">Business Permit (if Applicable)</label>
                <input name="b_permit" value="<?php echo $b_permit ?>" type="file" class="form-control" autocomplete="off">
                <span class="error"><?php echo $b_permitErr ?></span>
            </div>
            <div class="mb-3">
                <label for="upload" class="form-label">Health Certificate</label>
                <input name="h_certificate" value="<?php echo $h_certificate ?>" type="file" class="form-control" autocomplete="off">
                <span class="error"><?php echo $h_certificateErr ?></span>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button name="register" class="btn btn-success" type="submit">Submit</button>
            </div>
    </div>
    </form>
</body>

</html>