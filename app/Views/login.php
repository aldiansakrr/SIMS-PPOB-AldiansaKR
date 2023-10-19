<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB | <?= $page ?></title>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <div class="row col-md-12">
        <div class="container col-md-6" style="padding: 100px; text-align:center; margin-top:20px;">
            <div>
                <h5><img src="<?= base_url() ?>assets/Logo.png" width="30px" style="margin-right: 10px;">SIMS PPOB</h5>

                <h4 class="mt-4">Masuk atau buat akun <br> untuk memulai</h4>
            </div>
            <form class="mt-5" style="width:90%; margin-left:30px;" method="POST" action="<?= base_url() ?>login">
                <div class="input-group mb-5">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="masukkan email anda" name="email" value="<?= old('email') ? old('email') : '' ?>">
                </div>
                <div class="input-group mb-5">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" placeholder="masukkan pasword anda" name="password">
                </div>
                <button type="submit" style="width: 100%; height:50px; background:red; color:white; border:0px; padding:10px; font-size:medium;"><b>Masuk</b></button>
                <p class="mb-5 text-secondary" style="margin-top: 30px;">belum punya akun? registrasi <a class="text-danger" href="<?= base_url() ?>registration" style="text-decoration:none;"><b>di sini</b></a></p>
            </form>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;
            if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif ?>
        </div>
        <div class="col-md-6">
            <br><br>
            <img class="img-fluid" src="<?= base_url() ?>assets/Illustrasi Login.png" alt="" width="580px" style="margin-left: 95px;">
        </div>

    </div>
</body>

</html>