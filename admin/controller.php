<?php
include("../connections.php");

if (isset($_GET["remove"])) {
    $id = $_GET['remove'];
    mysqli_query($connections, "DELETE FROM user_register WHERE id='$id'");
    header("location: tenants.php");
}



//process of accepting and rejeting button
$get_record = mysqli_query($connections, "SELECT * FROM user_register WHERE status='pending' ");
while ($row = mysqli_fetch_assoc($get_record)) {
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
    mysqli_query($connections, "UPDATE user_register SET status='rejected' WHERE id = $id");
    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'j.balansa00@gmail.com';
        $mail->Password   = 'grmqjovlsvcwmsdw';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;


        $mail->setFrom('j.balansa00@gmail.com', 'CHMSU FT');
        $mail->addAddress($email, 'user');

        $mail->isHTML(true);
        $mail->Subject = 'Thank you for taking the time to apply';
        $mail->Body    = '
     <p>
    Thank you for taking the time to apply as a tenant role at CHMSU FT. <br>
    It was a pleasure to learn more about your skills and accomplishments.<br>
    Unfortunately, the school did not select you for further consideration. <br>
    <br><br>
    Regards,
    Carlos Hilado Memorial State University
    </p>
    
    ';
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
        echo "You can check the internet connection or turn the antivirus off";
    }
}
if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    mysqli_query($connections, "UPDATE user_register SET status='approved' WHERE id = $id");

    //INSERT TO users
    $get_record = mysqli_query($connections, "SELECT * FROM user_register WHERE id='$id'");
    while ($row = mysqli_fetch_assoc($get_record)) {
        $db_id = $row["id"];
        $db_fname = $row["fname"];
        $db_midname = $row["midname"];
        $db_lname = $row["lname"];
        $db_email = $row["email"];
        $db_contact = $row["contact"];
    }
    $username = strtolower($db_fname[0]) . strtolower($db_lname);

    function random_password($lenght = 5)
    {
        $str = "abcdefghijkLmnopqrstuvwxyz1234567890";
        $shuffled = substr(str_shuffle($str), 0, $lenght);
        return $shuffled;
    }
    $password = random_password(8);
    mysqli_query($connections, "INSERT INTO users (first_name, middle_name, last_name, email, contact, username, password, user_id) 
    VALUES('$db_fname', '$db_midname','$db_lname', '$db_email', '$db_contact',  '$username', '$password', '$db_id')");
    //INSERT END

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'j.balansa00@gmail.com';
        $mail->Password   = 'grmqjovlsvcwmsdw';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;


        $mail->setFrom('j.balansa00@gmail.com', 'CHMSU FT');
        $mail->addAddress($email, 'User');




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
        echo "You can check the internet connection or turn the antivirus off";
    }
}
