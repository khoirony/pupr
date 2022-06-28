<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Pegawai</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">NIP</p>
                    <input type="text" class="form-control form-control-user" id="nip" name="nip">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Pegawai</p>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Pangkat</p>
                    <input type="text" class="form-control form-control-user" id="pangkat" name="pangkat">
                    <?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jabatan</p>
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan">
                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Username</p>
                    <input type="text" class="form-control form-control-user" id="username" name="username">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Password</p>
                    <input type="text" class="form-control form-control-user" id="password" name="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-user px-5 mt-3">
                        Simpan
                    </button>
                </div>
            </form>
            <br>
        </div>

    </div>

</div>
