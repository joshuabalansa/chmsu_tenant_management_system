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
        <title>Admin</title>

    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <br><br>

            <?php
            if (isset($_GET['view'])) {
                $id = $_GET["view"];
                $get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
                while ($row = mysqli_fetch_assoc($get_record)) {
                    $id = $row["id"];
                    $db_first_name = $row["fname"];
                    $db_midname = $row["midname"];
                    $db_last_name = $row["lname"];
                    $db_address = $row["address"];
                    $db_email = $row["email"];
                    $db_type = $row["business_type"];
                    $db_contact = $row["contact"];
                    $db_date = $row["date"];
                    $db_status = $row["status"];
                }

                $fullname = ucfirst($db_first_name) . " " . ucfirst($db_midname[0]) . ". " . ucfirst($db_last_name);
            }
            ?>
            <h3>Tenant Information</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Approved Date</th>
                        <td><?php echo date('M d, Y', strtotime($db_date)) ?></td>
                    </tr>
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
                        <th>Business Type:</th>
                        <td><?php echo $db_type ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $db_address ?></td>
                    </tr>
                    <tr>
                        <th>Letter of Intent</th>
                        <td>
                            <button type="button" class="btn-sm btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th>Sanitary Permit</th>
                        <td>
                            <button type="button" class="btn-sm btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                View
                            </button>
                        </td>
                    </tr>
                </thead>
            </table>
            <a href="tenants.php" class="btn-sm btn btn-outline-secondary">Back</a>
            <a title="View payments history" href="payments.php?view_payment=<?php echo $id ?>" class="btn-sm btn btn-primary">Payments</a>
            <button title="Request a new password of a user" type='submit' name="changepassword" data-bs-toggle="modal" data-bs-target="#modalChangePassword" class='btn-sm btn btn-warning'>Reset Password</button>
            <?php include("inc/modals.php") ?>
        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>