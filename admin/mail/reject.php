<?php

include("../../connections.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$id = $_GET['reject'];
mysqli_query($connections, "DELETE FROM payment WHERE id=$id");

mysqli_query($connections, "UPDATE tenants SET status='rejected' WHERE id = $id");
$get_record = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$id'");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_fname = $row["fname"];
    $email = $row["email"];
}


$subject = "Thank you for taking the time to apply!";

$body = " <p> Hi $db_fname,<br>
Thank you for a and bringing this feature to our attention.<br>
I could definitely understand how our customers would benefit from it. <br>
Right now, we don&#39;t have anything like that in place, however, we&#39;ve actually heard that request quite a lot, so we&#39;ll possibly implement it very soon.<br>
&#39;ll talk to our development team and find out if that could be added to a future release.<br>
In the meantime, please let me know if there&#39;s anything else that we can help you with and have a great rest of the week!
Best,
<br><br>
Regards, <br>
Carlos Hilado Memorial State University Fortune Towne.
</p>";

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
    $mail->setFrom('j.balansa00@gmail.com', 'Carlos Hilado Memorial State University');     //Add a recipient
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
