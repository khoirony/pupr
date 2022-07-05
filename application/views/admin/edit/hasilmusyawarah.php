<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-handshake"></i> Edit Hasil Musyawarah</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <select class="custom-select rounded-pill px-3" id="id_bidang_tanah" name="id_bidang_tanah">
                        <option value="<?= $hamus['id_bidang_tanah']; ?>"><?= $hamus['id_bidang_tanah']; ?></option>
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
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <input type="text" class="form-control form-control-user" id="id_lokasi" name="id_lokasi" value="<?= $hamus['id_lokasi'];?>">
                    <?= form_error('id_lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama yang Hadir</p>
                    <input type="text" class="form-control form-control-user" id="nama_hadir" name="nama_hadir" value="<?= $hamus['nama_hadir'];?>">
                    <?= form_error('nama_hadir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jenis Ganti Rugi</p>
                    <input type="text" class="form-control form-control-user" id="jenis_ganti_rugi" name="jenis_ganti_rugi" value="<?= $hamus['jenis_ganti_rugi'];?>">
                    <?= form_error('jenis_ganti_rugi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Hasil Musyawarah</p>
                    <input type="text" class="form-control form-control-user" id="hasil_musyawarah" name="hasil_musyawarah" value="<?= $hamus['hasil_musyawarah'];?>">
                    <?= form_error('hasil_musyawarah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <label class="form-label ml-3">Upload Image</label>
                    <input type="file" id="image" name="image" class="form-control rounded-pill">
                </div>

                <div class="form-group text-start">
                    <label class="form-label ml-3">Upload Berkas</label>
                    <input type="file" id="berkas" name="berkas" class="form-control rounded-pill">
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
