<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-compass"></i> Tambah Penetapan Lokasi</h1>
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
                    <p class="ms-3 mb-0">Kategori Pembangunan</p>
                    <input type="text" class="form-control form-control-user" id="kategori_pembangunan" name="kategori_pembangunan">
                    <?= form_error('kategori_pembangunan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Rencana Pembangunan</p>
                    <input type="text" class="form-control form-control-user" id="rencana_pembangunan" name="rencana_pembangunan">
                    <?= form_error('rencana_pembangunan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Sumber Anggaran</p>
                    <input type="text" class="form-control form-control-user" id="sumber_anggaran" name="sumber_anggaran">
                    <?= form_error('sumber_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nilai Anggaran</p>
                    <input type="text" class="form-control form-control-user" id="nilai_anggaran" name="nilai_anggaran">
                    <?= form_error('nilai_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Permohonan</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_permohonan" name="tanggal_permohonan">
                    <?= form_error('tanggal_permohonan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Pemohon</p>
                    <input type="text" class="form-control form-control-user" id="nama_pemohon" name="nama_pemohon">
                    <?= form_error('nama_pemohon', '<small class="text-danger pl-3">', '</small>'); ?>
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
