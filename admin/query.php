<?php
$get_applicant_info = mysqli_query($connections, "SELECT * FROM user_register WHERE id='$id'");
$get_applicants = mysqli_query($connections, "SELECT * FROM user_register WHERE status='pending'");
