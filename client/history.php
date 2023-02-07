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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

        <title>CTMS</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <?php include("inc/modals.php") ?>
            <br><br>
            <p class="lead">Payment History</p>
            <hr>
            <table id="fetch_result" class="table-sm table table-hover">
                <thead>
                    <tr>
                        <th>Ref. No</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $get_payment = mysqli_query($connections, "SELECT payment.amount, payment.status, payment.refno, payment.date, payment.user_id FROM payment JOIN users ON payment.user_id = users.id WHERE users.id = $user_id");
                    while ($row = mysqli_fetch_assoc($get_payment)) :
                        $db_amount = $row["amount"];
                        $db_refno = $row["refno"];
                        $db_date = $row["date"];
                        $db_status = $row["status"];
                        ($db_status == "accepted") ? ($badge = "success") : ($badge = "danger");
                    ?>
                        <tr>
                            <td><?php echo $db_refno ?></td>
                            <td><?php echo $db_amount ?></td>
                            <td><?php echo date("F j, Y", strtotime($db_date)) ?></td>
                            <td><span class="badge rounded-pill text-bg-<?php echo $badge ?>"><?php echo $db_status ?></span></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Ref. No</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
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
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>