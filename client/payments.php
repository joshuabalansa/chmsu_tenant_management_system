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
        
        <title>Payments</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <br><br>
            <div class="d-flex justify-content-around">
                <div class="img">
                    <img src="gcash.jpg" width="300" height="400" alt="">
                </div>
                <div class="form-divider">
                    <h3>Gcash Reciept Information</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="amount">Amount</label>
                            <input value="<?php echo $amount ?>" autocomplete="off" maxlength="6" onkeypress="return isNumberKey(event)" class="form-control" type="text" name="amount" placeholder="Enter the amount">
                            <span style="color: red;"><?php echo $amountErr ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="refno">Ref. No.</label>
                            <input value="<?php echo $refno ?>" autocomplete="off" maxlength="13" onkeypress="return isNumberKey(event)" class="form-control" type="text" name="refno" placeholder="Enter the ref. no.">
                            <span style="color: red;"><?php echo $refnoErr ?></span>
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