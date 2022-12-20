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
            <?php
            include("inc/top_nav.php");
            include("inc/modals.php");
            ?>
            <br>
            <br>
            <h4>Summary</h4>
            <table class="table table-hover">
                <tr>
                    <td>
                        <p class="lead">Applicants:</p>
                        </th>
                    <td>
                        <p class="lead">
                            <?php
                            $result = mysqli_query($connections, "SELECT COUNT(*) AS `count` FROM tenants WHERE status='pending'");
                            $row = mysqli_fetch_assoc($result);
                            $count = $row['count'];
                            if ($count > 0) {
                                echo $count;
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="lead">Total Tenants:</p>
                    </td>
                    <td>
                        <p class="lead">

                            <?php
                            $result = mysqli_query($connections, "SELECT COUNT(*) AS `count` FROM tenants WHERE status='approved'");
                            $row = mysqli_fetch_assoc($result);
                            $count = $row['count'];
                            if ($count > 0) {
                                echo $count;
                            }

                            ?>
                        </p>
                    </td>
                </tr>
            </table>

        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>