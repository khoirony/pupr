<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Bidang Tanah</title>
  </head>
  <body>
    <div class="container-fluid text-center">
      <img src="<?= base_url('assets/img/kop.jpg');?>" alt="kop" class="border-bottom text-center border-bottom">
    </div><br>
    <h5 class="text-center fw-bold">Laporan Bidang Tanah</h5>
    <br>
    <div class="container-fluid px-5">
    <table class="table table-striped table-bordered table-hover">
    <thead>
				<tr class="bg-white text-center">
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
    </div><br><br>


      <div class="row">
        <div class="col-8">
          
        </div>
        <div class="col-4">
          <p class="text-center">Bnjarmasin, <?= date('d-M-Y'); ?><br>
          Mengetahui, <br>
          Pejabat Pembuat Komitmen <br>
          Pengadaan Tanah</p>
          <br>
          <br>
          <br>
          <p class="text-center">
            <span class=" text-decoration-underline"> Khairil Fakhmi, SE </span><br>
            NIP.17011072007011002</p>
        </div>
      </div>


    <script>
        window.print();
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>