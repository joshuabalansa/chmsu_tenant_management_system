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
            <br><br>
            <?php
            $get_payment = mysqli_query($connections, "SELECT * FROM payment");
            ?>
            <h5>Payment History</h5>
            <table id="fetch_result" class="table-sm table table-hover">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Ref. No</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($get_payment)) :
                        $db_amount = $row["amount"];
                        $db_refno = $row["refno"];
                        $db_date = $row["date"];
                    ?>
                        <tr>
                            <td><?php echo $db_amount ?></td>
                            <td><?php echo $db_refno ?></td>
                            <td><?php echo date("F j, Y", strtotime($db_date)) ?></td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Amount</th>
                        <th>Ref. No</th>
                        <th>Date</th>
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