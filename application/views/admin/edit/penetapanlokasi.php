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
                    <input type="text" class="form-control form-control-user" id="nomor_penlok" name="nomor_penlok" value="<?= $penlok['id_penlok'];?>">
                    <?= form_error('nomor_penlok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Kategori Pembangunan</p>
                    <input type="text" class="form-control form-control-user" id="kategori_pembangunan" name="kategori_pembangunan" value="<?= $penlok['kategori_pembangunan'];?>">
                    <?= form_error('kategori_pembangunan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Rencana Pembangunan</p>
                    <input type="text" class="form-control form-control-user" id="rencana_pembangunan" name="rencana_pembangunan" value="<?= $penlok['rencana_pembangunan'];?>">
                    <?= form_error('rencana_pembangunan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Sumber Anggaran</p>
                    <select class="custom-select rounded-pill px-3" id="sumber_anggaran" name="sumber_anggaran">
                        <option value="<?= $penlok['sumber_anggaran'];?>"><?= $penlok['sumber_anggaran'];?></option>
                        <option value="APBN">APBN</option>
                        <option value="APBD">APBD</option>
                    </select>
                    <?= form_error('sumber_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nilai Anggaran</p>
                    <input type="text" class="form-control form-control-user" id="nilai_anggaran" name="nilai_anggaran" value="<?= $penlok['nilai_anggaran'];?>">
                    <?= form_error('nilai_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Permohonan</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_permohonan" name="tanggal_permohonan" value="<?= $penlok['tanggal_permohonan'];?>">
                    <?= form_error('tanggal_permohonan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Pemohon</p>
                    <input type="text" class="form-control form-control-user" id="nama_pemohon" name="nama_pemohon" value="<?= $penlok['nama_pemohon'];?>">
                    <?= form_error('nama_pemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jabatan Pemohon</p>
                    <input type="text" class="form-control form-control-user" id="jabatan_pemohon" name="jabatan_pemohon" value="<?= $penlok['jabatan_pemohon'];?>">
                    <?= form_error('jabatan_pemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jangka Waktu <small>(tahun)</small></p>
                    <input type="number" class="form-control form-control-user" id="jangka_waktu" name="jangka_waktu" value="<?= $penlok['jangka_waktu'];?>">
                    <?= form_error('jangka_waktu', '<small class="text-danger pl-3">', '</small>'); ?>
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
