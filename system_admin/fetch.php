<?php
$get_record = mysqli_query($connections, "SELECT * FROM users WHERE id='$user_id' ");
while ($row = mysqli_fetch_assoc($get_record)) {
    $db_username = $row["username"];
}
