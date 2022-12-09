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
    <link rel="stylesheet" href="style/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg mt-1 bg-light shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="system_admin.php">CHMSU TMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="system_admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Create User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewRecord.php">Users List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logs</a>
                        </li>
                    </ul>
                    <div>
                        <?php echo "$db_name"; ?>
                        <button type='submit' name="logoutUser" data-bs-toggle="modal" data-bs-target="#modalLogout" class='btn-sm btn btn-primary'><i class='bx bx-exit'></i></button>
                    </div>
                </div>
            </div>
        </nav>
        <div class="wrapper">
            <div class="stats shadow">
                <h1>
                    <?php
                    $result = mysqli_query($connections, "SELECT COUNT(*) AS `count` FROM users WHERE account_type='tenant'");
                    $row = mysqli_fetch_assoc($result);
                    $count = $row['count'];
                    if ($count > 0) {
                        echo $count;
                    }
                    ?>
                </h1>
                <h4>USERS</h4>
            </div>

        </div>
    </div>
    <?php include("modals.php"); ?>
    </div>
</body>

</html>