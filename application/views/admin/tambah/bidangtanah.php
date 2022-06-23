<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Kegiatan</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Penlok</p>
                    <input type="text" class="form-control form-control-user" id="nomor_penlok" name="nomor_penlok">
                    <?= form_error('nomor_penlok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <input type="text" class="form-control form-control-user" id="id_bidang_tanah" name="id_bidang_tanah">
                    <?= form_error('id_bidang_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Pemilik/Penggarap</p>
                    <input type="text" class="form-control form-control-user" id="nama_penggarap" name="nama_penggarap">
                    <?= form_error('nama_penggarap', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tipe Aset</p>
                    <input type="text" class="form-control form-control-user" id="tipe_aset" name="tipe_aset">
                    <?= form_error('tipe_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Luas</p>
                    <input type="text" class="form-control form-control-user" id="luas" name="luas">
                    <?= form_error('luas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <input type="text" class="form-control form-control-user" id="id_lokasi" name="id_lokasi">
                    <?= form_error('id_lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Pelepasan Bidang</p>
                    <input type="text" class="form-control form-control-user" id="pelepasan_bidang" name="pelepasan_bidang">
                    <?= form_error('pelepasan_bidang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Perkiraan Dampak</p>
                    <input type="text" class="form-control form-control-user" id="perkiraan_dampak" name="perkiraan_dampak">
                    <?= form_error('perkiraan_dampak', '<small class="text-danger pl-3">', '</small>'); ?>
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
