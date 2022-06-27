<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cetak Bidang Tanah</title>
  </head>
  <body>
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
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>


    <script>
        window.print();
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>