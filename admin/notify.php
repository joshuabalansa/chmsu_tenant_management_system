<?php

include("../connections.php");





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$due_date = date("d");
$status = "active";

if ($due_date == 28) {
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
        $query = "SELECT * FROM tenants";
        $result = $connections->query($query);

        while ($row = $result->fetch_assoc()) {
            $mail->addAddress($row['email']);
        }
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Carlos Hilado Memorial State University';
        $mail->Body    = "Dear, CHMSU Tenant <br>

        This is a reminder that your payment for rental payment is about to end. The due <br> 
        date will be the end of this month. We kindly request that you take care of this outstanding <br>
        balance as soon as possible.
        
        If you have any questions or concerns, please don't hesitate to reach out to us at Carlos Hilado Memorial State University cashier. We want to <br> 
        work with you to resolve this matter promptly. <br>
        
        Thank you for your attention to this matter. <br>
        
        Sincerely, Carlos Hilado Memorial State University";


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
