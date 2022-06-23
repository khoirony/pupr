<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Penyerahan Hasil</h1>
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
                    <p class="ms-3 mb-0">Nama Penggarap</p>
                    <input type="text" class="form-control form-control-user" id="nama_penggarap" name="nama_penggarap">
                    <?= form_error('nama_penggarap', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Kwitansi</p>
                    <input type="text" class="form-control form-control-user" id="nomor_kwitansi" name="nomor_kwitansi">
                    <?= form_error('nomor_kwitansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Kwitansi</p>
                    <input type="date" class="form-control form-control-user" id="desa_kelurahan" name="desa_kelurahan">
                    <?= form_error('desa_kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Pembayaran</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_kwitansi" name="tanggal_kwitansi">
                    <?= form_error('tanggal_kwitansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Pembayaran</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_pembayaran" name="tanggal_pembayaran">
                    <?= form_error('tanggal_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <input type="text" class="form-control form-control-user" id="id_lokasi" name="id_lokasi">
                    <?= form_error('id_lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
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
