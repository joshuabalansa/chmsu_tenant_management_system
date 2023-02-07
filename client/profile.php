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
        <script src="../plugins/bootstrap/js/bootstrap.bundle.js"></script>
        <title>My Profile</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <br><br>
            <h5>My Info</h5>
            <?php
            $get_info = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$db_id' ");

            while ($row = mysqli_fetch_assoc($get_info)) {
                $db_status = $row["status"];
                $db_first_name = $row["fname"];
                $db_middle_name = $row["midname"];
                $db_last_name = $row["lname"];
                $db_address = $row["address"];
                $db_email = $row["email"];
                $db_contact = $row["contact"];
                $db_birth_date = $row["birth_date"];
                $db_l_intent = $row["l_intent"];
                $db_s_permit = $row["s_permit"];
                $db_b_permit = $row["b_permit"];
                $db_h_certificate = $row["h_certificate"];
            }

            $fullname = $db_first_name . " " . $db_middle_name . " " . $db_last_name;

            $check_l_intent = mysqli_query($connections, "SELECT l_intent FROM tenants WHERE id='$db_id'");
            $check_s_permit = mysqli_query($connections, "SELECT s_permit FROM tenants WHERE id='$db_id'");
            $check_b_permit = mysqli_query($connections, "SELECT b_permit FROM tenants WHERE id='$db_id'");
            $check_h_certificate = mysqli_query($connections, "SELECT h_certificate FROM tenants WHERE id='$db_id'");

            $check_l_intent_row = mysqli_num_rows($check_l_intent);
            $check_s_permit_row = mysqli_num_rows($check_s_permit);
            $check_b_permit_row = mysqli_num_rows($check_b_permit);
            $check_h_certificate_row = mysqli_num_rows($check_h_certificate);
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Status:</th>
                        <td><?php echo ucfirst($db_status) ?></td>
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
                        <th>Address</th>
                        <td> <?php echo $db_address ?></td>
                    </tr>
                    <tr>
                        <th>Letter of Intent:</th>
                        <?php if ($check_l_intent_row == 1) : ?>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#view1">
                                    View
                                </a>
                            </td>
                        <?php else : ?>
                            <td>
                                No Submission
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th>Business Permit:</th>
                        <?php if ($check_b_permit_row == 1) : ?>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#view2">
                                    View
                                </a>
                            <?php else : ?>
                            <td>No Submission</td>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th>Sanitary Permit:</th>
                        <?php if ($check_s_permit_row == 1) : ?>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#view3">
                                    View
                                </a>
                            </td>
                        <?php else : ?>
                            <td>No Submission</td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th>Health Certificate:</th>
                        <?php if ($check_h_certificate_row == 1) : ?>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#view4">
                                    View
                                </a>
                            </td>
                        <?php else : ?>
                            <td>No Submission</td>
                        <?php endif; ?>
                    </tr>
                </thead>
            </table>
            <a class="btn btn-info" href="process.php?update=<?php echo $db_id ?>">Update</a>
        </div>
        <?php include("inc/modals.php"); ?>
        </div>


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



    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;

?>