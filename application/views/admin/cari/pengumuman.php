<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Hasil Pencarian Dari: <?= $text; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripengumuman'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor pengumuman..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpengumuman'); ?>">Tambah Pengumuman</a>
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
					<th scope="col">Nomor Pengumuman</th>
					<th scope="col">Nomor Bidang Tanah</th>
					<th scope="col">Satgas</th>
					<th scope="col">Tanggal Mulai</th>
					<th scope="col">Tanggal Selesai</th>
					<th scope="col">Nomor Berita Acara</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($cari as $p) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $p['nomor_pengumuman']; ?></td>
					<td><?= $p['id_bidang_tanah']; ?></td>
					<td><?= $p['id_pelaksana']; ?></td>
					<td><?= $p['tanggal_pengumuman']; ?></td>
					<td><?= $p['selesai_pengumuman']; ?></td>
					<td><?= $p['id_berita']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:130px;';} ?>">
						<a href="<?= base_url('Admin/cetakpengumuman/' . $p['id_pengumuman']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1){?>
                        <a href="<?= base_url('Admin/editpengumuman/' . $p['id_pengumuman']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuspengumuman/' . $p['id_pengumuman']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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