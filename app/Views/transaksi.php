<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB | <?= $page ?></title>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <?php
    function format_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 13, 5);
        $wib = substr($date, 10, 3);

        $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu . " " . $wib;

        return $result;
    }
    ?>
    <?= $this->include('layout/navbar') ?>

    <div class="container mt-5">

        <?= $this->include('layout/section') ?>

        <h5 class="mt-5 text-black">Semua Transaksi</h5>
        <br>
        <?php if (!empty($transaction)) : ?>
            <?php foreach ($transaction as $t) : ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <?php if ($t['transaction_type'] == "PAYMENT") : ?>
                            <h4 class="text-danger">- Rp.<?= number_format($t['total_amount']) ?></h4>
                        <?php else : ?>
                            <h4 class="text-success">+ Rp.<?= number_format($t['total_amount']) ?></h4>
                        <?php endif ?>
                        <p class="text-secondary" style="font-size: small;"><?= format_indo(date($t['created_on'])) ?></p>
                        <p class="text-secondary fw-bold float-end" style="font-size: small;"><?= $t['description'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>

            <div class="mt-4 mb-4 text-center">
                <a href="<?= base_url() ?>history/<?= $limit + 5 ?>" class="fw-bold text-danger text-decoration-none">Show more</a>
            </div>

        <?php else : ?>
            <ul class="nav nav-tabs text-black" style="border: 0;" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-black fw-bold" id="agustus-tab" data-bs-toggle="tab" data-bs-target="#agustus" type="button" role="tab" aria-controls="agustus" aria-selected="false">Agustus</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-black fw-bold" id="september-tab" data-bs-toggle="tab" data-bs-target="#september" type="button" role="tab" aria-controls="september" aria-selected="false">September</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-black fw-bold active" id="oktober-tab" data-bs-toggle="tab" data-bs-target="#oktober" type="button" role="tab" aria-controls="oktober" aria-selected="false">Oktober</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade" id="agustus" role="tabpanel" aria-labelledby="agustus-tab">
                    <p class="text-center text-secondary" style="font-size: small; margin-top:100px;">Maaf tidak ada histori transaksi saat ini</p>
                </div>
                <div class="tab-pane fade" id="september" role="tabpanel" aria-labelledby="september-tab">
                    <p class="text-center text-secondary" style="font-size: small; margin-top:100px;">Maaf tidak ada histori transaksi saat ini</p>
                </div>
                <div class="tab-pane active" id="oktober" role="tabpanel" aria-labelledby="oktober-tab">
                    <p class="text-center text-secondary" style="font-size: small; margin-top:100px;">Maaf tidak ada histori transaksi saat ini</p>
                </div>

            <?php endif ?>

            </div>
</body>

</html>