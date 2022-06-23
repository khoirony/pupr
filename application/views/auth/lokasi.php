    <div class="container text-center pt-5">
    	<h3 class="fw-bold">
    		PENGADAAN TANAH BWS KALIMANTAN <br>
    		III <br>
    		PUPR SNVT PJPA <br>
    	</h3><br>
    </div>
    <div class="container">
    	<h3>
    		Peta Lokasi Bidang Tanah
    	</h3><br>
    	<div id="map" style="height:500px;"></div><br>
    	<form method="POST" action="<?= base_url('auth/registrasipegawai'); ?>">
    		<div class="mb-3 row">
    			<div class="col-sm-5">
    				<input type="text" class="form-control rounded-pill py-2 ps-4" id="latitude" name="latitude"
    					placeholder="Latitude">
    			</div>
    			<div class="col-sm-5">
    				<input type="text" class="form-control rounded-pill py-2 ps-4" id="longitude" name="longitude"
    					placeholder="Longitude">
    			</div>
                <div class="col-sm-2">
                <div class="text-center d-grid gap-2">
						<button type="submit" class="btn btn-primary btn-user btn-block rounded-pill py-2">
							Submit
						</button>
					</div>
    			</div>
    		</div>
    	</form>
    	<br><br>
    </div>

    <!-- Custom Map -->
    <script>
    	var map = L.map('map').setView([-7.2408797, 112.7417824], 15);

    	L.tileLayer(
    		'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2hvaXJvbnkiLCJhIjoiY2t6c2w1anA5MHFyNjJwbzF3dHRzMmlrbSJ9.CvST75663DLudTug1RmUvg', {
    			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    			maxZoom: 18,
    			id: 'mapbox/streets-v11',
    			tileSize: 512,
    			zoomOffset: -1,
    			accessToken: 'pk.eyJ1Ijoia2hvaXJvbnkiLCJhIjoiY2t6c2w1anA5MHFyNjJwbzF3dHRzMmlrbSJ9.CvST75663DLudTug1RmUvg'
    		}).addTo(map);

    	function getlokasi() {
    		//jika browser mendukung navigator.geolocation maka akan menjalankan perintah di bawahnya
    		if (navigator.geolocation) {
    			// getCurrentPosition digunakan untuk mendapatkan lokasi pengguna
    			//showPosition adalah fungsi yang akan dijalankan
    			navigator.geolocation.getCurrentPosition(showPositionKlik);
    		}
    	}

    	function showPositionKlik(position) {
    		var latitude = position.coords.latitude;
    		var longitude = position.coords.longitude;

    		L.tileLayer(
    			'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2hvaXJvbnkiLCJhIjoiY2t6c2w1anA5MHFyNjJwbzF3dHRzMmlrbSJ9.CvST75663DLudTug1RmUvg', {
    				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    				maxZoom: 18,
    				id: 'mapbox/streets-v11',
    				tileSize: 512,
    				zoomOffset: -1,
    				accessToken: 'pk.eyJ1Ijoia2hvaXJvbnkiLCJhIjoiY2t6c2w1anA5MHFyNjJwbzF3dHRzMmlrbSJ9.CvST75663DLudTug1RmUvg'
    			}).addTo(map);

    		L.Routing.control({
    			waypoints: [
    				L.latLng(latitude, longitude),
    				L.latLng(-7.2408797, 112.7417824)
    			]
    		}).addTo(map);

    		var popup = L.popup()
    			.setLatLng([latitude, longitude])
    			.setContent("My Location")
    			.openOn(map);
    	}

    </script>
