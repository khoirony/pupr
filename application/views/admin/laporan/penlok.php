<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Laporan Penetapan Lokasi</title>
</head>

<body>
	<div class="container-fluid text-center">
		<img src="<?= base_url('assets/img/kop.jpg');?>" alt="kop" class="border-bottom text-center border-bottom">
	</div><br>
	<h5 class="text-center fw-bold">Laporan Penetapan Lokasi</h5>
	<br>
	<div class="container-fluid px-5">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white text-center">
					<th scope="col">No</th>
					<th scope="col">Nomor Penlok</th>
					<th scope="col">Kategori Pembangunan</th>
					<th scope="col">Rencana Pembangunan</th>
					<th scope="col">Sumber Anggaran</th>
					<th scope="col">Nilai Anggaran</th>
					<th scope="col">Tanggal Permohonan</th>
					<th scope="col">Nama Pemohon</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($penetapan_lokasi as $penlok) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $penlok['id_penlok']; ?></td>
					<td><?= $penlok['kategori_pembangunan']; ?></td>
					<td><?= $penlok['rencana_pembangunan']; ?></td>
					<td><?= $penlok['sumber_anggaran']; ?></td>
					<td><?= $penlok['nilai_anggaran']; ?></td>
					<td><?= $penlok['tanggal_permohonan']; ?></td>
					<td><?= $penlok['nama_pemohon']; ?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div><br><br>


	<div class="row">
		<div class="col-8">

		</div>
		<div class="col-4 text-center">
			<p class="text-center">Bnjarmasin, <?= date('d-M-Y'); ?><br>
				Mengetahui, <br>
				Pejabat Pembuat Komitmen <br>
				Pengadaan Tanah</p>
			<?php
          if($ttd['status'] == 1):
					?>
			<img src="<?= base_url('assets/img/ttd.png');?>" alt="ttd">
			<?php
					elseif($ttd['status'] == 0):
					?>
			<br> <br> <br>
			<?php 
					endif; ?>

			<p class="text-center">
				<span class=" text-decoration-underline"> Khairil Fakhmi, SE </span><br>
				NIP.17011072007011002</p>
		</div>
	</div>


	<script>
		window.print();

	</script>
	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

</body>

</html>
