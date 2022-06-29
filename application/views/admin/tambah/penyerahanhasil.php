<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Penyerahan Hasil</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <select class="custom-select rounded-pill px-3" id="id_bidang_tanah" name="id_bidang_tanah">
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
                    <p class="ms-3 mb-0">Nama Penggarap</p>
                    <select class="custom-select rounded-pill px-3" id="nama_penggarap" name="nama_penggarap">
                        <?php
                        foreach ($pelaksana as $pel) {
                        ?>
                        <option value="<?= $pel['nama_pelaksana']; ?>"><?= $pel['nama_pelaksana']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('nama_penggarap', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Kwitansi</p>
                    <select class="custom-select rounded-pill px-3" id="nomor_kwitansi" name="nomor_kwitansi">
                        <?php
                        foreach ($pelepasan_hak as $pelhak) {
                        ?>
                        <option value="<?= $pelhak['nomor_kwitansi']; ?>"><?= $pelhak['nomor_kwitansi']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('nomor_kwitansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <select class="custom-select rounded-pill px-3" id="id_lokasi" name="id_lokasi">
                        <?php
                        foreach ($lokasi as $lok) {
                        ?>
                        <option value="<?= $lok['desa_kelurahan']; ?>"><?= $lok['desa_kelurahan']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('id_lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
					<label class="form-label ml-3">Upload Foto</label>
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
