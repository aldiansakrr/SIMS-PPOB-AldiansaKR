<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB | Registration Page</title>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <?= $this->include('layout/navbar') ?>
    <div class="container mt-5">

        <?= $this->include('layout/section') ?>

        <h5 class="mt-5 text-black">Semua Transaksi</h5>
        <ul class="nav nav-tabs" style="border: none;" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="<?= base_url() ?>history/01" class="nav-link" id="januari-tab" data-bs-toggle="tab" data-bs-target="#januari" type="button" role="tab" aria-controls="home" aria-selected="true">Januari</a>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="januari" role="tabpanel" aria-labelledby="januari-tab">
                <p class="text-center text-secondary" style="font-size: small; margin-top:100px;">Januari</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p class="text-center text-secondary" style="font-size: small; margin-top:100px;">Maaf tidak ada histori transaksi saat ini</p>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <p class="text-center text-secondary" style="font-size: small; margin-top:100px;">Maaf tidak ada histori transaksi saat ini</p>
            </div>
        </div>

        <!-- <nav class="nav nav-tabs fw-bold" id="pills-tab" style="margin-left: -15px;">
            <a class="nav-link text-secondary" id="pills-maret-tab" aria-current="page" href="#">Maret</a>
            <a class="nav-link text-secondary" id="pills-mei-tab" href="#">Mei</a>
            <a class="nav-link text-secondary" id="pills-juni-tab" href="#">Juni</a>
            <a class="nav-link text-secondary" href="#">Juli</a>
            <a class="nav-link active text-black" href="#">Agustus</a>
            <a class="nav-link text-secondary" href="#">September</a>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-maret" role="tabpanel" aria-labelledby="pills-home-tab">Maret</div>
                <div class="tab-pane fade" id="pills-mei" role="tabpanel" aria-labelledby="pills-profile-tab">mei</div>
                <div class="tab-pane fade" id="pills-juni" role="tabpanel" aria-labelledby="pills-contact-tab">juni</div>
            </div>
        </nav> -->


    </div>
</body>

</html>