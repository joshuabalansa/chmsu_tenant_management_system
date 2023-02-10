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
                <!-- <button data-bs-toggle="modal" data-bs-target="#generateReport" class="btn-sm btn btn-secondary">Reports</button> -->
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
                            "SELECT users.username,users.user_id, tenants.id AS tenantId, tenants.fname, tenants.lname, payment.id, payment.amount, payment.status, payment.refno, payment.ref_img, payment.date
                             FROM ((users INNER JOIN payment ON payment.user_id = users.id)
                            INNER JOIN tenants ON users.user_id = tenants.id) WHERE payment.status='pending' ORDER BY date DESC"
                        );
                        while ($row = mysqli_fetch_assoc($get_record)) :
                            $tenantId = $row["tenantId"];
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
                                    <a title="View Payment reference" class="btn-sm btn btn-info" href="process.php?viewPaymentInfo=<?php echo $db_payment_id = $row["id"]; ?>">
                                        <i class='bx bx-menu-alt-left'></i>
                                    </a>
                                    <a title="Accept Payment" href="process.php?paymentAccept=<?php echo $db_payment_id; ?>&tenantId=<?php echo $tenantId  ?>" class="btn-sm btn btn-success"><i class='bx bx-check'></i></a>
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


        <div class="modal fade" id="generateReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="lead">Generate Report</p>
                        <form action="payment_reports.php" method="GET">
                            <div class="mb-3">
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="" class="label-for">From</label>
                                        <input class="form-control" type="date" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                                                            echo $_GET['from_date'];
                                                                                                        } ?>" id="">
                                    </div>
                                    <div class="col">
                                        <label for="" class="label-for">To</label>
                                        <input class="form-control" type="date" name="to_date" value="<?php if (isset($_GET['to_date'])) {
                                                                                                            echo $_GET['to_date'];
                                                                                                        } ?>" id="">
                                    </div>f
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" value="Filter">
                        </form>
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