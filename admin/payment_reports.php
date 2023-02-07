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
        <title>Reports</title>

    </head>

    <body>
        <div class="container">
            <?php
            include("inc/top_nav.php");
            include("inc/modals.php");

            ?>
            <br>
            <br>

            <form action="" method="GET">
                <p class="lead">Select Date</p>
                <div class="input-group mb-3">

                    <input class="form-control" type="date" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                                        echo $_GET['from_date'];
                                                                                    } ?>" id="">

                    <input class="form-control" type="date" name="to_date" value="<?php if (isset($_GET['to_date'])) {
                                                                                        echo $_GET['to_date'];
                                                                                    } ?>" id="">
                </div>
            </form>
            <button class="btn btn-primary" type="submit">Filter</button>
            <button class="btn btn-primary" type="submit">Print</button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">Name</th> -->
                        <th scope="col">Amount</th>
                        <th scope="col">Ref. No.</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if (isset($_GET["from_date"]) && $_GET["to_date"]) {
                        $from_date = $_GET["from_date"];
                        $to_date = $_GET["to_date"];

                        $query = "SELECT * FROM payment WHERE date BETWEEN '$from_date' AND '$to_date' ";
                        $query_run = mysqli_query($connections, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) { ?>
                                <tr>
                                    <td> <?php echo $row["amount"] ?></td>
                                    <td> <?php echo $row["refno"] ?></td>
                                    <td> <?php echo $row["date"] ?></td>
                                </tr>

                    <?php
                            }
                        } else {

                            echo "No record Found!";
                        }
                    }
                    ?>
                    <tr>
                        <td>Amount:</td>
                        <td>Amount:</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>