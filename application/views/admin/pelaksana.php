<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-running"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripelaksana'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nama..">
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
						<a class="btn btn-success rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/batalpelaksana'); ?>">Disetujui</a>
					<?php
					elseif($ttd['status'] == 0):
					?>
						<a class="btn btn-danger rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/setujupelaksana'); ?>">Belum</a>
					<?php 
					endif; ?>
				<?php
				endif;
				?>
				<a class="btn btn-warning rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/laporanpelaksana'); ?>">Laporan Pelaksana</a>
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpelaksana'); ?>">Tambah Pelaksana</a>
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
					<th scope="col">NIP/NRP</th>
					<th scope="col">Nama</th>
					<th scope="col">Satgas</th>
					<th scope="col">Kegiatan</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($pelaksana as $pel) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $pel['id_pegawai']; ?></td>
					<td><?= $pel['nama_pelaksana']; ?></td>
					<td><?= $pel['id_pegawai']; ?></td>
					<td><?= $pel['id_kegiatan']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:130px;';}else{echo'style="width:100px;';} ?>">
						<?php 
						if($user['role'] == 1):
							if($pel['status'] == 1):
							?>
								<a class="btn btn-sm btn-success" href="<?= base_url('Admin/bataldetailpelaksana/' . $pel['id_pelaksana']); ?>"><i class="fas fa-check"></i></a>
							<?php
							elseif($pel['status'] == 0):
							?>
								<a class="btn btn-sm btn-danger" href="<?= base_url('Admin/setujudetailpelaksana/' . $pel['id_pelaksana']); ?>"><i class="fas fa-times"></i></a>
							<?php 
							endif; ?>
						<?php
						endif;
						?>
						<a href="<?= base_url('Admin/cetakpelaksana/' . $pel['id_pelaksana']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1){?>
                        	<a href="<?= base_url('Admin/editpelaksana/' . $pel['id_pelaksana']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        	<a href="<?= base_url('Admin/hapuspelaksana/' . $pel['id_pelaksana']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
						<?php
							}
						?>
                    </td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>

</div>
<!-- /.container-fluid -->