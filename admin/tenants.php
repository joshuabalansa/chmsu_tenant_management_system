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
        <title>Tenants</title>
    </head>

    <body>
        <div class="container">
            <?php include("inc/top_nav.php") ?>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
            <div class="container">
                <br>
                <br>
                <br>
                <a href="tenant_archive.php" class="btn-sm btn btn-outline-secondary">View Archived</a>
                <br>
                <br>
                <p>List of Tenants</p>
                <hr>
                <table id="fetch_result" class="table-sm table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Business Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tenants_query = mysqli_query($connections, "SELECT * FROM tenants WHERE status = 'active' || status = 'pastdue' || status = 'incomplete' ");

                        while ($row = mysqli_fetch_assoc($tenants_query)) :
                            $user_id = $row["id"];
                            $db_first_name = $row["fname"];
                            $db_middle_name = $row["midname"];
                            $db_last_name = $row["lname"];
                            $db_email = $row["email"];
                            $db_address = $row["address"];
                            $db_contact = $row["contact"];
                            $db_type    = $row['business_type'];
                            $db_date    = $row['date'];
                            $db_status    = $row['status'];
                            //
                            $db_fullname = ucfirst($db_first_name) . " " . ucfirst($db_middle_name[0]) . ". " . ucfirst($db_last_name);
                            ($db_status == "active") ? ($badge = "success") : ($db_status == "pastdue");
                            $count_address = strlen($db_address);
                            ($count_address > 10) ? ($db_address = substr($db_address, 0, -2) . "...") : ($db_address);
                        ?>
                            <tr>
                                <td><?php echo $db_fullname ?></td>
                                <td><?php echo $db_address ?></td>
                                <td><?php echo $db_email ?></td>
                                <td><?php echo $db_contact ?></td>
                                <td><?php echo $db_type  ?></td>
                                <td><span class="badge rounded-pill text-bg-<?php echo $badge ?>"><?php echo $db_status ?></span></td>
                                <td colspan='3'>

                                    <a href='tenant_info.php?view=<?php echo $row['id'] ?>' name='btnAccept' class='btn-sm btn btn-info' title="View tenant Information">
                                        <i class='bx bxs-user-detail'></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>

                            <th>Address</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Business Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#fetch_result').DataTable();
                });
            </script>
        </div>
        <?php include("inc/modals.php") ?>
    </body>

    </html>
<?php
else :
    @include "../error.php";
endif;
?>