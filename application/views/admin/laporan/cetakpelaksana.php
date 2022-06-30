<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Penugasan Pelaksana</title>
  </head>
  <body>
    <div class="container-fluid text-center">
      <img src="<?= base_url('assets/img/kop.jpg');?>" alt="kop" class="border-bottom text-center border-bottom">
    </div><br>
    <h5 class="text-center fw-bold">Detail Laporan Penugasan Pelaksana</h5>
    <br>
    <div class="container-fluid px-5 fs-5">
      <div class="row mb-3">
        <div class="col-4">
          NIP
        </div>
        <div class="col-8">
          : <?= $pelaksana['id_pegawai'];?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-4">
          Nama
        </div>
        <div class="col-8">
          : <?= $pelaksana['nama_pelaksana'];?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-4">
          Satgas
        </div>
        <div class="col-8">
          : <?= $pelaksana['satgas'];?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-4">
          Kegiatan
        </div>
        <div class="col-8">
          : <?= $pelaksana['id_kegiatan'];?>
        </div>
      </div>
    </div><br><br><br><br><br><br>


      <div class="row fs-5 mt-5">
        <div class="col-8">
          
        </div>
        <div class="col-4 text-center">
          <p class="text-center">Banjarmasin, <?= date('d-M-Y'); ?><br>
          Mengetahui, <br>
          Pejabat Pembuat Komitmen <br>
          Pengadaan Tanah</p>
          <?php
          if($pelaksana['status'] == 1):
					?>
          <img src="<?= base_url('assets/img/ttd.png');?>" alt="ttd">
          <?php
            elseif($pelaksana['status'] == 0):
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>