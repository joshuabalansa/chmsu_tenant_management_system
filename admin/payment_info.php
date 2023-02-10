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
            <h3>Payment Information</h3>
            <div class="wrapper" style="display:flex;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <td><?php echo date('M d, Y', strtotime($payment_date)) ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $tenant_fullname ?></td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td><?php echo $payment_amount ?></td>
                        </tr>
                        <tr>
                            <th>Ref. No.</th>
                            <td><?php echo  $payment_refno ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge text-bg-danger"><?php echo ucfirst($payment_status) ?></span></td>
                        </tr>
                        <tr>
                            <th>Reference image</th>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#viewRef">
                                    View
                                </a>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            <a href="payments.php" class="btn btn-secondary">Back</a>
        </div>
        <!-- Modal Reference Image -->
        <div class="modal fade" id="viewRef" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <img width="100%" src="<?php echo $payment_refImg ?>" alt="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <a href='<?php echo $payment_refImg ?>' type="button" class="btn btn-primary" download>Download</a>
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