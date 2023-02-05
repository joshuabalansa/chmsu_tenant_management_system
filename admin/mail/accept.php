<?php

include("../../connections.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$id = $_GET['accept'];

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

$subject = "You are now a part of CHMSU Tenant!";

$body = "You are now a part of CHMSU tenant $db_fname you can use this credentials to login your account <br>  
<br><b>Username:</b> $username <br> <b>Password:</b> $password  </b>
<br><br>NOTE: you can also change your password in your profile <br><br><br>
Regards,<br>
Carlos Hilado Memorial State University";

$mail_host = "smtp.gmail.com";
$mail_username = "j.balansa00@gmail.com";
$mail_password = "exqkrxhhvjrruzdm";
$mail_recipient = "Carlos Hilado Memorial State University";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'j.balansa00@gmail.com';                     //SMTP username
    $mail->Password   = 'exqkrxhhvjrruzdm';                               //SMTP password
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
