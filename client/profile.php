<?php
session_start();

if (isset($_SESSION["id"])) :
    $user_id = $_SESSION["id"];
    include("../connections.php");
    include("fetch.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
        <script src="../plugins/bootstrap/js/bootstrap.bundle.js"></script>
        <title>My Profile</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <br><br>
            <h5>My Info</h5>
            <?php
            $get_info = mysqli_query($connections, "SELECT * FROM tenants WHERE id='$db_id' ");
            while ($row = mysqli_fetch_assoc($get_info)) {
                $db_status = $row["status"];
                $db_first_name = $row["fname"];
                $db_middle_name = $row["midname"];
                $db_last_name = $row["lname"];
                $db_address = $row["address"];
                $db_email = $row["email"];
                $db_birth_date = $row["birth_date"];
                $db_contact = $row["contact"];
            }
            $fullname = $db_first_name . " " . $db_middle_name . " " . $db_last_name;
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Status:</th>
                        <td><?php echo ucfirst($db_status) ?></td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $fullname ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo $db_birth_date ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $db_email ?></td>
                    </tr>
                    <tr>
                        <th>Contact:</th>
                        <td><?php echo $db_contact ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td> <?php echo $db_address ?></td>
                    </tr>
                    <tr>
                        <th>Letter of intent</th>
                        <td> <?php echo "Complete" ?></td>
                    </tr>
                </thead>
            </table>
            <a class="btn btn-info" href="process.php?update=<?php echo $db_id ?>">Update</a>
        </div>
        <?php include("inc/modals.php"); ?>
        </div>

    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;

?>