<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-handshake"></i></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/carihamus'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor bidtan..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<?php 
				if($user['role'] == 1):
					if($ttd['status'] == 1):
					?>
						<a class="btn btn-success rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/batalhamus'); ?>">Disetujui</a>
					<?php
					elseif($ttd['status'] == 0):
					?>
						<a class="btn btn-danger rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/setujuhamus'); ?>">Belum</a>
					<?php 
					endif; ?>
				<?php
				endif;
				?>
				<a class="btn btn-warning rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/laporanhamus'); ?>">Laporan Hamus</a>
				<?php if($user['role'] != 1){?>
                	<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahhamus'); ?>">Tambah Hasil Musyawarah</a>
				<?php
					}
				?>
			</div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white text-center">
					<th scope="col">No</th>
					<th scope="col">Nomor Bidang Tanah</th>
					<th scope="col">Desa/Kelurahan</th>
					<th scope="col">Nama Penggarap</th>
					<th scope="col">Nama yg Hadir</th>
					<th scope="col">Jenis Ganti Rugi</th>
					<th scope="col">Hasil Musyawarah</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($hasil_musyawarah as $hamus) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $hamus['id_bidang_tanah']; ?></td>
					<td><?= $hamus['id_lokasi']; ?></td>
					<td><?= $hamus['nama_penggarap']; ?></td>
					<td><?= $hamus['nama_hadir']; ?></td>
					<td><?= $hamus['jenis_ganti_rugi']; ?></td>
					<td><?= $hamus['hasil_musyawarah']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:130px;';}else{echo'style="width:160px;';} ?>">
						<?php 
						if($user['role'] == 1):
							if($hamus['status'] == 1):
							?>
								<a class="btn btn-sm btn-success" href="<?= base_url('Admin/bataldetailhamus/' . $hamus['id_musyawarah']); ?>"><i class="fas fa-check"></i></a>
							<?php
							elseif($hamus['status'] == 0):
							?>
								<a class="btn btn-sm btn-danger" href="<?= base_url('Admin/setujudetailhamus/' . $hamus['id_musyawarah']); ?>"><i class="fas fa-times"></i></a>
							<?php 
							endif; ?>
						<?php
						endif;
						?>
						
						<?php if($hamus['berkas'] != null): ?>
							<a href="<?= base_url('assets/berkas/' . $hamus['berkas']); ?>" class="btn btn-sm btn-dark"><i class="fas fa-file-pdf"></i></a>
						<?php endif; ?>
						<?php if($hamus['gambar'] != null): ?>
							<a href="#id<?= $hamus['id_musyawarah']; ?>" data-toggle="modal" class="btn btn-sm btn-info me-1"><i class="fas fa-image"></i></button> 
						<?php endif; ?>
						
						<a href="<?= base_url('Admin/cetakhamus/' . $hamus['id_musyawarah']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1):?>
                        <a href="<?= base_url('Admin/edithamus/' . $hamus['id_musyawarah']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapushamus/' . $hamus['id_musyawarah']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
						<?php
							endif;
						?>
                    </td>
				</tr>

				<!-- Modal -->
				<div class="modal fade" id="id<?= $hamus['id_musyawarah'];  ?>" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<img src="<?= base_url('assets/img/' . $hamus['gambar']); ?>" alt="gambar" class="img-thumbnail">
							</div>
						</div>
					</div>
				</div>

				<?php
				}
				?>
			</tbody>
		</table>

	
	

</div>
<!-- /.container-fluid -->