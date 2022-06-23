<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Pengumuman</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Pengumuman</p>
                    <input type="text" class="form-control form-control-user" id="nomor_pengumuman" name="nomor_pengumuman" value="<?= $pengumuman['nomor_pengumuman'];?>">
                    <?= form_error('nomor_pengumuman', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <input type="text" class="form-control form-control-user" id="id_bidang_tanah" name="id_bidang_tanah" value="<?= $pengumuman['id_bidang_tanah'];?>">
                    <?= form_error('id_bidang_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Satgas</p>
                    <input type="text" class="form-control form-control-user" id="id_pelaksana" name="id_pelaksana" value="<?= $pengumuman['id_pelaksana'];?>">
                    <?= form_error('id_pelaksana', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Mulai</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_pengumuman" name="tanggal_pengumuman" value="<?= $pengumuman['tanggal_pengumuman'];?>">
                    <?= form_error('tanggal_pengumuman', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tanggal Selesai</p>
                    <input type="date" class="form-control form-control-user" id="tanggal_selesai" name="tanggal_selesai" value="<?= $pengumuman['selesai_pengumuman'];?>">
                    <?= form_error('tanggal_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Berita Acara</p>
                    <input type="text" class="form-control form-control-user" id="id_berita" name="id_berita" value="<?= $pengumuman['id_berita'];?>">
                    <?= form_error('id_berita', '<small class="text-danger pl-3">', '</small>'); ?>
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
