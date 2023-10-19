<div class="row">

    <div class="col-6">

        <div class="float-start">
            <?php if ($profile['profile_image'] == "https://minio.nutech-integrasi.app/take-home-test/null") : ?>
                <img class="img-fluid rounded-circle" src="<?= base_url() ?>assets/Profile Photo.png" alt="Profile Photo" width="90px" style="margin-bottom: 15px;">
            <?php else : ?>
                <img class="img-fluid rounded-circle" src="<?= $profile['profile_image'] ?>" alt="Profile Photo" width="90px" style="margin-bottom: 15px;">
            <?php endif; ?>
            <p style="color: grey; font-size:22px">Selamat datang,</p>
            <h2 style="margin-top: -20px;"><b><?= $profile['first_name'] . ' ' . $profile['last_name']; ?></b></h2>
        </div>
    </div>
    <div class="col-6">
        <div class="card text-white">
            <img class="img-fluid card-img" src="<?= base_url() ?>assets/Background Saldo.png" alt="">
            <div class="card-img-overlay">
                <p class="text-white">Saldo Anda</p>
                <h3 id="saldoclosed" style=>Rp ••••••</h3>
                <h3 id="saldoopened" style=>Rp. <?= number_format($balance['balance']) ?> </h3>
                <br>
                <p class="text-white" id="open" style="font-size:14px; margin-top: -15px;">Lihat Saldo</p>
                <p class="text-white" id="closed" style="font-size:14px; margin-top: -15px;">Tutup Saldo</p>

            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $("#isi").hide();
        $("#closed").hide();
        $("#saldoopened").hide();

        $("#open").click(function() {
            $("#open").hide();
            $("#closed").show();
            $("#saldoopened").show();
            $("#saldoclosed").hide();

        });

        $("#closed").click(function() {
            $("#closed").hide();
            $("#open").show();
            $("#saldoopened").hide();
            $("#saldoclosed").show();
        });
    });
</script>