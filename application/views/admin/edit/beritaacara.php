<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-newspaper"></i> Tambah Berita Acara</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Berita Acara</p>
                    <input type="text" class="form-control form-control-user" id="nomor_berita" name="nomor_berita" value="<?= $berac['nomor_berita'];?>">
                    <?= form_error('nomor_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jenis Berita Acara</p>
                    <input type="text" class="form-control form-control-user" id="jenis_berita" name="jenis_berita" value="<?= $berac['jenis_berita'];?>">
                    <?= form_error('jenis_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_berita" name="tanggal_berita" value="<?= $berac['tanggal_berita'];?>">
                    <?= form_error('tanggal_berita', '<small class="text-danger pl-3">', '</small>'); ?>
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
