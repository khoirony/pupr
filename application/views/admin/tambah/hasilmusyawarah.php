<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Lokasi</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <input type="text" class="form-control form-control-user" id="id_bidang_tanah" name="id_bidang_tanah">
                    <?= form_error('id_bidang_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <input type="text" class="form-control form-control-user" id="id_lokasi" name="id_lokasi">
                    <?= form_error('id_lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama Penggarap</p>
                    <input type="text" class="form-control form-control-user" id="nama_penggarap" name="nama_penggarap">
                    <?= form_error('nama_penggarap', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nama yang Hadir</p>
                    <input type="text" class="form-control form-control-user" id="nama_hadir" name="nama_hadir">
                    <?= form_error('nama_hadir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Jenis Ganti Rugi</p>
                    <input type="text" class="form-control form-control-user" id="jenis_ganti_rugi" name="jenis_ganti_rugi">
                    <?= form_error('jenis_ganti_rugi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Hasil Musyawarah</p>
                    <input type="text" class="form-control form-control-user" id="hasil_musyawarah" name="hasil_musyawarah">
                    <?= form_error('hasil_musyawarah', '<small class="text-danger pl-3">', '</small>'); ?>
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
