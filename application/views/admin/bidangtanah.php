<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caribidtan'); ?>">
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
						<a class="btn btn-success rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/batalbidtan'); ?>">Disetujui</a>
					<?php
					elseif($ttd['status'] == 0):
					?>
						<a class="btn btn-danger rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/setujubidtan'); ?>">Belum</a>
					<?php 
					endif; ?>
				<?php
				endif;
				?>
				<a class="btn btn-warning rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/laporanbidtan'); ?>">Laporan Bidtan</a>
				<?php if($user['role'] != 1){?>
                	<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahbidtan'); ?>">Tambah Bidang Tanah</a>
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
					<th scope="col">Nomor Penlok</th>
					<th scope="col">Luas</th>
					<th scope="col">Desa/Kelurahan</th>
					<th scope="col">Pemilik/Penggarap</th>
					<th scope="col">Pelepasan Bidang</th>
                    <th scope="col">Tipe Aset</th>
					<th scope="col">Perkiraan Dampak</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($bidang_tanah as $bidtan) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $bidtan['id_bidang_tanah']; ?></td>
					<td><?= $bidtan['id_penlok']; ?></td>
					<td><?= $bidtan['luas']; ?></td>
					<td><?= $bidtan['id_lokasi']; ?></td>
					<td><?= $bidtan['nama_penggarap']; ?></td>
					<td><?= $bidtan['pelepasan_bidang']; ?></td>
					<td><?= $bidtan['tipe_aset']; ?></td>
                    <td><?= $bidtan['perkiraan_dampak']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:130px;';}else{echo'style="width:130px;';} ?>">
						<?php 
						if($user['role'] == 1):
							if($bidtan['status'] == 1):
							?>
								<a class="btn btn-sm btn-success" href="<?= base_url('Admin/bataldetailbidtan/' . $bidtan['id_bidang_tanah']); ?>"><i class="fas fa-check"></i></a>
							<?php
							elseif($bidtan['status'] == 0):
							?>
								<a class="btn btn-sm btn-danger" href="<?= base_url('Admin/setujudetailbidtan/' . $bidtan['id_bidang_tanah']); ?>"><i class="fas fa-times"></i></a>
							<?php 
							endif; ?>
						<?php
						endif;
						?>
						<?php if($bidtan['gambar'] != null): ?>
							<a href="#id<?= $bidtan['id_bidang_tanah']; ?>" data-toggle="modal" class="btn btn-sm btn-info me-1"><i class="fas fa-image"></i></button> 
						<?php endif; ?>
						<a href="<?= base_url('Admin/cetakbidtan/' . $bidtan['id_bidang_tanah']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1):?>
                        <a href="<?= base_url('Admin/editbidtan/' . $bidtan['id_bidang_tanah']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapusbidtan/' . $bidtan['id_bidang_tanah']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
						<?php
							endif;
						?>
                    </td>
				</tr>

				<!-- Modal -->
				<div class="modal fade" id="id<?= $bidtan['id_bidang_tanah'];  ?>" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<img src="<?= base_url('assets/img/' . $bidtan['gambar']); ?>" alt="gambar" class="img-thumbnail">
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