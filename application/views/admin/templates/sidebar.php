        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

        	<!-- Sidebar - Brand -->
        	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        		<div class="sidebar-brand-text mx-3">PENGADAAN TANAH PUPR</div>
        	</a>

        	<!-- Divider -->
        	<hr class="sidebar-divider">


        	<li class="nav-item <?php if($active == 'dashboard'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('admin') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
        			<span>Dashboard</a>
        	</li>

			<li class="nav-item <?php if($active == 'perencanaan'){ echo'active';}?>">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapsePerencanaan"
                    aria-expanded="true" aria-controls="collapsePerencanaan">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Perencanaan</span>
                </a>
                <div id="collapsePerencanaan" class="collapse mt-3" aria-labelledby="headingPerencanaan"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/penetapanlokasi') ?>">Penetapan Lokasi</a>
                        <a class="collapse-item" href="<?= base_url('admin/lokasi') ?>">Lokasi</a>
                        <a class="collapse-item" href="<?= base_url('admin/pelaksana') ?>">Pelaksana</a>
                        <a class="collapse-item" href="<?= base_url('admin/kegiatan') ?>">Kegiatan</a>
                    </div>
                </div>
            </li>

			<li class="nav-item <?php if($active == 'persiapan'){ echo'active';}?>">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapsePersiapan"
                    aria-expanded="true" aria-controls="collapsePersiapan">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Persiapan</span>
                </a>
                <div id="collapsePersiapan" class="collapse mt-3" aria-labelledby="headingPersiapan"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/bidangtanah') ?>">Bidang Tanah</a>
                        <a class="collapse-item" href="<?= base_url('admin/alashak') ?>">Alas Hak</a>
                        <a class="collapse-item" href="<?= base_url('admin/pihakberhak') ?>">Pihak yang Berhak</a>
                    </div>
                </div>
            </li>

			<li class="nav-item <?php if($active == 'hasil'){ echo'active';}?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHasil"
                    aria-expanded="true" aria-controls="collapseHasil">
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Penyerahan Hasil</span>
                </a>
                <div id="collapseHasil" class="collapse" aria-labelledby="headingHasil"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/pengumuman') ?>">Pengumuman</a>
                        <a class="collapse-item" href="<?= base_url('admin/beritaacara') ?>">Berita Acara</a>
                        <a class="collapse-item" href="<?= base_url('admin/penilaiantanah') ?>">Penilaian Tanah</a>
						<a class="collapse-item" href="<?= base_url('admin/hasilmusyawarah') ?>">Hasil Musyawarah</a>
						<a class="collapse-item" href="<?= base_url('admin/pelepasanhak') ?>">Pelepasan Hak</a>
						<a class="collapse-item" href="<?= base_url('admin/penyerahanhasil') ?>">Penyerahan Hasil</a>
                    </div>
                </div>
            </li>

            <?php if($user['role'] == 1){?>
        	<div class="sidebar-heading mt-3">
        		Administrasi
        	</div>
			<li class="nav-item <?php if($active == 'pegawai'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('admin/pegawai') ?>">
					<i class="fas fa-fw fa-ruler-combined"></i>
        			<span>Pegawai</a>
        	</li>
			<li class="nav-item <?php if($active == 'tambah'){ echo'active';}?>">
        		<a class="nav-link pb-0" href="<?= base_url('admin/tambahuser') ?>">
				<i class="fas fa-fw fa-map-marker-alt"></i>
        			<span>Tambah User</a>
        	</li>
            <?php
                }
            ?>
			<hr class="sidebar-divider mt-3">

        	<!-- Sidebar Toggler (Sidebar) -->
        	<div class="text-center d-none d-md-inline">
        		<button class="rounded-circle border-0" id="sidebarToggle"></button>
        	</div>

        </ul>
        <!-- End of Sidebar -->
