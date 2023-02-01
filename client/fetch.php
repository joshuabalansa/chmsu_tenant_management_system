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

                // $ref_img = $_FILES['ref_img']['name'];
                // $target = "../uploads/" . basename($ref_img);
                // move_uploaded_file($_FILES['ref_img']['tmp_name'], $target);

                $target_dir = "../uploads/";
                $uploadErr = "";

                $target_file = $target_dir . basename($_FILES["ref_img"]["name"]);
                $uploadOK = 1;

                if (file_exists($target_file)) {
                    $target_file = $target_dir . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . "_" . basename($_FILES["ref_img"]["name"]);
                    $uploadOK = 1;
                }
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["ref_img"]["size"] > 9000000000000000000) {
                    $uploadErr = "Sorry your file is too large";
                    $uploadOK = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $uploadErr = "Error!";
                    $uploadOK = 0;
                }
                if ($uploadOK == 1) {
                    if (move_uploaded_file($_FILES["ref_img"]["tmp_name"], $target_file)) {
                        mysqli_query($connections, "INSERT INTO payment(amount, refno, ref_img, user_id) VALUES('$amount', '$refno', '$target_file','$user_id') ");
                        echo "<script>alert('Payment Submitted!')</script>";




                        // mysqli_query($connections, "UPDATE tbl_user SET img='$target_file' WHERE email='jbalansa143@gmail.com' ");
                    } else {
                        echo "Sorry the there was an error uploading the file";
                    }
                }















                $amount = $refno = "";
                $amountErr = $refnoErr = "";
            }
        }
    }
}


$get_status = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$db_id' ");
while ($row = mysqli_fetch_assoc($get_status)) {
    $db_status = $row["status"];
}
