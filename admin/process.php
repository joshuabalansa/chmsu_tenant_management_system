 <?php
    //Edit Tenant INFO Process
    include("../connections.php");

    //Edit Info in profile.php
    if (isset($_GET["editInfo"])) {
        $id = $_GET["editInfo"];
        $get_info = mysqli_query($connections, "SELECT 
        users.user_id, users.username, users.password,coordinators.user_id, coordinators.first_name, coordinators.middle_name, coordinators.last_name
         FROM users JOIN coordinators ON coordinators.user_id = users.user_id WHERE users.id = $id");
        while ($row = mysqli_fetch_assoc($get_info)) {
            $db_id = $row["user_id"];
            $db_first_name = $row["first_name"];
            $db_middle_name = $row["middle_name"];
            $db_last_name = $row["last_name"];
            $db_user = $row["username"];
            $db_pass = $row["password"];
        };
    }
    if (isset($_POST["saveProfile"])) {
        $new_fname = $_POST["new_fname"];
        $new_mname = $_POST["new_mname"];
        $new_lname = $_POST["new_lname"];
        $new_uname = $_POST["new_uname"];
        $new_password = $_POST["new_password"];

        //change info in table Tenants
        mysqli_query($connections, "UPDATE coordinators
        SET first_name='$new_fname', middle_name='$new_mname', last_name='$new_lname' WHERE user_id='$db_id'");

        mysqli_query($connections, "UPDATE users
        SET username='$new_uname', password='$new_password' WHERE user_id='$db_id'");

        header("location: profile.php");
        include("profile_edit.php");
    }

    if (isset($_GET["paymentAccept"])) {
        $id = $_GET["paymentAccept"];
        mysqli_query($connections, "UPDATE payment SET status='accepted' WHERE id=$id");
        // $get_record = mysqli_query($connections, "SELECT user");
        // mysqli_query($connections, "UPDATE users SET status='active' WHERE id=$id");

        header("location: reports.php");
    }
    if (isset($_GET["paymentReject"])) {
        $id = $_GET["paymentReject"];
        mysqli_query($connections, "DELETE FROM payment WHERE id=$id");
        header("location: reports.php");
    }
    ?>
    