<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB | <?= $page ?></title>
    <?= $this->include('layout/head') ?>
</head>

<body>
    <?= $this->include('layout/navbar') ?>
    <div class="container mt-5 col-6">
        <div class="text-center">
            <div class="img-wrapper">

                <?php if ($profile['profile_image'] == "https://minio.nutech-integrasi.app/take-home-test/null") : ?>
                    <img class="img-fluid rounded-circle" src="<?= base_url() ?>public/assets/Profile Photo.png" alt="Profile Photo" width="150px">
                <?php else : ?>
                    <img class="img-fluid rounded-circle" src="<?= $profile['profile_image'] ?>" alt="Profile Photo" width="150px">
                <?php endif; ?>
                <button type="button" data-bs-toggle="modal" data-bs-target="#gambar" class="btn btn-danger" data-bs-toggle="modal" data-bs-tager="#image">
                    <i class="bi bi-pencil-fill"></i>
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="gambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Gambar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url() ?>image" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="token" value="<?= session()->get('token') ?>">
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" name="file" class="form-control-file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <h1 class="mt-3"><?= $profile['first_name'] . ' ' . $profile['last_name']; ?></h1>
        </div>

        <form class="mt-4" method="POST" action="<?= base_url() ?>updated">
            <div class="mb-4">
                <label for="email" class="form-label text-secondary"><b>Email</b></label>
                <input type="email" class="form-control" id="email" value="<?= $profile['email'] ?>" readonly>
            </div>
            <div class="mb-4">
                <label for="v" class="form-label text-secondary"><b>Nama Depan</b></label>
                <input type="text" class="form-control" name="first_name" id="namadepan" value="<?= $profile['first_name']; ?>" <?= ($isUpdated == false) ? 'readonly' : '' ?>>
            </div>
            <div class="mb-4">
                <label for="namabelakang" class="form-label text-secondary"><b>Nama Belakang</b></label>
                <input type="text" class="form-control" name="last_name" id="namabelakang" value="<?= $profile['last_name']; ?>" <?= ($isUpdated == false) ? 'readonly' : '' ?>>

            </div>

            <div class="mb-4">
                <input type="hidden" name="token" value="<?= session()->get('token') ?>">
                <?php if ($isUpdated == true) : ?>
                    <button type="submit" class="btn btn-block btn-danger btn-lg gap-2" style="width: 100%;  background:red;"><b>Simpan</b></button>
                <?php else : ?>
                    <a href="<?= base_url() ?>updated/<?= session()->get('token') ?>" class="btn btn-block btn-danger" style="width: 100%; height:50px; background:red; color:white; border:0px;"><b>Edit Profile</b></a>
                    <button type="button" onclick="logout()" class="btn" style="width: 100%; height:50px; color:red; margin-top:25px;   border-color:red;"><b>Logout</b></a>
                    <?php endif ?>

                    <hr>
                    <?php if (session()->getFlashData('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif ?>
                    <?php if (session()->getFlashData('success')) : ?>
                        <div class="alert alert-primary"><?= session()->getFlashdata('success') ?></div>
                    <?php endif ?>
            </div>
        </form>
    </div>
    <script>
        function logout() {
            Swal.fire({
                title: 'Yakin logout?',
                text: "Anda akan keluar dari sistem",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `<?= base_url() ?>/logout`
                }
            })
        }
    </script>
</body>

</html>