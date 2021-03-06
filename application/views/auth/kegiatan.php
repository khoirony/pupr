<div class="container text-center pt-5">
		<h3 class="fw-bold">
			PENGADAAN TANAH BWS KALIMANTAN <br>
			III <br>
			PUPR SNVT PJPA <br>
		</h3><br>
	</div>
	<div class="container">
		<h3>
			Data Kegiatan
		</h3>

		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white">
					<th scope="col">No</th>
					<th scope="col">Nomor Kegiatan</th>
					<th scope="col">Nomor Penlok</th>
					<th scope="col">Rencana Penggunaan</th>
					<th scope="col">Nama Kegiatan</th>
					<th scope="col">Desa/Kelurahan</th>
					<th scope="col">Kecamatan</th>
                    <th scope="col">Kabupaten/Kota</th>
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
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<a href="<?= base_url('auth/cetakkegiatan'); ?>" class="btn btn-sm btn-primary rounded-pill px-4">Cetak</a> <a href="<?= base_url('auth/excelkegiatan'); ?>" class="btn btn-sm btn-primary rounded-pill px-4">Excel</a>
	</div>
