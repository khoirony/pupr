	<div class="container text-center pt-5">
		<h3 class="fw-bold">
			PENGADAAN TANAH BWS KALIMANTAN <br>
			III <br>
			PUPR SNVT PJPA <br>
		</h3><br>
	</div>
	<div class="container">
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
					<th scope="col">Lokasi</th>
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
					<td>
						<form action="" method="post">
							<input type="hidden" name="koordinat" value="<?= $bidtan['koordinat']; ?>">
							<input type="hidden" name="bidtan" value="<?= $bidtan['nama_penggarap']; ?>">
							<button type="submit" name="submit" class="btn btn-sm btn-primary rounded-pill px-3">
								Lihat
							</button>
						</form>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<a href="<?= base_url('auth/cetakbidang'); ?>" class="btn btn-sm btn-primary rounded-pill px-4">Cetak</a> <a href="<?= base_url('auth/excelbidang'); ?>" class="btn btn-sm btn-primary rounded-pill px-4">Excel</a>

		<br><br>
		<?php 
		if (isset($_POST['submit'])) {
			?>
			<div id="map" style="height:500px;"></div><br>
			<script>
				var map = L.map('map').setView([<?=$_POST['koordinat'];?>], 15);
				
				L.tileLayer(
					'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2hvaXJvbnkiLCJhIjoiY2t6c2w1anA5MHFyNjJwbzF3dHRzMmlrbSJ9.CvST75663DLudTug1RmUvg', {
						attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
						maxZoom: 18,
						id: 'mapbox/streets-v11',
						tileSize: 512,
						zoomOffset: -1,
						accessToken: 'pk.eyJ1Ijoia2hvaXJvbnkiLCJhIjoiY2t6c2w1anA5MHFyNjJwbzF3dHRzMmlrbSJ9.CvST75663DLudTug1RmUvg'
					}).addTo(map);
				
				var popup = L.popup()
					.setLatLng([<?=$_POST['koordinat'];?>])
					.setContent("<?=$_POST['bidtan'];?>")
					.openOn(map);
			</script>

		<?php
		}
		?>
	</div>

