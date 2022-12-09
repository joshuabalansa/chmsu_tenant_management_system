<?php

if (isset($_POST["logoutUser"])) {
    unset($_SESSION['id']);
    session_unset();
    session_destroy();
    echo "<center>Clearing session please wait...</center>";
    header('refresh: 1, url=index.php');
    exit();
}
?>
<!---MODAL LOGOUT-->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Warning!</h5>
                <p class="mb-0">Are you sure you want to logout?</p>
            </div>
            <form method="post">
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="logoutUser" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Logout</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL DELETE-->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Warning!</h5>
                <p class="mb-0">Are you sure you want to logout?</p>
            </div>
            <form method="post">
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="logoutUser" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Logout</a>
                </div>
            </form>
        </div>
    </div>
</div>