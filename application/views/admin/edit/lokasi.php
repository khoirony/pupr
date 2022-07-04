<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Edit Lokasi</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Penlok</p>
                    <select class="custom-select rounded-pill px-3" id="nomor_penlok" name="nomor_penlok">
                        <option value="<?= $lokasi['id_penlok'];?>"><?= $lokasi['id_penlok'];?></option>
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
                    <p class="ms-3 mb-0">Kabupaten/Kota</p>
                    <select class="custom-select rounded-pill px-3" id="kabupaten_kota" name="kabupaten_kota">
                        <option value="<?= $lokasi['kabupaten_kota'];?>"><?= $lokasi['kabupaten_kota'];?></option>
                        <option value="Banjarmasin">Banjarmasin</option>
                        <option value="Kab. Balangan">Kab. Balangan</option>
                        <option value="Kab. Banjar">Kab. Banjar</option>
                        <option value="Kab. Barito Kuala">Kab. Barito Kuala</option>
                        <option value="Kab. Hulu Sungai Selatan">Kab. Hulu Sungai Selatan</option>
                        <option value="Kab. Hulu Sungai Tengah">Kab. Hulu Sungai Tengah</option>
                        <option value="Kab. Hulu Sungai Utara">Kab. Hulu Sungai Utara</option>
                        <option value="Kab. Kotabaru">Kab. Kotabaru</option>
                        <option value="Kab. Tabalog">Kab. Tabalog</option>
                        <option value="Kab. Tanah Bumbu">Kab. Tanah Bumbu</option>
                        <option value="Kab. Tanah Laut">Kab. Tanah Laut</option>
                        <option value="Kab. Tapin">Kab. Tapin</option>
                        <option value="Kota Banjarbaru">Kota Banjarbaru</option>
                    </select>
                    <?= form_error('kabupaten_kota', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Kecamatan</p>
                    <input type="text" class="form-control form-control-user" id="kecamatan" name="kecamatan" value="<?= $lokasi['kecamatan'];?>">
                    <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <input type="text" class="form-control form-control-user" id="desa_kelurahan" name="desa_kelurahan" value="<?= $lokasi['desa_kelurahan'];?>">
                    <?= form_error('desa_kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Alamat</p>
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $lokasi['alamat'];?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
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
