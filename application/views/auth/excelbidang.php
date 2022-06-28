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
    header("Content-Disposition: attachment; filename=bidangtanah.xls"); 
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
			Data Bidang Tanah
		</h3>

		<table border="1">
				<tr>
					<th>No</th>
					<th>Nomor Bidang Tanah</th>
					<th>Nomor Penlok</th>
					<th>Luas</th>
					<th>Desa/Kelurahan</th>
					<th>Pemilik/Penggarap</th>
					<th>Pelepasan Bidang</th>
                    <th>Tipe Aset</th>
					<th>Perkiraan Dampak</th>
				</tr>
				<?php
				$no = 1;
				foreach ($bidang_tanah as $bidtan) {
				?>
				<tr>
					<th><?= $no++; ?></th>
					<td><?= $bidtan['id_bidang_tanah']; ?></td>
					<td><?= $bidtan['id_penlok']; ?></td>
					<td><?= $bidtan['luas']; ?></td>
					<td><?= $bidtan['id_lokasi']; ?></td>
					<td><?= $bidtan['nama_penggarap']; ?></td>
					<td><?= $bidtan['pelepasan_bidang']; ?></td>
					<td><?= $bidtan['tipe_aset']; ?></td>
                    <td><?= $bidtan['perkiraan_dampak']; ?></td>
				</tr>
				<?php
				}
				?>
		</table>
	</div>

  </body>
</html>