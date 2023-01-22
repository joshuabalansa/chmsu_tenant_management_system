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
        <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <script src="../plugins/bootstrap/js/bootstrap.bundle.js"></script>
        <title>Dashboard</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <br><br>
            <p class="lead">Payment History</p>
            <?php $get_record = mysqli_query($connections, "SELECT * FROM payment WHERE user_id='$user_id' LIMIT 6");
            while ($row = mysqli_fetch_assoc($get_record)) :
                $db_amount = $row["amount"];
                $db_refno = $row["refno"];
                $db_date = $row["date"];
            ?>


                <ul class="list-group mt-3 wrapper">
                    <li class="list-group-item d-flex justify-content-between lh-sm item">
                        <div>
                            <h6>Ref. No. <?php echo $db_refno ?></h6>
                            <small class=" text-muted"><?php echo date("F j, Y, g:i a", strtotime($db_date)) ?></small>
                        </div>
                        <span style="color: black;">₱ <?php echo $db_amount; ?></span>
                    </li>
                </ul>
            <?php endwhile; ?>
            <?php include("inc/modals.php"); ?>
        </div>

    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>