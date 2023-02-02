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
                    $db_birth_date = $row["birth_date"];
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
                        <th>Date of Birth:</th>
                        <td><?php echo $db_birth_date ?></td>
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
                        <th>Letter of Intent:</th>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#view1">
                                View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Business Permit:</th>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#view2">
                                View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Sanitary Permit:</th>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#view3">
                                View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Health Certificate:</th>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#view4">
                                View
                            </a>
                        </td>
                    </tr>
                </thead>
            </table>
            <a href="tenants.php" class="btn-sm btn btn-outline-secondary">Back</a>
            <a title="View payments history" href="tenant_payment.php?view_payment=<?php echo $id ?>" class="btn-sm btn btn-primary">Payments</a>
            <button title="Request a new password of a user" type='submit' name="changepassword" data-bs-toggle="modal" data-bs-target="#modalChangePassword" class='btn-sm btn btn-warning'>Reset Password</button>
            <button title="Deactivate user will put to archive" type='button' name="archive" data-bs-toggle="modal" data-bs-target="#modalDeactivate" class='btn-sm btn btn-outline-danger'>Deactivate</button>
            <?php include("inc/modals.php") ?>
        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>

<!-- View modal applicants_info.php -->
<div class="modal fade" id="view4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img width="100%" src="../uploads/<?php echo $db_h_certificate ?>" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <a href='../uploads/<?php echo $db_h_certificate ?>' type="button" class="btn btn-primary" download>Download</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="view3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <img width="100%" src="../uploads/<?php echo $db_b_permit ?>" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <a href='../uploads/<?php echo $db_b_permit ?>' type="button" class="btn btn-primary" download>Download</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img width="100%" src="../uploads/<?php echo $db_s_permit ?>" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <a href='../uploads/<?php echo $db_s_permit ?>' type="button" class="btn btn-primary" download>Download</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img width="100%" src="../uploads/<?php echo $db_l_intent ?>" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <a href='../uploads/<?php echo $db_l_intent ?>' type="button" class="btn btn-primary" download>Download</a>
            </div>
        </div>
    </div>
</div>