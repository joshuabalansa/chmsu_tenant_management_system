<?php

session_start();
@include "../connections.php";
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
        <title>Payments</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <br><br>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
            <div class="container bg-light">
                <br>
                <p>List of Payment History</p>
                <hr>
                <table id="fetch_result" class="table-sm table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Ref. No</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $get_record = mysqli_query($connections, "SELECT users.first_name, users.last_name, payment.amount, payment.refno, payment.date FROM users JOIN payment ON users.id = payment.user_id");
                        while ($row = mysqli_fetch_assoc($get_record)) :
                            $db_first_name = $row["first_name"];
                            $db_last_name = $row["last_name"];
                            $db_amount = $row["amount"];
                            $db_refno = $row["refno"];
                            $db_date = $row["date"];
                        ?>
                            <tr>
                                <td><?php echo $db_first_name . " " . $db_last_name ?></td>
                                <td><?php echo $db_amount ?></td>
                                <td><?php echo $db_refno ?></td>
                                <td><?php echo date("F j, Y", strtotime($db_date)) ?></td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Amount:</th>
                            <td><?php
                                $result = mysqli_query($connections, "SELECT SUM(amount) AS `amount` FROM payment");
                                $row = mysqli_fetch_assoc($result);
                                $amount = $row['amount'];
                                if ($amount > 0) {
                                    echo $amount;
                                }
                                ?></td>
                            <!-- <th>Amount</th>
                            <th>Ref. No</th>
                            <th>Date</th> -->
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
                    $('#fetch_result').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                            extend: 'print'
                        }]
                    });
                });
            </script>
            <!--Logout Modal-->
            <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-0">Warning!</h5>
                            <p class="mb-0">Are you sure you want to logout?</p>
                        </div>
                        <form method="post">
                            <div class="modal-footer flex-nowrap p-0">
                                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">Cancel</button>
                                <a href="logout.php" name="logoutUser" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Logout</a>
                            </div>
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