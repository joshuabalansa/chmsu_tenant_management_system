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
            <br>
            <h3>Summary</h3>
            <div class="card-wrapper">
                <div class="card">
                    <h2><?php echo $pending; ?></h2>
                    <p class="blinker">Pending Applicants</p>
                </div>
                <div class="card">
                    <h2><?php echo $tenants; ?></h2>
                    <p>Active Tenants</p>
                </div>
                <div class="card">
                    <h4><?php echo $pastdue; ?></h4>
                    <p>Pastdue Tenants<br></p>
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