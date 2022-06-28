<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>Cetak Bidang Tanah</title>
  </head>
  <body>
	<?php 
	header("Content-type: application/vnd-ms-excel");
     
    // membuat nama file ekspor "laporan.xls"
    header("Content-Disposition: attachment; filename=kegiatan.xls"); 
	?>
  <div class="container-fluid text-center pt-5">
		<h3 class="fw-bold">
			PENGADAAN TANAH BWS KALIMANTAN <br>
			III <br>
			PUPR SNVT PJPA <br>
		</h3><br><br>
	</div>
	<div class="container-fluid">
		<h3>
			Data Kegiatan
		</h3>

		<table border="1">
				<tr>
					<th>No</th>
					<th>Nomor Kegiatan</th>
					<th>Nomor Penlok</th>
					<th>Rencana Penggunaan</th>
					<th>Nama Kegiatan</th>
					<th>Desa/Kelurahan</th>
					<th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
				</tr>
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
		</table>
	</div>


  </body>
</html>