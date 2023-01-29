<!-- Logout Modal -->
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
                    <a href="logout.php" name="logoutUser" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Logout</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Deactivate Confirmation -->
<!-- <div class="modal fade" id="modalDeactivate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Warning!</h5>
                <p class="mb-0">Are you sure you want to deactivate this user?</p>
            </div>
            <form method="post">
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">Cancel</button>
                    <a href="process.php?deactivate=<?php echo $userId ?>" name="logoutUser" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">Deactivate</a>
                </div>
            </form>
        </div>
    </div>
</div> -->