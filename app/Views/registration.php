<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB | Registration Page</title>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <div class="row col-md-12">
        <div class="container col-md-6" style="padding: 70px; text-align: center;">
            <div>
                <h5><img src="<?= base_url() ?>assets/Logo.png" width="30px" style="margin-right: 10px;">SIMS PPOB</h5>

                <h4 class="mt-4">Lengkapi data untuk <br> membuat akun</h4>
            </div>
            <form class="mt-4" style="width:80%; margin-left:60px;" method="POST" action="<?= base_url() ?>registration" novalidate>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control <?= (!empty(validation_show_error('email'))) ? 'is-invalid' : '' ?>" placeholder="masukkan email anda" name="email" value="<?= old('email') ? old('email') : '' ?>">
                    <?php if (!empty(validation_show_error('email'))) : ?>
                        <div class="invalid-feedback">
                            <?= validation_show_error('email') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control <?= (!empty(validation_show_error('first_name'))) ? 'is-invalid' : '' ?>" placeholder="nama depan" name="first_name" value="<?= old('first_name') ? old('first_name') : '' ?>">
                    <?php if (!empty(validation_show_error('first_name'))) : ?>
                        <div class="invalid-feedback">
                            <?= validation_show_error('first_name') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control <?= (!empty(validation_show_error('last_name'))) ? 'is-invalid' : '' ?>" placeholder="nama belakang" name="last_name" value="<?= old('last_name') ? old('last_name') : '' ?>">
                    <?php if (!empty(validation_show_error('last_name'))) : ?>
                        <div class="invalid-feedback">
                            <?= validation_show_error('last_name') ?>
                        </div>
                    <?php endif ?>
                </div>

                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                    <input id="password" type="password" class="form-control <?= (!empty(validation_show_error('password'))) ? 'border-danger' : '' ?>" placeholder="buat password" name="password">
                    <span id="passopen" class="input-group-text"><i class="bi bi-eye-fill"></i></span>
                    <span id="passclosed" class="input-group-text"><i class="bi bi-eye-slash-fill"></i></span>
                </div>
                <?php if (!empty(validation_show_error('password'))) : ?>
                    <p class="text-danger">
                        <?= validation_show_error('password') ?>
                    </p>
                <?php endif ?>
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                    <input id="confpassword" type="password" class="form-control <?= (!empty(validation_show_error('confpassword'))) ? 'border-danger' : '' ?>" placeholder="konfirmasi password" name="confpassword">
                    <span id="confopen" class="input-group-text"><i class="bi bi-eye-fill"></i></span>
                    <span id="confclosed" class="input-group-text"><i class="bi bi-eye-slash-fill"></i></span>
                </div>
                <?php if (!empty(validation_show_error('confpassword'))) : ?>

                    <p class="text-danger">
                        <?= validation_show_error('confpassword') ?>
                    </p>
                <?php endif ?>


                <button type="submit" style="width: 100%; height:50px; background:red; color:white; border:0px; padding:10px; font-size:medium;"><b>Registrasi</b></button>
                <br><br>
                <p class="text-center text-secondary" style="margin-bottom:-100px;">Sudah punya akun? login <a class="text-danger" href="<?= base_url() ?>" style="text-decoration:none;"><b>di sini</b></a></p>
            </form>
        </div>
        <div class="col-md-6">
            <img class="img-fluid" src="<?= base_url() ?>assets/Illustrasi Login.png" alt="" width="580px" style="margin-left: 95px;">
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#passclosed").hide();
            $("#confclosed").hide();

            $("#passopen").click(function() {
                $("#passopen").hide();
                $("#passclosed").show();
                $("#password").attr("type", "text");
            });

            $("#passclosed").click(function() {
                $("#passclosed").hide();
                $("#passopen").show();
                $("#password").attr("type", "password");
            });

            $("#confopen").click(function() {
                $("#confopen").hide();
                $("#confclosed").show();
                $("#confpassword").attr("type", "text");
            });

            $("#confclosed").click(function() {
                $("#confclosed").hide();
                $("#confopen").show();
                $("#confpassword").attr("type", "password");
            });

        });
    </script>
</body>

</html>