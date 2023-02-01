<?php
include("../connections.php");

//process of accepting and rejeting button
$get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE status='pending' ");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_fname = ucfirst($row["fname"]);
    $email = $row["email"];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    mysqli_query($connections, "UPDATE tenants SET status='rejected' WHERE id = $id");
    $get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_fname = $row["fname"];
    }

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'j.balansa00@gmail.com';
        $mail->Password   = 'grmqjovlsvcwmsdw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;


        $mail->setFrom('j.balansa00@gmail.com', 'Carlos Hilado Memorial State University');
        $mail->addAddress($email, 'user');

        $mail->isHTML(true);
        $mail->Subject = 'Thank you for taking the time to apply';
        $mail->Body    = "
     <p>
     Hi $db_fname,<br>
     Thank you for a and bringing this feature to our attention.<br>
     I could definitely understand how our customers would benefit from it. <br>
     Right now, we don&#39;t have anything like that in place, however, we&#39;ve actually heard that request quite a lot, so we&#39;ll possibly implement it very soon.<br>
     &#39;ll talk to our development team and find out if that could be added to a future release.<br>
     In the meantime, please let me know if there&#39;s anything else that we can help you with and have a great rest of the week!
     Best,
     <br><br>
     Regards, <br>
     Carlos Hilado Memorial State University Fortune Towne.
    </p> ";
        $mail->AltBody = '<p>
    Thank you for taking the time to apply as a tenant role at CHMSU FT. <br>
    It was a pleasure to learn more about your skills and accomplishments.<br>
    Unfortunately, our team did not select you for further consideration. <br>
    <br><br>
    Regards,
    Carlos Hilado Memorial State University
    </p>';

        $mail->send();
        echo "Reject Message Sent!";
        echo "<script>document.location.href='applicants.php'</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    mysqli_query($connections, "UPDATE tenants SET status='active' WHERE id = $id");

    //INSERT TO users
    $get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_id = $row["id"];
        $db_fname = $row["fname"];
        $db_lname = $row["lname"];
    }
    $random_num = rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9);
    $username = strtolower($db_fname[0]) . strtolower($db_lname) . $random_num;


    function random_password($lenght = 5)
    {
        $str = "abcdefghijkLmnopqrstuvwxyz1234567890";
        $shuffled = substr(str_shuffle($str), 0, $lenght);
        return $shuffled;
    }
    $password = random_password(8);

    mysqli_query($connections, "INSERT INTO users (username, password, user_id) 
    VALUES('$username', '$password', '$db_id')");

    //INSERT END
    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'j.balansa00@gmail.com';
        $mail->Password   = 'grmqjovlsvcwmsdw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;


        $mail->setFrom('j.balansa00@gmail.com', 'Carlos Hilado Memorial State University');
        $mail->addAddress($email, 'user');

        $mail->isHTML(true);
        $mail->Subject = 'You are now a part of CHMSU Tenant!';
        $mail->Body    = "You are now a part of CHMSU tenant $db_fname you can use this credentials to login your account <br>  
        <br><b>Username:</b> $username <br> <b>Password:</b> $password  </b>
        <br><br>NOTE: you can also change your password in your profile <br><br><br>
        Regards,<br>
        Carlos Hilado Memorial State University
        ";
        $mail->AltBody = "You can use this Credentials:  
        <br><b>Username:</b> $username <br> <b>Password:</b> $password  </b>
        <br><br>NOTE: you can also change your password in your profile <br><br><br>
        Regards,<br>
        Carlos Hilado Memorial State University
        ";

        $mail->send();
        echo "Accept Message Sent!";
        echo "<script>document.location.href='applicants.php'</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_GET['change_password'])) {
    $id = $_GET['change_password'];
    $get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $email = $row["email"];
    }
    function random_password($lenght = 5)
    {
        $str = "abcdefghijkLmnopqrstuvwxyz1234567890";
        $shuffled = substr(str_shuffle($str), 0, $lenght);
        return $shuffled;
    }
    $password = random_password(8);

    mysqli_query($connections, "UPDATE users SET password='$password' WHERE user_id=$id");
    $mail = new PHPMailer(true);
    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'j.balansa00@gmail.com';
        $mail->Password   = 'grmqjovlsvcwmsdw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;


        $mail->setFrom('j.balansa00@gmail.com', 'Carlos Hilado Memorial State University');
        $mail->addAddress($email, 'user');

        $mail->isHTML(true);
        $mail->Subject = 'Your password Change';
        $mail->Body    = "Your password was Change to <b>$password</b>";
        $mail->AltBody = '';

        $mail->send();
        echo "Reject Message Sent!";
        echo "<script>document.location.href='tenants.php'</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_GET["paymentReject"])) {
    $id = $_GET["paymentReject"];
    mysqli_query($connections, "DELETE FROM payment WHERE id=$id");
    $mail = new PHPMailer(true);
    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'j.balansa00@gmail.com';
        $mail->Password   = 'grmqjovlsvcwmsdw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;


        $mail->setFrom('j.balansa00@gmail.com', 'Carlos Hilado Memorial State University');
        $mail->addAddress($email, 'user');

        $mail->isHTML(true);
        $mail->Subject = 'Payment Declined';
        $mail->Body    = "Your Payment has been decline, Please check your input and resubmit your request!";
        $mail->AltBody = '';

        $mail->send();
        echo "Reject Message Sent!";
        echo "<script>document.location.href='tenants.php'</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    header("location: reports.php");
}
