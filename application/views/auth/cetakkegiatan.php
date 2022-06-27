<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cetak Kegiatan</title>
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
	</div>


    <script>
        window.print();
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>