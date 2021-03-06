<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Edit Alas Hak</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <select class="custom-select rounded-pill px-3" id="id_bidang_tanah" name="id_bidang_tanah">
                        <option value="<?= $alha['id_bidang_tanah'];?>"><?= $alha['id_bidang_tanah'];?></option>
                        <?php
                        foreach ($bidang_tanah as $bidtan) {
                        ?>
                        <option value="<?= $bidtan['id_bidang_tanah']; ?>"><?= $bidtan['id_bidang_tanah']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('id_bidang_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jenis Alas Hak</p>
                    <input type="text" class="form-control form-control-user" id="jenis_alas_hak" name="jenis_alas_hak" value="<?= $alha['jenis_alas_hak'];?>">
                    <?= form_error('jenis_alas_hak', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Luas Alas Hak(m2)</p>
                    <input type="text" class="form-control form-control-user" id="luas_alas_hak" name="luas_alas_hak" value="<?= $alha['luas_alas_hak'];?>">
                    <?= form_error('luas_alas_hak', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jenis Benda</p>
                    <input type="text" class="form-control form-control-user" id="jenis_benda" name="jenis_benda" value="<?= $alha['jenis_benda'];?>">
                    <?= form_error('jenis_benda', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Keterangan</p>
                    <input type="text" class="form-control form-control-user" id="keterangan" name="keterangan" value="<?= $alha['keterangan'];?>">
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Satuan/Jumlah</p>
                    <input type="text" class="form-control form-control-user" id="satuan" name="satuan" value="<?= $alha['satuan'];?>">
                    <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Pemilik</p>
                    <input type="text" class="form-control form-control-user" id="pemilik" name="pemilik" value="<?= $alha['pemilik'];?>">
                    <?= form_error('pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
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
