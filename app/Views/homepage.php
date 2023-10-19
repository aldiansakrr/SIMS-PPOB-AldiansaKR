<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB | <?= $page ?></title>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <?= $this->include('layout/navbar') ?>
    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '<?= session()->getFlashData('success') ?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif ?>
    <div class="container mt-5">

        <?= $this->include('layout/section') ?>
        <div class="row col-md-12 mt-5">
            <?php foreach ($services as $s) : ?>
                <div class="col-md-1 text-center">
                    <a href="<?= base_url() ?>services/<?= $s['service_code'] ?>" class="text-decoration-none text-black"><img src="<?= $s['service_icon'] ?>" alt="<?= $s['service_code'] ?>">
                        <p class="fs-6 fw-bold"><?= $s['service_name'] ?></p>
                    </a>

                </div>
            <?php endforeach ?>
        </div>

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner mt-5">
                <h5>Temukan Promo Menarik</h5>
                <div class="carousel-item active">
                    <div class="row">


                        <?php foreach ($banners as $b) : ?>
                            <div class="col">
                                <div class="card">
                                    <img src="<?= $b['banner_image'] ?>" class="img-fluid" alt="<?= $b['banner_name'] ?>">
                                </div>

                            </div>
                        <?php endforeach ?>
                    </div>

                </div>
                <!-- <img src="<?= base_url() ?>public/assets/Banner 1.png" class="w-10" alt="banner1"> -->
                <!-- <div class="carousel-item">
                    <img src="<?= base_url() ?>public/assets/Banner 2.png" class="w-10" alt="banner2">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url() ?>public/assets/Banner 3.png" class="d-block w-10" alt="banner3">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url() ?>public/assets/Banner 4.png" class="d-block w-10" alt="banner4">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url() ?>public/assets/Banner 5.png" class="d-block w-10" alt="banner5">
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>