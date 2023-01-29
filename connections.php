<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
<script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<style>
    .error {
        color: red;
    }

    form {
        display: flex;
        flex-direction: column;

        justify-content: center;
    }

    form input {
        margin: 5px;
    }

    i {
        font-size: 18px;
    }
</style>

<?php
$server = "localhost";
$uname = "root";
$pass = "";
$db = "ctms";

$connections = mysqli_connect($server, $uname, $pass, $db);
if (mysqli_connect_errno()) {
    echo "Failed to connect to mySQL" . mysqli_connect_error();
}

?>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    //Validate Text field
    let inputField = document.getElementById("inputField");

    inputField.addEventListener("input", function() {
        let regex = /^[a-zA-Z\s]*$/;
        if (!regex.test(inputField.value)) {
            inputField.value = inputField.value.replace(/[^a-zA-Z\s]/g, "");
        }
    });
</script>