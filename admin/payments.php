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
        <title>Payments</title>
    </head>

    <body>
        <div class="container">
            <?php
            include("inc/top_nav.php");
            include("inc/modals.php");
            ?>
            <br><br>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
            <div class="container">
                <br><br>
                <a href="payment_accepted.php" class="btn-sm btn btn-outline-success">Show Accepted</a>
                <br><br>
                <p>List of pending payments</p>
                <hr>
                <table id="fetch_result" class="table-sm table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Ref. No</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $get_record = mysqli_query(
                            $connections,
                            "SELECT users.username,users.user_id, tenants.fname, tenants.lname, payment.id, payment.amount, payment.status, payment.refno, payment.ref_img, payment.date
                             FROM ((users INNER JOIN payment ON payment.user_id = users.id)
                            INNER JOIN tenants ON users.user_id = tenants.id) WHERE payment.status='pending' ORDER BY date DESC"
                        );
                        while ($row = mysqli_fetch_assoc($get_record)) :
                            $db_payment_id = $row["id"];
                            $db_users_userId = $row["user_id"];
                            $db_first_name = $row["fname"];
                            $db_last_name = $row["lname"];
                            $db_amount = $row["amount"];
                            $db_status = $row["status"];
                            $db_refno = $row["refno"];
                            $db_date = $row["date"];
                            $db_ref_img = $row["ref_img"];
                            $fullname = $db_first_name . " " . $db_last_name;

                        ?>
                            <tr>
                                <td><?php echo $fullname  ?></td>
                                <td><?php echo $db_amount ?></td>
                                <td><?php echo $db_refno ?></td>
                                <td><?php echo date("F j, Y", strtotime($db_date)) ?></td>
                                <td>
                                    <span class="badge rounded-pill text-bg-danger">
                                        <?php echo $db_status ?>
                                </td>
                                </span>
                                <td colspan="3">
                                    <a title="View Payment reference" class="btn-sm btn btn-info" href="process.php?viewPaymentDetails=<?php echo $db_payment_id = $row["id"]; ?>">
                                        <i class='bx bx-credit-card-front'></i>
                                    </a>
                                    <a title="Accept Payment" href="process.php?paymentAccept=<?php echo $db_payment_id; ?>" class="btn-sm btn btn-success"><i class='bx bx-check'></i></a>
                                    <a title="Reject Payment" href="mail/paymentReject.php?tenantId=<?php echo $db_users_userId; ?>&paymentId=<?php echo $db_payment_id ?>" class="btn-sm btn btn-outline-danger"><i class='bx bx-x'></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Ref. No</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
            <script>
                $(document).ready(function() {
                    $('#fetch_result').DataTable();
                });
            </script>
        </div>
        <!-- MODAL FOR REFERENCE IMAGE -->
        <div class="modal fade" id="paymentRef" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <img src="<?php echo $db_ref_img; ?>" alt="Gcash reference number" width="100%" height="100%">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Ref. No</th>
                                <th>Date</th>
                            </tr>
                            <tr>
                                <td><?php echo $fullname  ?></td>
                                <td><?php echo $db_amount ?></td>
                                <td><?php echo $db_refno ?></td>
                                <td><?php echo date("F j, Y", strtotime($db_date)) ?></td>
                            </tr>
                        </table>
                        <?php echo $_GET['payment'] ?>
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