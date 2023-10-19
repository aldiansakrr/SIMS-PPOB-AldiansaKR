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

        <h5 class="mt-5 text-secondary">Silahkan masukan</h5>
        <h3>Nominal Top Up</h3>

        <form class="mt-5" style="width: 60%;" id="form_topup" method="POST" action="<?= base_url() ?>topup">
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="number" min="10000" id="topup" class="form-control" placeholder=" masukkan nominal Top Up" name="top_up_amount" value="<?= old('email') ? old('email') : '' ?>">
            </div>
            <div class="d-grid gap-2">
                <button id="kosong" class="btn btn-secondary" type="button">Top Up</button>
                <button id="isi" onclick="confirmation()" class="btn btn-danger" type="button">Top Up</button>
            </div>
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
        </form>

        <div class="row justify-content-end">
            <button onClick="nominal(10000)" type="button" class="btn btn-outline-secondary text-black col-md-4" style="margin-top: -122px; margin-left:-60px; height:45px; width:110px;">Rp10.000</button> &nbsp; &nbsp;
            <button onClick="nominal(20000)" type="button" class="btn btn-outline-secondary text-black col-md-4" style="margin-top: -122px; height:45px; width:110px;">Rp20.000</button> &nbsp; &nbsp;
            <button onClick="nominal(50000)" type="button" class="btn btn-outline-secondary text-black col-md-4" style="margin-top: -122px; height:45px; width:110px;">Rp50.000</button> &nbsp; &nbsp;
        </div>
        <br> <br>
        <div class="row justify-content-end">
            <button onClick="nominal(100000)" type="button" class="btn btn-outline-secondary text-black col-md-4" style="margin-top: -122px; margin-left:-60px; height:45px; width:110px;">Rp100.000</button> &nbsp; &nbsp;
            <button onClick="nominal(250000)" type="button" class="btn btn-outline-secondary text-black col-md-4" style="margin-top: -122px; height:45px; width:110px;">Rp250.000</button> &nbsp; &nbsp;
            <button onClick="nominal(500000)" type="button" class="btn btn-outline-secondary text-black col-md-4" style="margin-top: -122px; height:45px; width:110px;">Rp500.000</button> &nbsp; &nbsp;
        </div>

        <script>
            $(document).ready(function() {

                $("#topup").on('keyup', function() {
                    var nominalval = $("#topup").val();
                    if (nominalval != '' && nominalval != 0) {
                        $("#isi").show();
                        $("#kosong").hide();
                    } else {
                        $("#kosong").show();
                        $("#isi").hide();
                    }
                });

            });

            function confirmation() {
                var val = $("#topup").val();
                Swal.fire({
                    imageUrl: '<?= base_url() ?>public/assets/Logo.png',
                    imageHeight: 75,
                    html: 'Anda yakin untuk Top Up sebesar<br><h2>Rp. ' + val + ' ?</h2>',
                    confirmButtonText: 'Ya, lanjutkan Top Up',
                    confirmButtonColor: '#d33',
                    footer: '<h3><a class="text-secondary text-decoration-none" href="<?= base_url() ?>topup">Batalkan</a></h3>'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#form_topup").submit();
                    } else {
                        Swal.fire('Top Up dibatalkan', '', 'info')
                    }
                });
            }

            function nominal(x) {
                var angka = parseInt(x);
                $("#topup").val('');
                $("#topup").val(angka);
                $("#isi").show();
                $("#kosong").hide();
            }
        </script>

    </div>
</body>

</html>