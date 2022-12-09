<?php
include("../connections.php");
session_start();
include("../connections.php");
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