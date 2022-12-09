<?php
include("../connections.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Pending</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            text-align: center;
        }

        .image {
            width: 30rem;
            height: 30rem;
        }

        h2 {
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="img-fluid image mt-4" src="../assets/undraw_loading.svg" alt=""><br>
        <h2>Your request is pending for approval</h2>
        <p class="lead mt-2">You will recieve an email notification when your request has been approved.</p>
    </div>
</body>

</html>