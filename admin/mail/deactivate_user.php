<?php

include("../../connections.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$id = $_GET['deactivateUser'];

mysqli_query($connections, "UPDATE users SET account_type='archived' WHERE user_id=$id");
$get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_id = $row["id"];
    $db_fname = ucfirst($row["fname"]);
    $db_lname = $row["lname"];
    $email = $row["email"];
}

$subject = "Account Deactivated!";
$body = "We regret to inform you $db_fname that your account has been deactivated due to inactivity As a result, your account will no longer have access to the system provided by Carlos Hilado Memorial State University. Please note that any content or data associated with your account may also be permanently deleted soon.

If you believe that this deactivation was in error, please contact us at Carlos Hilado Memorial State University to have your account reviewed. Please include a detailed explanation of the situation, and any relevant information or evidence to support your case.";


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'j.balansa00@gmail.com';                     //SMTP username
    $mail->Password   = 'grmqjovlsvcwmsdw';                               //SMTP password
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
    echo "<script>document.location.href='tenants.php'</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
