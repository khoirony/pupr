<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/carilokasi'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor penlok..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahlokasi'); ?>">Tambah Lokasi</a>
				<?php
					}
				?>
			</div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white">
					<th scope="col">No</th>
					<th scope="col">Nomor Penlok</th>
					<th scope="col">Kabupatan/Kota</th>
					<th scope="col">Kecamatan</th>
					<th scope="col">Desa/Kelurahan</th>
					<th scope="col">Alamat</th>
                    <?php if($user['role'] != 1){?>
                    <th scope="col">Aksi</th>
					<?php
						}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($lokasi as $lok) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $lok['id_penlok']; ?></td>
					<td><?= $lok['kabupaten_kota']; ?></td>
					<td><?= $lok['kecamatan']; ?></td>
					<td><?= $lok['desa_kelurahan']; ?></td>
					<td><?= $lok['alamat']; ?></td>
					<?php if($user['role'] != 1){?>
                    <td class="text-center" style="width:100px;">
                        <a href="<?= base_url('Admin/editlokasi/' . $lok['id_lokasi']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuslokasi/' . $lok['id_lokasi']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
					<?php
						}
					?>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>

</div>
<!-- /.container-fluid -->