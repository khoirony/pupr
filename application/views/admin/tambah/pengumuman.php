<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-bullhorn"></i> Tambah Pengumuman</h1>
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
                    <p class="ms-3 mb-0">Nomor Pengumuman</p>
                    <input type="text" class="form-control form-control-user" id="nomor_pengumuman" name="nomor_pengumuman">
                    <?= form_error('nomor_pengumuman', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Satgas</p>
                    <input type="text" class="form-control form-control-user" id="id_pelaksana" name="id_pelaksana">
                    <?= form_error('id_pelaksana', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Mulai</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_pengumuman" name="tanggal_pengumuman">
                    <?= form_error('tanggal_pengumuman', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Selesai</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_selesai" name="tanggal_selesai">
                    <?= form_error('tanggal_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Berita Acara</p>
                    <select class="custom-select rounded-pill px-3" id="id_berita" name="id_berita">
                        <?php
                        foreach ($berita_acara as $berac) {
                        ?>
                        <option value="<?= $berac['nomor_berita']; ?>"><?= $berac['nomor_berita']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('id_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
					<label class="form-label ml-3">Upload SK Pengumuman</label>
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
