<nav class="navbar navbar-expand-lg bg-white mt-3 border-bottom">
    <div class="container">

        <a class="navbar-brand text-black" href="<?= base_url() ?>dashboard"><img src="<?= base_url() ?>assets/Logo.png" width="40px">
            SIMS PPOB
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item" style="margin-right: 50px;">
                    <h5><a class="nav-link text-<?= ($page == "Topup") ? 'danger' : 'black'; ?>" aria-current="page" href="<?= base_url() ?>topup">Top Up</a></h5>
                </li>
                <li class="nav-item" style="margin-right: 50px;">
                    <h5><a class="nav-link text-<?= ($page == "Transaction") ? 'danger' : 'black'; ?>" href="<?= base_url() ?>history/5" style="color: black;">Transaction</a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link text-<?= ($page == "Profile") ? 'danger' : 'black'; ?>" href="<?= base_url('profile/') . session()->get('token') ?>" style="color: black;">Akun</a></h5>
                    <!-- <h5><a class="nav-link " href="#" style="color: black;">Akun</a></h5> -->
                </li>
            </ul>
        </div>
    </div>
</nav>