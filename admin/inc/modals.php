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
                    <a href="logout.php" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Logout</a>
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

<!--MODAL CHANGE PASSWORD /tenant_info.php -->
<div class="modal fade" id="modalChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Warning!</h5>
                <p class="mb-0">Are you sure you want to change user password?</p>
            </div>
            <form method="post">
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">Cancel</button>
                    <a href="mail/resetPassword.php?change_password=<?php echo $id ?>" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Change Password</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Deactivate -->
<div class="modal fade" id="modalDeactivate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Warning!</h5>
                <p class="mb-0">Are you sure you want to deactivate this user?</p>
            </div>
            <form method="post">
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">Cancel</button>
                    <a href="mail/deactivate_user.php?deactivateUser=<?php echo $id ?>" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Change Password</a>
                </div>
            </form>
        </div>
    </div>
</div>