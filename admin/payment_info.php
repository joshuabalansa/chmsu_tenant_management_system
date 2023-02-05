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
        <link rel="stylesheet" href="style/dashboard.css">
        <title>Admin</title>

    </head>

    <body>
        <div class="container">
            <?php
            include("inc/top_nav.php");
            include("inc/modals.php");

            ?>
            <br>
            <div style="display: flex; ">
                <img width="400" height="500" src="<?php echo $payment_refImg ?> " alt="">
                <div class="wrapper">
                    <p class="lead">Name: <?php echo $tenant_fname; ?></p>
                    <p class="lead">Name: <?php echo $tenant_lname; ?></p>
                    <a class="btn btn-outline-secondary" href="payments.php">Back</a>
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