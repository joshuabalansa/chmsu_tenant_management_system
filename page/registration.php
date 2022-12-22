<?php
include("../connections.php");
include("../validator.php");
$fname = $midname =  $lname = $email = $contact = $business_type = $password = $address = $file  = "";
$fnameErr = $midnameErr = $lnameErr = $emailErr = $contactErr = $business_typeErr = $passwordErr = $addressErr = $fileErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required!";
    } else {
        $fname = $_POST["fname"];
    }
    if (empty($_POST["midname"])) {
        $midnameErr = "Middle name is required!";
    } else {
        $midname = $_POST["midname"];
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required!";
    } else {
        $lname = $_POST["lname"];
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["contact"])) {
        $contactErr = "Contact is required!";
    } else {
        $contact = $_POST["contact"];
    }
    if (empty($_POST["business_type"])) {
        $business_typeErr = "type of business is required!";
    } else {
        $business_type = $_POST["business_type"];
    }
    if (empty($_POST["password"])) {
        $password = "password is required!";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["address"])) {
        $addressErr = "Address is required!";
    } else {
        $address = $_POST["address"];
    }
    if (empty($_POST["file"])) {
        $fileErr = "File is required!";
    } else {
        $file = $_POST["file"];
    }
}
if ($fname && $midname && $lname && $email && $contact &&  $business_type && $address) {
    mysqli_query($connections, "INSERT INTO tenants(fname, midname, lname, email, contact, business_type, address, file) 
    VALUES('$fname', '$midname', '$lname', '$email', '$contact', '$business_type', '$address', '$file') ");
    echo "<script>location.href='pending_page.php'</script>";
}

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
        <form action="<?php htmlspecialchars("PHP_SELF") ?>" method="POST">
            <center>
                <h3>CHMSU TENANT REGISTRATION</h3><br>
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
                <label for="businessType" class="form-label">Business type</label>
                <input name="business_type" value="<?php echo $business_type ?>" type="text" class="form-control" placeholder="e.g. Coffee" autocomplete="off">
                <span class="error"><?php echo $business_typeErr ?></span>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" placeholder="Enter your complete address" rows="3" autocomplete="off"><?php echo $address ?></textarea>
                <span class="error"><?php echo $addressErr ?></span>
            </div>
            <div class="mb-3">
                <label for="upload" class="form-label">Upload letter of intent</label>
                <input name="file" value="<?php echo $file ?>" type="file" class="form-control" autocomplete="off">
                <span class="error"><?php echo $fileErr ?></span>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button name="register" class="btn btn-success" type="submit">Register</button>
            </div>
    </div>
    </form>
</body>

</html>