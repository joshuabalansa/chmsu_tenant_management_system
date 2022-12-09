<?php
session_start();

if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $user_id = $row["user_id"];
        $db_first_name = $row["first_name"];
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
        <title>My Profile</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <br><br>
            <h5>My Info</h5>
            <?php
            $get_info = mysqli_query($connections, "SELECT * FROM user_register WHERE id='$user_id' ");
            while ($row = mysqli_fetch_assoc($get_info)) {
                $db_first_name = $row["fname"];
                $db_middle_name = $row["midname"];
                $db_last_name = $row["lname"];
                $db_address = $row["address"];
                $db_email = $row["email"];
                $db_contact = $row["contact"];
            }
            $fullname = $db_first_name . " " . $db_middle_name . " " . $db_last_name;
            ?>
            <table class="table table-striped">
                <thead>
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
                        <th>Address</th>
                        <td> <?php echo $db_address ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td> <?php echo $db_username ?></td>
                    </tr>
                </thead>
            </table>

            <a class="btn btn-info" href="process.php?update=<?php echo $user_id ?>">Update</a>



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