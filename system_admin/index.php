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
        <title>CHMSU TMS</title>
    </head>

    <body>
        <div class="container">
            <?php
            include("../connections.php");
            include("inc/top_nav.php");
            ?>

            <br><br>
            <center>
                <h2>Welcome Admin</h2>
            </center>
            <!--MODAL LOGOUT-->
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