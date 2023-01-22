<?php
$fname = $midname =  $lname = $email = $contact = $business_type = $password = $address = $s_permit = $b_permit = $h_certificate  = "";
$birth_date = $birth_dateErr = $l_intent = $l_intentErr = "";
$fnameErr = $midnameErr = $lnameErr = $emailErr = $contactErr = $business_typeErr = $passwordErr = $addressErr = $s_permitErr = $b_permitErr = $h_certificateErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required!";
    } else {
        $fname = $_POST["fname"];
    }
    if (empty($_POST["midname"])) {
        $midnameErr = "Middle name is required!";
    } else {
        $midname = $_POST["midname"];
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required!";
    } else {
        $lname = $_POST["lname"];
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["contact"])) {
        $contactErr = "Contact is required!";
    } else {
        $contact = $_POST["contact"];
    }
    if (empty($_POST["birth_date"])) {
        $birth_dateErr = "Date of birth is required!";
    } else {
        $birth_date = $_POST["birth_date"];
    }
    if (empty($_POST["business_type"])) {
        $business_typeErr = "type of business is required!";
    } else {
        $business_type = $_POST["business_type"];
    }
    if (empty($_POST["password"])) {
        $password = "password is required!";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["address"])) {
        $addressErr = "Address is required!";
    } else {
        $address = $_POST["address"];
    }
    //FIle
    // if (empty($_POST["l_intent"])) {
    //     $l_intentErr = "Letter of intent is required!";
    // } else {
    //     $l_intent = $_POST["l_intent"];
    // }
    // if (empty($_POST["b_permit"])) {
    //     $b_permitErr = "Business Permit is required!";
    // } else {
    //     $b_permit = $_POST["b_permit"];
    // }
    // if (empty($_POST["h_certificate"])) {
    //     $h_certificateErr = "health Certificate is required!";
    // } else {
    //     $h_certificate = $_POST["h_certificate"];
    // }
    // if (empty($_POST["s_permit"])) {
    //     $s_permitErr = "Sanitary Permit is required!";
    // } else {
    //     $s_permit = $_POST["s_permit"];
    // }
    // $l_intent = $_POST["l_intent"];
    // $b_permit = $_POST["b_permit"];
    // $h_certificate = $_POST["h_certificate"];
    // $s_permit = $_POST["s_permit"];

    if ($fname && $midname && $lname && $email && $contact && $business_type && $address) {
        if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
            $fnameErr = "Invalid!";
        } else {
            $count_first_name_string = strlen($fname);
            if ($count_first_name_string < 2) {
                $fnameErr = "Too short";
            } else {
                if (!preg_match("/^[a-zA-Z]*$/", $midname)) {
                    $midnameErr = "Invalid!";
                } else {
                    $count_middle_name_string = strlen($midname);
                    if ($count_middle_name_string < 2) {
                        $midnameErr = "Too short!";
                    } else {
                        if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
                            $lnameErr = "Invalid!";
                        } else {
                            $count_last_name_string = strlen($lname);
                            if ($count_last_name_string < 2) {
                                $lnameErr = "Too short!";
                            } else {
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $emailErr = "Invalid email format!";
                                } else {
                                    if (!preg_match("/^[0-9]*$/", $contact)) {
                                        $contactErr = "Invalid!";
                                    } else {

                                        $s_permit = $_FILES['s_permit']['name'];
                                        $b_permit = $_FILES['b_permit']['name'];
                                        $h_certificate = $_FILES['h_certificate']['name'];
                                        $l_intent = $_FILES['l_intent']['name'];

                                        $target1 = "uploads/" . basename($s_permit);
                                        $target2 = "uploads/" . basename($b_permit);
                                        $target3 = "uploads/" . basename($h_certificate);
                                        $target4 = "uploads/" . basename($l_intent);

                                        move_uploaded_file($_FILES['s_permit']['tmp_name'], $target1);
                                        move_uploaded_file($_FILES['b_permit']['tmp_name'], $target2);
                                        move_uploaded_file($_FILES['h_certificate']['tmp_name'], $target3);
                                        move_uploaded_file($_FILES['l_intent']['tmp_name'], $target4);


                                        mysqli_query($connections, "INSERT INTO tenants(fname, midname, lname, email, contact, birth_date, business_type, address,l_intent, s_permit, b_permit, h_certificate) 
                                            VALUES('$fname', '$midname', '$lname', '$email', '$contact','$birth_date', '$business_type', '$address', '$l_intent', '$s_permit', '$b_permit', '$h_certificate') ");
                                        // echo "<script>location.href='pending_page.php'</script>";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
