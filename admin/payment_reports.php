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
        <link rel="stylesheet" href="style/style.css">
        <title>Reports</title>
    </head>
    <body>
        <div class="container">
            <p class="lead">Reports</p>
            <table class="table-sm table table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">Name</th> -->
                        <th scope="col">Ref. No.</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $from_date = $to_date = $empty_msg = "";
                    if (isset($_GET["from_date"]) && $_GET["to_date"]) {
                        $from_date = $_GET["from_date"];
                        $to_date = $_GET["to_date"];

                        $query = "SELECT * FROM payment WHERE date BETWEEN '$from_date' AND '$to_date'";
                        $query_run = mysqli_query($connections, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                                $date = new DateTime($row["date"]);
                    ?>
                                <tr>
                                    <td> <?php echo $row["refno"] ?></td>
                                    <td><?php echo $row["amount"] ?></td>
                                    <td> <?php echo date_format($date, "M j, Y"); ?></td>
                                </tr>

                    <?php
                            }
                        } else {
                            $empty_msg = "No Records Found!";
                        }
                    }
                    ?>
                    <tr>
                        <?php
                        $query = "SELECT SUM(amount) AS total_amount FROM payment WHERE date BETWEEN '$from_date' AND '$to_date'";
                        $query_run = mysqli_query($connections, $query);
                        foreach ($query_run as $row) {
                            $total_amount = $row["total_amount"];
                        }
                        ?>
                        <td><b>Total Amount:</b> </td>
                        <td>₱ <?php echo $total_amount ?></td>
                    </tr>
                </tbody>

            </table>
            <center>
                <p><?php echo $empty_msg ?></p>
            </center>
        </div>
    </body>
    </html>
<?php
else :
    @include "../error.php";
endif;
?>