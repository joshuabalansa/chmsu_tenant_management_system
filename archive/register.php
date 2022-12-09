<?php

session_start();

if (isset($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    include("connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
    while ($row_edit = mysqli_fetch_assoc($get_record)) {
        $db_name = $row_edit["name"];
        $db_address = $row_edit["address"];
        $db_email = $row_edit["email"];
    }
} else {
    header("location: error.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new user</title>
</head>

<body>
    <div class="container">
        <nav class="navbar mt-1  navbar-expand-lg bg-light shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="system_admin.php">CHMSU TMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="system_admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="register.php">Create User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="viewRecord.php">Users List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Logs</a>
                        </li>
                    </ul>
                    <div>
                        <?php echo "$db_name"; ?>

                        <button type='submit' name="logoutUser" data-bs-toggle="modal" data-bs-target="#modalLogout" class='btn-sm btn btn-primary'><i class='bx bx-exit'></i></button>
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <?php include("modals.php") ?>
        <?php
        include("connections.php");

        $name = $address = $email = $password = $select = "";
        $nameErr = $addressErr = $emailErr = $passwordErr = $selectErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required!";
            } else {
                $name = $_POST["name"];
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
            if (empty($_POST["password"])) {
                $passwordErr = "Password Required!";
            } else {
                $password = md5($_POST["password"]);
            }
            if (empty($_POST["select"])) {
                $selectErr = "Choose a type of user";
            } else {
                $select = $_POST["select"];
            }
        }
        if ($name && $address && $email && $password && $select) {

            $check_email = mysqli_query($connections, "SELECT * FROM users WHERE email='$email' ");
            $check_email_row = mysqli_num_rows($check_email);

            if ($check_email_row > 0) {
                $emailErr = "Email is already registered!";
            } else {

                $query = mysqli_query($connections, "INSERT INTO users(name, address, email, password, account_type) VALUES('$name', '$address', '$email', '$password', '$select')");

                echo "<script>window.location.href='register.php'</script>";
            }
        }
        ?>
        <div class="container" style="width: 35rem;">
            <center>
                <h5>Create new user</h5>
            </center>
            <form action="<?php htmlspecialchars("PHP_SELF") ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Full Name:</label>
                    <input class="form-control" placeholder="Enter full name" type="text" name="name" value="<?php echo $name; ?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address:</label>
                    <input class="form-control" placeholder="Enter address" type="text" name="address" value="<?php echo $address; ?>">
                    <span class="error"><?php echo $addressErr; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input class="form-control" placeholder="Enter email" type="email" name="email" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input class="form-control" placeholder="Enter password" type="password" name="password" value="<?php echo $password; ?>" autocomplete="off">
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type:</label>
                    <select class="form-select" name="select">
                        <option value="">Select a user type</option>
                        <option value="admin">Admin</option>
                        <option value="tenant">Tenant</option>
                    </select>
                    <span class="error"><?php echo $selectErr; ?></span>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <input class="btn btn-outline-primary" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

</body>

</html>