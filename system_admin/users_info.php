<?php

session_start();
if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");
    include("fetch.php");
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

            include("inc/top_nav.php");
            include("inc/modals.php");
            ?>

            <br><br>
            <h3>Info</h3>
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
                </thead>
            </table>
            <a href="users.php" class="btn btn-outline-secondary">Back</a>
            <a href="#" class="btn btn-warning">Update</a>
            <button type='submit' name="logoutUser" data-bs-toggle="modal" data-bs-target="#modalDeactivate" class='btn btn-danger'>Deactivate</button>
        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>