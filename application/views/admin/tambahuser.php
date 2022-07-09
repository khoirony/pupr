<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah User</h1>
    <br>

    <div class="row">

        <div class="col-md-6 text-center">
            <?= $this->session->flashdata('msg');
                                if (isset($_SESSION['msg'])) {
                                    unset($_SESSION['msg']);
                                } ?>
            <form class="user" method="POST" action="">
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

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Role User</p>
                    <select class="custom-select rounded-pill px-3" id="role" name="role">
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                        <option value="3">Pengunjung</option>
                    </select>
                    <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
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
