<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Tambah Bidang Tanah</h1>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-10 text-center">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Penlok</p>
                    <select class="custom-select rounded-pill px-3" id="nomor_penlok" name="nomor_penlok">
                        <?php
                        foreach ($penetapan_lokasi as $penlok) {
                        ?>
                        <option value="<?= $penlok['id_penlok']; ?>"><?= $penlok['id_penlok']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?= form_error('nomor_penlok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Nomor Bidang Tanah</p>
                    <input type="text" class="form-control form-control-user" id="id_bidang_tanah" name="id_bidang_tanah">
                    <?= form_error('id_bidang_tanah', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Pemilik/Penggarap</p>
                    <input type="text" class="form-control form-control-user" id="nama_penggarap" name="nama_penggarap">
                    <?= form_error('nama_penggarap', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Tipe Aset</p>
                    <input type="text" class="form-control form-control-user" id="tipe_aset" name="tipe_aset">
                    <?= form_error('tipe_aset', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Luas</p>
                    <input type="text" class="form-control form-control-user" id="luas" name="luas">
                    <?= form_error('luas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Desa/Kelurahan</p>
                    <input type="text" class="form-control form-control-user" id="id_lokasi" name="id_lokasi">
                    <?= form_error('id_lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Pelepasan Bidang</p>
                    <input type="text" class="form-control form-control-user" id="pelepasan_bidang" name="pelepasan_bidang">
                    <?= form_error('pelepasan_bidang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Perkiraan Dampak</p>
                    <input type="text" class="form-control form-control-user" id="perkiraan_dampak" name="perkiraan_dampak">
                    <?= form_error('perkiraan_dampak', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div id="peta" style="height:500px;"></div><br>
                <div class="form-group text-start">
                    <p class="ms-3 mb-0">Koordinat</p>
                    <input type="text" class="form-control form-control-user" id="koordinat" name="koordinat">
                    <?= form_error('koordinat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group text-start">
					<label class="form-label ml-3">Upload Foto</label>
					<input type="file" id="berkas" name="berkas" class="form-control rounded-pill">
				</div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-user px-5 mt-3">
                        Simpan
                    </button>
                </div>
            </form>
            <br>
        </div>

    </div>

</div>
    <!-- Map Picker -->
    <script>
		mapboxgl.accessToken = 'pk.eyJ1Ijoia2hvaXJvbnkiLCJhIjoiY2t6c2w1anA5MHFyNjJwbzF3dHRzMmlrbSJ9.CvST75663DLudTug1RmUvg';
		var map = new mapboxgl.Map({
		container: 'peta',//id elemen html
		style: 'mapbox://styles/mapbox/streets-v11',
		center:[106.69972796989238, -6.238601629433243],//koordinat lokasi garis bujur dan lintang,longitude dan latitude
		zoom: 9 // starting zoom
		});
		
		var geocoder = new MapboxGeocoder({
			accessToken: mapboxgl.accessToken,
			mapboxgl: mapboxgl,
			marker:false,
			placeholder: 'Masukan kata kunci...',
			zoom:20
		});

		let marker = null
		map.on('click', function(e) {
			if(marker == null){
				marker = new mapboxgl.Marker()
				.setLngLat(e.lngLat)
				.addTo(map);
			} else {
				marker.setLngLat(e.lngLat)
			}
			lk = e.lngLat
			document.getElementById("koordinat").value = e.lngLat.lat+","+e.lngLat.lng;
		});



    </script>