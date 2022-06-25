<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Edit Penilaian Tanah</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <select class="custom-select rounded-pill px-3" id="id_bidang_tanah" name="id_bidang_tanah">
                        <option value="<?= $pentan['id_bidang_tanah'];?>"><?= $pentan['id_bidang_tanah'];?></option>
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
                    <p class="ms-3 mb-0">Penilai tanah</p>
                    <input type="text" class="form-control form-control-user" id="penilai_tanah" name="penilai_tanah" value="<?= $pentan['penilai_tanah'];?>">
                    <?= form_error('penilai_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Satgas</p>
                    <input type="text" class="form-control form-control-user" id="id_pelaksana" name="id_pelaksana" value="<?= $pentan['id_pelaksana'];?>">
                    <?= form_error('id_pelaksana', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nilai Tanah</p>
                    <input type="text" class="form-control form-control-user" id="nilai_tanah" name="nilai_tanah" value="<?= $pentan['nilai_tanah'];?>">
                    <?= form_error('nilai_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nilai Bangunan</p>
                    <input type="text" class="form-control form-control-user" id="nilai_bangunan" name="nilai_bangunan" value="<?= $pentan['nilai_bangunan'];?>">
                    <?= form_error('nilai_bangunan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nilai Benda Lain</p>
                    <input type="text" class="form-control form-control-user" id="nilai_benda_lain" name="nilai_benda_lain" value="<?= $pentan['nilai_benda_lain'];?>">
                    <?= form_error('nilai_benda_lain', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nilai Kerugian</p>
                    <input type="text" class="form-control form-control-user" id="nilai_kerugian" name="nilai_kerugian" value="<?= $pentan['nilai_kerugian'];?>">
                    <?= form_error('nilai_kerugian', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Total Nilai Ganti Rugi</p>
                    <input type="text" class="form-control form-control-user" id="total_nilai_ganti_rugi" name="total_nilai_ganti_rugi" value="<?= $pentan['total_nilai_ganti_rugi'];?>">
                    <?= form_error('total_nilai_ganti_rugi', '<small class="text-danger pl-3">', '</small>'); ?>
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
