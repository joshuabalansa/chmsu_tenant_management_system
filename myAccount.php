<script src="Admin/js/jQuery.js"></script>

<?php
include("connections.php");
$query_info = mysqli_query($connections, "SELECT * FROM tbl_user WHERE email='jbalansa143@gmail.com' ");
$my_info = mysqli_fetch_assoc($query_info);
$img = $my_info['img'];


echo "<img style='border-radius: 100%;' src='$img' height='300px' width='300px'>";


echo $img;
?>
<!-- <script>
    var _URL = window.URL || window.webkitURL;

    function displayPreview(files) {
        var file = files[0];
        var img = new Image();
        var sizeKB = file.size / 1024;
        img.onload = function() {
            $('#preview').append(img);
        }
        img.src = _URL.createObjectURL(file);
    }
</script> -->

<?php
$target_dir = "images/";
$uploadErr = "";
if (isset($_POST['btnUpload'])) {
    $target_file = $target_dir . "/" . basename($_FILES["profile_pic"]["name"]);
    $uploadOK = 1;

    if (file_exists($target_file)) {
        $target_file = $target_dir . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . "_" . basename($_FILES["profile_pic"]["name"]);
        $uploadOK = 1;
    }
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($_FILES["profile_pic"]["size"] > 5000000000000000000) {
        $uploadErr = "Sorry your file is too large";
        $uploadOK = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadErr = "Error!";
        $uploadOK = 0;
    }
    if ($uploadOK == 1) {
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            mysqli_query($connections, "UPDATE tbl_user SET img='$target_file' WHERE email='jbalansa143@gmail.com' ");
            echo "<script>window.location.href='myAccount.php?notify=$notify'</script>";
        } else {
            echo "Sorry the there was an error uploading the file";
        }
    }
    if ((empty($_GET['notify']))) {
        //
    } else {
        echo $_GET["notify"];
    }
}

?>
<form action="" enctype="multipart/form-data" method="post">
    <table width='20%' border="0">
        <tr>
            <td colspan="2">
                <center>
                    <span style="width: 100px; height: 100px" id="preview"></span>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <input type="file" name="profile_pic" onchange="displayPreview(this.files)" id="">
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <input type="submit" name="btnUpload" value="Upload">
                </center>
            </td>
        </tr>
    </table>
</form>
<span><?php echo $uploadErr ?></span>