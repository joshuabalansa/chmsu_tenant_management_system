<nav class="navbar mt-1 navbar-expand-lg bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CHMSU TMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="applicants.php">Applicants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="tenants.php">Tenants</a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link active" href="payments.php">Payments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="logs.php">logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="profile.php">Profile</a>
                </li>
            </ul>
            <div>
                <?php echo "$db_username"; ?>
                <button title="Logout" type='submit' name="logoutUser" data-bs-toggle="modal" data-bs-target="#modalLogout" class='btn-sm btn btn-primary'><i class='bx bx-exit'></i></button>
            </div>
        </div>
    </div>
</nav>