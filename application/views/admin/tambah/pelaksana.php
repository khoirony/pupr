<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-running"></i> Tambah Pelaksana</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">NIP/NRP</p>
                    <input type="text" class="form-control form-control-user" id="nip" name="nip">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Lengkap</p>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Golongan</p>
                    <input type="text" class="form-control form-control-user" id="golongan" name="golongan">
                    <?= form_error('golongan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Satgas</p>
                    <select class="custom-select rounded-pill px-3" id="satgas" name="satgas">
                        <option value="SATGAS A">SATGAS A</option>
                        <option value="SATGAS B">SATGAS B</option>
                        <option value="SATGAS C">SATGAS C</option>
                        <option value="SATGAS D">SATGAS D</option>
                        <option value="SATGAS E">SATGAS E</option>
                        <option value="SATGAS F">SATGAS F</option>
                        <option value="SATGAS G">SATGAS G</option>
                    </select>
                    <?= form_error('satgas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Kegiatan</p>
                    <select class="custom-select rounded-pill px-3" id="kegiatan" name="kegiatan">
                        <?php
                        foreach ($kegiatan as $keg) {
                        ?>
                        <option value="<?= $keg['nama_kegiatan']; ?>"><?= $keg['nama_kegiatan']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
					<label class="form-label ml-3">Upload SK Satgas</label>
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
