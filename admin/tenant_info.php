<?php

session_start();
include("../connections.php");
if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_first_name = $row["first_name"];
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
            <br><br>

            <?php
            if (isset($_GET['view'])) {
                $id = $_GET["view"];
                $get_record = mysqli_query($connections, "SELECT * FROM user_register WHERE id='$id'");
                while ($row = mysqli_fetch_assoc($get_record)) {
                    $id = $row["id"];
                    $db_first_name = $row["fname"];
                    $db_midname = $row["midname"];
                    $db_last_name = $row["lname"];
                    $db_address = $row["address"];
                    $db_email = $row["email"];
                    $db_type = $row["business_type"];
                    $db_contact = $row["contact"];
                    $db_date = $row["date"];
                }

                $fullname = ucfirst($db_first_name) . " " . ucfirst($db_midname[0]) . ". " . ucfirst($db_last_name);
            }
            ?>
            <h3>Tenant Information</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Approved Date</th>
                        <td><?php echo date('M d, Y', strtotime($db_date)) ?></td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $fullname ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $db_email ?></td>
                    </tr>
                    <tr>
                        <th>Contact:</th>
                        <td><?php echo $db_contact ?></td>
                    </tr>
                    <tr>
                        <th>Business Type:</th>
                        <td><?php echo $db_type ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $db_address ?></td>
                    </tr>
                    <tr>
                        <th>Letter of Intent</th>
                        <td>
                            <button type="button" class="btn-sm btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th>Sanitary Permit</th>
                        <td>
                            <button type="button" class="btn-sm btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                View
                            </button>
                        </td>
                    </tr>
                </thead>
            </table>
            <a href="tenants.php" class="btn btn-outline-secondary">Back</a>
            <button title="change password" type='submit' name="changepassword" data-bs-toggle="modal" data-bs-target="#modalChangePassword" class='btn btn-warning'>Change Password</button>
            <?php include("modals.php") ?>
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



        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Business Permit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <img src="https://amazingboholcom.files.wordpress.com/2017/11/20171026_104950.jpg?w=715" alt="">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Download</button>
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