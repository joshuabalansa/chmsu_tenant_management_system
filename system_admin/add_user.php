<?php

session_start();
if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");
    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_username = $row["username"];
    }

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

                $first_name = $middle_name = $last_name = $email = $contact = $username = $password = "";
                $first_nameErr = $middle_nameErr = $last_nameErr = $emailErr = $contactErr = $usernameErr = $emailErr = $passwordErr = "";

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

                    if (empty($_POST["email"])) {
                        $emailErr = "Email is required!";
                    } else {
                        $email = $_POST["email"];
                    }

                    if (empty($_POST["contact"])) {
                        $contactErr = "contact is required!";
                    } else {
                        $contact = $_POST["contact"];
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
                }
                if ($first_name  && $middle_name && $last_name && $email && $contact && $username && $password) {

                    $check_user = mysqli_query($connections, "SELECT * FROM users WHERE username='$username' ");
                    $check_user_row = mysqli_num_rows($check_user);

                    if ($check_user_row > 0) {
                        $usernameErr = "Username is already registered!";
                    } else {

                        function random_id($lenght = 5)
                        {
                            $str = "1234567890";
                            $shuffled = substr(str_shuffle($str), 0, $lenght);
                            return $shuffled;
                        }
                        $random_userId = random_id(5);

                        //INSERT INTO USERS DATABASE
                        mysqli_query($connections, "INSERT INTO users(username,  password, account_type, user_id) 
                        VALUES('$username', '$password', 'coordinator', '$random_userId')");
                        //INSERT INTO COORDINATORS DATABASE
                        mysqli_query($connections, "INSERT INTO coordinators(first_name, middle_name, last_name, email, contact, user_id) 
                        VALUES('$first_name', '$middle_name', '$last_name', '$email', '$contact', '$random_userId')");


                        echo "<script>alert('New user has been created')</script>";
                    }
                }
                ?>
                <div class="container" style="width: 50rem;">
                    <center>
                        <h5>Create new account</h5>
                    </center>
                    <form action="<?php htmlspecialchars("PHP_SELF") ?>" method="POST">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">First Name</label>
                                <input class="form-control" autocomplete="off" placeholder="Enter first name" type="text" name="first_name">
                                <span class="error"><?php echo $first_nameErr; ?></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Middle Name</label>
                                <input class="form-control" autocomplete="off" placeholder="Middle name" type="text" name="middle_name">
                                <span class="error"><?php echo $middle_nameErr; ?></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" autocomplete="off" placeholder="Enter last name" type="text" name="last_name">
                                <span class="error"><?php echo $last_nameErr; ?></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter email" type="email" name="email">
                            <span class="error"><?php echo $emailErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input class="form-control" onkeypress="return isNumberKey(event)" maxlength="11" autocomplete="off" placeholder="Enter contact number" type="text" name="contact">
                            <span class="error"><?php echo $contactErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter username" type="text" name="username">
                            <span class="error"><?php echo $usernameErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input class="form-control" autocomplete="off" placeholder="Enter password" type="password" name="password">
                            <span class="error"><?php echo $passwordErr; ?></span>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input class="btn btn-outline-primary" type="submit" value="Create">
                        </div>
                    </form>
                </div>
            </div>
            <?php include("inc/modals.php"); ?>
        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>