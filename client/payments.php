<?php

session_start();
if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_first_name = $row["first_name"];
        $db_last_name = $row["last_name"];
    }

    $name = $db_first_name . " " . $db_last_name;
    $amount = $refno = "";
    $amountErr = $refnoErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['amount'])) {
            $amountErr = "Required!";
        } else {
            $amount = $_POST['amount'];
        }
        if (empty($_POST['refno'])) {
            $refnoErr = "Required!";
        } else {
            $refno = $_POST['refno'];
        }
    }
    if ($amount && $refno) {
        mysqli_query($connections, "INSERT INTO payment(amount, refno, user_id) VALUES('$amount', '$refno', '$user_id') ");
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
            <script>
                function isNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            </script>
            <div class="d-flex justify-content-around">
                <div class="img">
                    <img src="gcash.jpg" width="300" height="400" alt="">
                </div>
                <div class="form-divider">
                    <h3>Gcash Reciept Information</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="amount">Amount</label>
                            <input autocomplete="off" maxlength="6" onkeypress="return isNumberKey(event)" required class="form-control" type="text" name="amount" placeholder="Enter the amount" id="">
                        </div>
                        <div class="mb-3">
                            <label for="refno">Ref. No.</label>
                            <input autocomplete="off" required maxlength="16" onkeypress="return isNumberKey(event)" class="form-control" type="text" name="refno" placeholder="Enter the ref. no." id="">
                        </div>
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
                </form>
            </div>

            <?php include("inc/modals.php"); ?>

        </div>

    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;

?>