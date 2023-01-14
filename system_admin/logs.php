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
        <title>Logs</title>

    </head>

    <body>
        <div class="container">
            <?php
            @include("inc/top_nav.php");
            @include("inc/modals.php");
            ?>
            <br>
            <br>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
            <div class="container bg-light">
                <br>
                <p>List of user login logs</p>
                <hr>
                <table id="fetch_result" class="table-sm table table-hover">
                    <thead>
                        <tr>
                            <th>Users Name</th>
                            <th>Type</th>
                            <th>Login Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_record = mysqli_query($connections, "SELECT * FROM logs ");
                        while ($row = mysqli_fetch_assoc($get_record)) :
                            $db_fname = $row['first_name'];
                            $db_account_type = $row['account_type'];
                            $db_date = $row['date'];
                        ?>
                            <tr>
                                <td><?php echo $db_fname ?></td>
                                <td><?php echo $db_account_type ?></td>
                                <td><?php echo date("F j, Y, g:i a", strtotime($db_date)) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Users Name</th>
                            <th>Type</th>
                            <th>Date Timestamp</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
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