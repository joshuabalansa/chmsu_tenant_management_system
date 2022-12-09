<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php
include('connections.php');
$username = $password = "";
$usernameErr = $passwordErr = "";
$script = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $usernameErr = "Email is required!";
    } else {
        $username = $_POST["username"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required!";
    } else {
        $password = $_POST["password"];
    }

    if ($username && $password) {
        include("connections.php");

        $check_username = mysqli_query($connections, "SELECT * FROM users WHERE username='$username' ");
        $check_username_row = mysqli_num_rows($check_username);


        if ($check_username_row > 0) {

            while ($row = mysqli_fetch_assoc($check_username)) {
                $user_id = $row["id"];
                $db_password = $row["password"];
                $db_account_type = $row["account_type"];
                if ($password == $db_password) {
                    session_start();
                    $_SESSION["id"] = $user_id;
                    $info = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id'");

                    while ($row = mysqli_fetch_assoc($info)) {
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        $account_type =  $row["account_type"];
                    }
                    $fullname = $first_name  . " " . $last_name;
                    if ($db_account_type == "admin") {
                        echo "<script>window.location.href='system_admin'</script>";
                    } elseif ($db_account_type == "tenant") {
                        mysqli_query($connections, "INSERT INTO logs(name, account_type, log_id) VALUES('$fullname', '$account_type','$user_id')");
                        echo "<script>window.location.href='client'</script>";
                    } elseif ($db_account_type == "coordinator") {
                        mysqli_query($connections, "INSERT INTO logs(name, account_type, log_id) VALUES('$fullname', '$account_type','$user_id')");
                        echo "<script>window.location.href='admin'</script>";
                    } else {
                        $script = "NOTICE! Your account has been Deactivated!";
                    }
                } else {
                    $passwordErr = "Incorrect Password!";
                }
            }
        } else {
            $usernameErr = "Invalid username!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHMSU TMS Login</title>
</head>

<body>
    <div class="modal d-block bg-light py-5">
        <div class="modal-dialog mt-5" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Sign in</h1>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-floating mb-3">
                            <input id="floatingInput" class="form-control rounded-3" autocomplete="off" placeholder="Username or Email" type="text" name="username" value="<?php echo $username; ?>" id="">
                            <label for="floatingInput">Username</label>
                            <span class="error"><?php echo $usernameErr; ?></span>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="floatingPassword" class="form-control rounded-3" autocomplete="off" placeholder="Password" type="password" name="password" value="">
                            <label for="floatingPassword">Password</label>
                            <span class="error"><?php echo $passwordErr; ?></span>
                        </div>
                        <input type="submit" value="Sign in" class="w-100 mb-2 btn btn-lg rounded-3 btn-success">
                        <center>
                            <small class="text-center text-muted">CHMSU Tenants Management System</small><br><br>
                            <h6 style="color: red;"><?php echo $script ?></h6>
                        </center>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>