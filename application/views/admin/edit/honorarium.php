<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-running"></i> Tambah Honorarium Pelaksana</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Pelaksana</p>
                    <select class="custom-select rounded-pill px-3" id="nama_pelaksana" name="nama_pelaksana">
                        <option value="<?= $honorarium['nama_pelaksana']; ?>"><?= $honorarium['nama_pelaksana']; ?></option>
                        <?php
                        foreach ($pelaksana as $pel) {
                        ?>
                        <option value="<?= $pel['nama_pelaksana']; ?>"><?= $pel['nama_pelaksana']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('nama_pelaksana', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jabatan Pelaksana</p>
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" value="<?= $honorarium['jabatan']; ?>">
                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Uang Harian</p>
                    <input type="text" class="form-control form-control-user" id="uang_harian" name="uang_harian" value="<?= $honorarium['uang_harian']; ?>">
                    <?= form_error('uang_harian', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Pajak</p>
                    <input type="text" class="form-control form-control-user" id="pajak" name="pajak" value="<?= $honorarium['pajak']; ?>">
                    <?= form_error('pajak', '<small class="text-danger pl-3">', '</small>'); ?>
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
