<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB | <?= $page ?></title>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <?= $this->include('layout/navbar') ?>
    <div class="container mt-5">

        <?= $this->include('layout/section') ?>

        <h5 class="mt-5 text-secondary">Pembayaran</h5>
        <h3><?= $service['service_name'] ?></h3>

        <?php if (session()->getFlashdata('success')) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    html: '<?= session()->getFlashData('success') ?><br><h2>Rp. <?= old('top_up_amount') ?></h2><br>berhasil',
                    showConfirmButton: false,
                    footer: '<h3><a class="text-danger text-decoration-none" href="<?= base_url() ?>dashboard">Kembali ke Beranda</a></h3>'
                })
            </script>
        <?php endif ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    html: '<?= session()->getFlashData('error') ?><br><h2>Rp. <?= old('top_up_amount') ?></h2><br>gagal',
                    showConfirmButton: false,
                    footer: '<a class="fs-3 text-decoration-none" href="<?= base_url() ?>dashboard">Kembali ke Beranda</a>'
                })
            </script>
        <?php endif ?>

        <form class="mt-5" id="form_bayar" method="POST" action="<?= base_url() ?>transaction">
            <input type="hidden" name="service_code" value="<?= $service['service_code'] ?>">
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-credit-card-fill"></i></span>
                <input type="number" id="topup" class="form-control" readonly name="top_up_amount" value="<?= $service['service_tariff'] ?>">
            </div>
            <div class="d-grid gap-2">
                <button id="kosong" onclick="confirmation()" class="btn text-white fw-bold" style="background: red;" type="button">Bayar</button>
            </div>
        </form>

        <script>
            function confirmation() {
                Swal.fire({
                    imageUrl: '<?= base_url() ?>public/assets/Logo.png',
                    imageHeight: 75,
                    html: 'Bayar <?= $service['service_name'] ?> senilai<br><h2>Rp <?= $service['service_tariff'] ?>  ?</h2>',
                    confirmButtonText: 'Ya, lanjutkan bayar',
                    confirmButtonColor: '#d33',
                    footer: '<h3><a class="text-secondary text-decoration-none" href="<?= base_url() ?>services/<?= $service['service_code'] ?>">Batalkan</a></h3>'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#form_bayar").submit();
                    } else {
                        Swal.fire('Top Up dibatalkan', '', 'info')
                    }
                });
            }
        </script>


    </div>
</body>

</html>