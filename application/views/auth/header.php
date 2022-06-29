<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/c12c059ff2.js" crossorigin="anonymous"></script>
	<title><?= $title; ?></title>

  <!-- Import Map -->
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css' rel='stylesheet' />
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css">
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark text-white bg-secondary shadow">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('/');?>">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('auth/profile');?>">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('auth/bidang');?>">Data Bidang Tanah</a>
        </li>
		    <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('auth/kegiatan');?>">Data Kegiatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3 text-white" href="<?= base_url('auth/lokasi');?>">Data Lokasi</a>
        </li>
		    <li class="nav-item">
          <?php if ($hitung == 0) : ?>
            <a class="nav-link text-white bg-warning rounded-pill px-4 py-1 mt-1" href="<?= base_url('auth/login');?>">Login</a>
          <?php else : ?>
            <a class="nav-link text-white bg-danger rounded-pill px-4 py-1 mt-1" href="<?= base_url('auth/logout');?>">Logout</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>