<?php
$get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_username = $row["username"];
    $db_id = $row["user_id"];
}
// $get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
// while ($row = mysqli_fetch_assoc($get_record)) {
//     $user_id = $row["user_id"];
//     $db_username = $row["username"];
// }


//Payment Validation
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
    if (!is_numeric($amount)) {
        $amountErr = "Invalid Input";
    } else {
        $count_middle_name_string = strlen($refno);
        if ($count_middle_name_string < 13) {
            $refnoErr = "Invalid Ref.No";
        } else {
            if (!preg_match("/^[0-9]*$/", $refno)) {
                $refnoErr = "Invalid Input";
            } else {
                mysqli_query($connections, "INSERT INTO payment(amount, refno, user_id) VALUES('$amount', '$refno', '$user_id') ");
                echo "<script>alert('Payment Submitted!')</script>";
                $amount = $refno = "";
                $amountErr = $refnoErr = "";
            }
        }
    }
}
