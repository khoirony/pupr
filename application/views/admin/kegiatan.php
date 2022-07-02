<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-briefcase"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/carikegiatan'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor kegiatan..">
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
						<a class="btn btn-success rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/batalkegiatan'); ?>">Disetujui</a>
					<?php
					elseif($ttd['status'] == 0):
					?>
						<a class="btn btn-danger rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/setujukegiatan'); ?>">Belum</a>
					<?php 
					endif; ?>
				<?php
				endif;
				?>
				<a class="btn btn-warning rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/laporankegiatan'); ?>">Laporan Kegiatan</a>
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahkegiatan'); ?>">Tambah Kegiatan</a>
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
					<th scope="col">Nomor Kegiatan</th>
					<th scope="col">Nomor Penlok</th>
					<th scope="col">Rencana Penggunaan</th>
					<th scope="col">Nama Kegiatan</th>
					<th scope="col">Desa/Kelurahan</th>
					<th scope="col">Kecamatan</th>
                    <th scope="col">Kabupaten/Kota</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($kegiatan as $keg) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $keg['nomor_kegiatan']; ?></td>
					<td><?= $keg['id_penlok']; ?></td>
					<td><?= $keg['rencana_penggunaan']; ?></td>
					<td><?= $keg['nama_kegiatan']; ?></td>
					<td><?= $keg['desa_kelurahan']; ?></td>
					<td><?= $keg['kecamatan']; ?></td>
					<td><?= $keg['kabupaten_kota']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:130px;';}else{echo'style="width:100px;';} ?>">
						<?php 
						if($user['role'] == 1):
							if($keg['status'] == 1):
							?>
								<a class="btn btn-sm btn-success" href="<?= base_url('Admin/bataldetailkegiatan/' . $keg['id_kegiatan']); ?>"><i class="fas fa-check"></i></a>
							<?php
							elseif($keg['status'] == 0):
							?>
								<a class="btn btn-sm btn-danger" href="<?= base_url('Admin/setujudetailkegiatan/' . $keg['id_kegiatan']); ?>"><i class="fas fa-times"></i></a>
							<?php 
							endif; ?>
						<?php
						endif;
						?>
						<a href="<?= base_url('Admin/cetakkegiatan/' . $keg['id_kegiatan']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1){?>
                        <a href="<?= base_url('Admin/editkegiatan/' . $keg['id_kegiatan']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuskegiatan/' . $keg['id_kegiatan']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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