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
                <a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahbidtan'); ?>">Tambah Bidang Tanah</a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white">
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
					<td class="text-center" style="width:100px;">
                        <a href="<?= base_url('Admin/editbidtan/' . $bidtan['id_bidang_tanah']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapusbidtan/' . $bidtan['id_bidang_tanah']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>

</div>
<!-- /.container-fluid -->