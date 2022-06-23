<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Pihak Berhak</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <input type="text" class="form-control form-control-user" id="id_bidang_tanah" name="id_bidang_tanah">
                    <?= form_error('id_bidang_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">NIK</p>
                    <input type="text" class="form-control form-control-user" id="nik" name="nik">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama</p>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Lahir</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir">
                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Alamat</p>
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Kepemilikan</p>
                    <input type="text" class="form-control form-control-user" id="kepemilikan" name="kepemilikan">
                    <?= form_error('kepemilikan', '<small class="text-danger pl-3">', '</small>'); ?>
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
