<?php

session_start();
include("../connections.php");
if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");

    include("process.php");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
        <script src="../plugins/bootstrap/js/bootstrap.bundle.js"></script>
        <title>Admin</title>

    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>

            <div class="container">
                <br>
                <?php
                include("../connections.php");

                $first_name = $middle_name = $last_name = $address = $email = $contact = $username = $password = $select = "";
                $first_nameErr = $last_nameErr = $middle_nameErr = $addressErr = $contactErr = $usernameErr = $emailErr = $passwordErr = $selectErr = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["first_name"])) {
                        $first_nameErr = "First name is required!";
                    } else {
                        $first_name = $_POST["first_name"];
                    }
                    if (empty($_POST["middle_name"])) {
                        $middle_nameErr = "Middle name is required!";
                    } else {
                        $middle_name = $_POST["middle_name"];
                    }
                    if (empty($_POST["last_name"])) {
                        $last_nameErr = "Last name is required!";
                    } else {
                        $last_name = $_POST["last_name"];
                    }

                    if (empty($_POST["address"])) {
                        $addressErr = "Address is required!";
                    } else {
                        $address = $_POST["address"];
                    }
                    if (empty($_POST["email"])) {
                        $emailErr = "Email is required!";
                    } else {
                        $email = $_POST["email"];
                    }
                    if (empty($_POST["username"])) {
                        $usernameErr = "Email is required!";
                    } else {
                        $username = $_POST["username"];
                    }
                    if (empty($_POST["password"])) {
                        $passwordErr = "Password Required!";
                    } else {
                        $password = $_POST["password"];
                    }
                    if (empty($_POST["contact"])) {
                        $contactErr = "Contact is required!";
                    } else {
                        $contact = $_POST["contact"];
                    }
                }
                if ($first_name && $middle_name && $last_name && $address && $email && $username && $password && $contact) {

                    $check_email = mysqli_query($connections, "SELECT * FROM tenants WHERE email='$email' ");
                    $check_email_row = mysqli_num_rows($check_email);

                    if ($check_email_row > 0) {
                        $emailErr = "Email is already registered!";
                    } else {

                        $query = mysqli_query($connections, "INSERT INTO users(username ,  password) VALUES('$username' , '$password')");

                        echo "<script>window.location.href='tenants.php'</script>";
                    }
                }
                ?>
                <div class="container" style="width: 35rem;">
                    <center>
                        <h5>Create new tenant</h5>
                    </center>
                    <form action="<?php htmlspecialchars("PHP_SELF") ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter first name" type="text" name="first_name" value="<?php echo $first_name; ?>">
                            <span class="error"><?php echo $first_nameErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Middle Name</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter middle name" type="text" name="middle_name" value="<?php echo $middle_name; ?>">
                            <span class="error"><?php echo $middle_nameErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter last name" type="text" name="last_name" value="<?php echo $last_name; ?>">
                            <span class="error"><?php echo $last_nameErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address:</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter address" type="text" name="address" value="<?php echo $address; ?>">
                            <span class="error"><?php echo $addressErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter email" type="email" name="email" value="<?php echo $email; ?>">
                            <span class="error"><?php echo $emailErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact # :</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter contact number" type="text" maxlength="11" name="contact" value="<?php echo $contact; ?>">
                            <span class="error"><?php echo $contactErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter username" type="text" name="username" value="<?php echo $username; ?>">
                            <span class="error"><?php echo $usernameErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter password" type="password" name="password" value="<?php echo $password; ?>" autocomplete="off">
                            <span class="error"><?php echo $passwordErr; ?></span>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input class="btn btn-outline-primary" type="submit" value="Create">
                        </div>
                    </form>
                </div>
            </div>

            <!--Logout Modal-->
            <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-0">Warning!</h5>
                            <p class="mb-0">Are you sure you want to logout?</p>
                        </div>
                        <form method="post">
                            <div class="modal-footer flex-nowrap p-0">
                                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">Cancel</button>
                                <a href="logout.php" name="logoutUser" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Logout</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>