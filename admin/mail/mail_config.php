<?php
$mail_host = "smtp.gmail.com";
$mail_username = "carlibabao1115@gmail.com";
$mail_password = "ugobmnnmaytogrts";
$mail_recipient = "Carlos Hilado Memorial State University";

$accept_subject = "You are now a part of CHMSU Tenant!";

$accept_body = "You are now a part of CHMSU tenant $db_fname you can use this credentials to login your account <br>  
<br><b>Username:</b> $username <br> <b>Password:</b> $password  </b>
<br><br>NOTE: you can also change your password in your profile <br><br><br>
Regards,<br>
Carlos Hilado Memorial State University";

$deactivate_subject = "Account Deactivated!";
$deactivate_body = "We regret to inform you $db_fname that your account has been deactivated due to inactivity As a result, your account will no longer have access to the system provided by Carlos Hilado Memorial State University. Please note that any content or data associated with your account may also be permanently deleted soon.
If you believe that this deactivation was in error, please contact us at Carlos Hilado Memorial State University to have your account reviewed. Please include a detailed explanation of the situation, and any relevant information or evidence to support your case.";


$incomplete_subject = "You are now a part of CHMSU Tenant!";

$incomplete_body = "I hope this email finds you well.  $db_fname I am writing to inform you that your recent submission of legal requirements is missing some important information and requirements, and as a result, we are unable to proceed with its completion. 
<br><br>
You can use this credentials to login your account. <br>
<b>Username:</b> $username <br> <b>Password:</b> $password  </b><br><br>";


$paymentReject_subject = "Payment Rejected!";
$paymentReject_body = "Dear  $db_fname,<br> I would like to inform you that your payment submitted has beed rejected due to ";

$resetPassword_subject = "Password Reset!";
$resetPassword_body = "Your password was Change to <b>$password</b>";
