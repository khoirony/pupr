<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> <?= $title; ?></h1>

    <div class="row text-white pt-3 pb-5 justify-content-between">
        <div class="col-3">
            <div class="card-body rounded bg-secondary">
                <div class="card-body-icon">
                    <i class="fas fa-map-pin mr-2"></i>
                </div>
                <h5 class="card-title">Data Bidang Tanah</h5>
                <div class="display-4">
                    <?= $hitung_bidtan;?>
                </div>
                <a href="<?= base_url('Admin/verif'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

        <div class="col-3">
            <div class="card-body rounded bg-secondary">
                <div class="card-body-icon">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                </div>
                <h5 class="card-title">Data Lokasi</h5>
                <div class="display-4">
                    <?= $hitung_lokasi;?>
                </div>
                <a href="<?= base_url('Admin/verif'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

        <div class="col-3">
            <div class="card-body rounded bg-secondary">
                <div class="card-body-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <h5 class="card-title">Data Penilaian Tanah</h5>
                <div class="display-4">
                    <?= $hitung_pentan;?>
                </div>
                <a href="<?= base_url('Admin/verif'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

        <div class="col-3">
            <div class="card-body rounded bg-secondary">
                <div class="card-body-icon">
                    <i class="fas fa-calendar-check mr-2"></i>
                </div>
                <h5 class="card-title">Data Penyerahan Hasil</h5>
                <div class="display-4">
                    <?= $hitung_penhas;?>
                </div>
                <a href="<?= base_url('Admin/pengumuman'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->