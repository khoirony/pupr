<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-chart-pie"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripenhas'); ?>">
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
						<a class="btn btn-success rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/batalpenhas'); ?>">Disetujui</a>
					<?php
					elseif($ttd['status'] == 0):
					?>
						<a class="btn btn-danger rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/setujupenhas'); ?>">Belum</a>
					<?php 
					endif; ?>
				<?php
				endif;
				?>
				<a class="btn btn-warning rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/laporanpenhas'); ?>">Laporan Penhas</a>
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpenhas'); ?>">Tambah Penyerahan Hasil</a>
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
					<th scope="col">Nama Penggarap</th>
					<th scope="col">Desa/Kelurahan</th>
					<th scope="col">Nomor Kwitansi</th>
					<th scope="col">Tgl Kwitansi</th>
					<th scope="col">Tgl Pembayaran</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($penyerahan_hasil as $peha) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $peha['id_bidang_tanah']; ?></td>
					<td><?= $peha['nama_penggarap']; ?></td>
					<td><?= $peha['id_lokasi']; ?></td>
					<td><?= $peha['id_pelepasan']; ?></td>
					<td><?= $peha['tgl_kwitansi']; ?></td>
					<td><?= $peha['tgl_pembayaran']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:170px;';}else{echo'style="width:130px;';} ?>">
						<?php 
						if($user['role'] == 1):
							if($peha['status'] == 1):
							?>
								<a class="btn btn-sm btn-success" href="<?= base_url('Admin/bataldetailpenhas/' . $peha['id_penyerahan']); ?>"><i class="fas fa-check"></i></a>
							<?php
							elseif($peha['status'] == 0):
							?>
								<a class="btn btn-sm btn-danger" href="<?= base_url('Admin/setujudetailpenhas/' . $peha['id_penyerahan']); ?>"><i class="fas fa-times"></i></a>
							<?php 
							endif; ?>
						<?php
						endif;
						?>
						<?php if($peha['gambar'] != null): ?>
							<a href="#id<?= $peha['id_penyerahan']; ?>" data-toggle="modal" class="btn btn-sm btn-info me-1"><i class="fas fa-image"></i></button> 
						<?php endif; ?>
						<a href="<?= base_url('Admin/cetakpenhas/' . $peha['id_penyerahan']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						
						<?php if($user['role'] != 1):?>
                        	<a href="<?= base_url('Admin/editpenhas/' . $peha['id_penyerahan']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        	<a href="<?= base_url('Admin/hapuspenhas/' . $peha['id_penyerahan']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
						<?php
							endif;
						?>
                    </td>
				</tr>

				<!-- Modal -->
				<div class="modal fade" id="id<?= $peha['id_penyerahan'];  ?>" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<img src="<?= base_url('assets/img/' . $peha['gambar']); ?>" alt="gambar" class="img-thumbnail">
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