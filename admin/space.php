<?php

session_start();
if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");
    include("fetch.php");
    $code = $rate = "";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/space.css">
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
            <h4>Create Space</h4>
            <div class="wrapper">
                <div class="left-section">
                    <form action="process.php" method="POST">
                        <div class="mb-3">
                            <input class="form-control" name="code" type="text" placeholder="Enter space name" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="rate" type="text" placeholder="Rate per month" required>
                        </div>
                        <input type="submit" name="space_submit" class="btn btn-primary" value="Add">

                    </form>
                </div>
                <div class="right-section">
                    <table class="table table-striped">
                        <tr>
                            <th>Code</th>
                            <th>Rate</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $fetch_space = mysqli_query($connections, "SELECT * FROM space");
                        while ($row = mysqli_fetch_assoc($fetch_space)) :
                            $code = $row["code"];
                            $rate = $row["rate"];
                            $status = $row["status"];
                            ($status == "available") ? ($badge = "success") : ($badge = "warning")
                        ?>

                            <tr>
                                <td><?php echo $code ?></td>
                                <td><?php echo $rate ?></td>
                                <td><span class="badge rounded-pill text-bg-<?php echo $badge ?>"><?php echo $status ?></span></td>
                                <td>
                                    <a class="btn-sm btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
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