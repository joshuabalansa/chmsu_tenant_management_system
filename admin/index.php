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
        <style>
            .dash-link {
                color: black;
                text-decoration-line: none;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <?php
            include("inc/top_nav.php");
            include("inc/modals.php");

            ?>
            <br>
            <br>
            <h3>Summary</h3>
            <br>
            <div class="card-wrapper animate__animated animate__fadeInUp">
                <div class="card">
                    <h2><?php echo $pending; ?></h2>
                    <a class='dash-link' href="applicants.php" class="blinker">Pending applicants</a>
                </div>
                <div class="card">
                    <h2><?php echo $tenants; ?></h2>
                    <a class='dash-link' href="tenants.php">Active tenants</a>
                </div>
                <div class="card">
                    <h4><?php echo $pastdue; ?></h4>
                    <a class='dash-link' href="tenants.php">Pastdue tenants<br></a>
                </div>
                <div class="card">
                    <h4><?php echo $pendingPayment; ?></h4>
                    <a class='dash-link' href="payments.php">Payment confirmation<br></a>
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