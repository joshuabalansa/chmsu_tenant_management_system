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
            <center>
                <h2>Welcome Admin</h2>
            </center>
        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>