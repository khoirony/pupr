<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Edit Pelaksana</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">NIP/NRP</p>
                    <input type="text" class="form-control form-control-user" id="nip" name="nip" value="<?= $pelaksana['id_pegawai'];?>">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Lengkap</p>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $pelaksana['nama_pelaksana'];?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Satgas</p>
                    <input type="text" class="form-control form-control-user" id="satgas" name="satgas" value="<?= $pelaksana['satgas'];?>">
                    <?= form_error('satgas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Kegiatan</p>
                    <input type="text" class="form-control form-control-user" id="kegiatan" name="kegiatan" value="<?= $pelaksana['id_kegiatan'];?>">
                    <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
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
