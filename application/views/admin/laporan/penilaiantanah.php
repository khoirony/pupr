<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Penilaian Tanah</title>
  </head>
  <body>
    <div class="container-fluid text-center">
      <img src="<?= base_url('assets/img/kop.jpg');?>" alt="kop" class="border-bottom text-center border-bottom">
    </div><br>
    <h5 class="text-center fw-bold">Laporan Penilaian Tanah</h5>
    <br>
    <div class="container-fluid px-5">
    <table class="table table-striped table-bordered table-hover">
    <thead>
				<tr class="bg-white text-center">
					<th scope="col">No</th>
					<th scope="col">Nomor Bidang tanah</th>
					<th scope="col">Penilai Tanah</th>
					<th scope="col">Satgas</th>
					<th scope="col">Nilai Tanah</th>
					<th scope="col">Nilai Bangunan</th>
          <th scope="col">Nilai Benda Lain</th>
					<th scope="col">Nilai Kerugian</th>
					<th scope="col">Total Nilai Ganti Rugi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($penilaian_tanah as $pentan) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $pentan['id_bidang_tanah']; ?></td>
					<td><?= $pentan['penilai_tanah']; ?></td>
					<td><?= $pentan['id_pelaksana']; ?></td>
					<td><?= $pentan['nilai_tanah']; ?></td>
					<td><?= $pentan['nilai_bangunan']; ?></td>
					<td><?= $pentan['nilai_benda_lain']; ?></td>
					<td><?= $pentan['nilai_kerugian']; ?></td>
          <td><?= $pentan['total_nilai_ganti_rugi']; ?></td>
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