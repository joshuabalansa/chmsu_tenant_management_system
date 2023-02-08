<?php

include("../../connections.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$tenantId = $_GET['tenantId'];
$paymentId = $_GET['paymentId'];

$get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$tenantId'");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_id = $row["id"];
    $db_fname = $row["fname"];
    $db_lname = $row["lname"];
    $email = $row["email"];
}

$subject = "Payment Rejected!";
$body = "Dear  $db_fname,<br> I would like to inform you that your payment submitted has beed rejected due to ";
mysqli_query($connections, "DELETE FROM payment WHERE id=$paymentId");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lagosjames34@gmail.com';                     //SMTP username
    $mail->Password   = 'eokedvuqbznlgnnw';                                  //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('j.balansa00@gmail.com', 'Carlos Hilado Memorial State University');    //Add a recipient
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;


    $mail->AltBody = $body;

    $mail->send();
    echo 'Message has been sent';
    echo "<script>document.location.href='../tenants.php'</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
