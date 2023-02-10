<?php

include("../../connections.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$id = $_GET['incomplete'];

mysqli_query($connections, "UPDATE tenants SET status='active' WHERE id = $id");
$get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_id = $row["id"];
    $db_fname = $row["fname"];
    $db_lname = $row["lname"];
    $email = $row["email"];
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



@include "mail_config.php";
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $mail_host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $mail_username;                     //SMTP username
    $mail->Password   = $mail_password;                                //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mail_username, $mail_recipient);    //Add a recipient
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $incomplete_subject;
    $mail->Body    = $incomplete_body;
    $mail->AltBody = $incomplete_body;

    $mail->send();
    echo 'Message has been sent';
    echo "<script>document.location.href='tenants.php'</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
