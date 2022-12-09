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
    <title>Users List</title>
</head>

<body>
    <div class="container">
        <nav class="navbar mt-1 navbar-expand-lg bg-light shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="system_admin.php">CHMSU TMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="system_admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Create User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="viewRecord.php">Users List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logs</a>
                        </li>
                    </ul>
                    <div>
                        <?php echo "$db_name"; ?>
                        <button type='submit' data-bs-toggle="modal" data-bs-target="#modalLogout" name="logoutUser" class='btn-sm btn btn-primary'><i class='bx bx-exit'></i></button>
                        <?php include("modals.php") ?>
                    </div>
                </div>
            </div>
        </nav>
        <?php
        include("connections.php");
        ?>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <div class="container bg-light" style="margin-top: 60px;">
            <br>
            <br>
            <p>List of users</p>
            <hr>
            <table id="fetch_result" class="table-sm table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $view_query = mysqli_query($connections, "SELECT * FROM users WHERE account_type='tenant' ");

                    while ($row = mysqli_fetch_assoc($view_query)) :
                        $user_id = $row["id"];
                        $db_name = $row["name"];
                        $db_address = $row["address"];
                        $db_email = $row["email"];
                        $account_type = $row["account_type"];
                    ?>

                        <tr>
                            <td><?php echo $db_name ?></td>
                            <td><?php echo $db_address ?></td>
                            <td><?php echo $db_email ?></td>
                            <td><?php echo $account_type ?></td>

                            <td colspan='2'>
                                <a class='btn-sm btn btn-info' href='process.php?update=<?php echo $row["id"] ?>'>Edit</a>
                                <a class='btn-sm btn btn-danger' href='process.php?delete=<?php echo $row["id"] ?>'>Remove</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#fetch_result').DataTable();
            });
        </script>
    </div>
</body>

</html>