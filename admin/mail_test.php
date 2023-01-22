<?php

include("../connections.php");



$db_retrieve = mysqli_query($connections, "SELECT * FROM tenants WHERE status='pending' ");
while ($row = mysqli_fetch_assoc($db_retrieve)) {
    $db_name = $row["fname"];
    $recipients = $row["email"]. ',';
        echo $recipients;
}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$due_date = date("d");
$status = "active";

if ($due_date == 20) {
    $status = "Inactive";


    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'j.balansa00@gmail.com';
        $mail->Password   = 'grmqjovlsvcwmsdw'; //Google App Password                       
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('j.balansa00@gmail.com', 'Carlos Hilado Memorial State University');
        // $mail->addAddress('jbalansa143@gmail.com', 'User');

            $mail->addAddress($recipients);


        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Carlos Hilado Memorial State University';
        $mail->Body    = $db_name . $status . ' Due!';
        $mail->AltBody = 'Due!';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $status = "Active";
}
echo $status;
