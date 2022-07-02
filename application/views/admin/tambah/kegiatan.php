<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-briefcase"></i> Tambah Kegiatan</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Penlok</p>
                    <select class="custom-select rounded-pill px-3" id="nomor_penlok" name="nomor_penlok">
                        <?php
                        foreach ($penetapan_lokasi as $penlok) {
                        ?>
                        <option value="<?= $penlok['id_penlok']; ?>"><?= $penlok['id_penlok']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('nomor_penlok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Kegiatan</p>
                    <input type="text" class="form-control form-control-user" id="nomor_kegiatan" name="nomor_kegiatan">
                    <?= form_error('nomor_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Rencana Pembangunan</p>
                    <input type="text" class="form-control form-control-user" id="rencana_penggunaan" name="rencana_penggunaan">
                    <?= form_error('rencana_penggunaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Kegiatan</p>
                    <input type="text" class="form-control form-control-user" id="nama_kegiatan" name="nama_kegiatan">
                    <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <input type="text" class="form-control form-control-user" id="desa_kelurahan" name="desa_kelurahan">
                    <?= form_error('desa_kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Kecamatan</p>
                    <input type="text" class="form-control form-control-user" id="kecamatan" name="kecamatan">
                    <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Kabupaten/Kota</p>
                    <input type="text" class="form-control form-control-user" id="kabupaten_kota" name="kabupaten_kota">
                    <?= form_error('kabupaten_kota', '<small class="text-danger pl-3">', '</small>'); ?>
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
