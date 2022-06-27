<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Hasil Pencarian Dari: <?= $text; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripelaksana'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nama..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpelaksana'); ?>">Tambah Pelaksana</a>
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
					<th scope="col">NIP/NRP</th>
					<th scope="col">Nama</th>
					<th scope="col">Satgas</th>
					<th scope="col">Kegiatan</th>
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
				foreach ($cari as $pel) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $pel['id_pegawai']; ?></td>
					<td><?= $pel['nama_pelaksana']; ?></td>
					<td><?= $pel['id_pegawai']; ?></td>
					<td><?= $pel['id_kegiatan']; ?></td>
					<?php if($user['role'] != 1){?>
					<td class="text-center" style="width:100px;">
                        <a href="<?= base_url('Admin/editpelaksana/' . $pel['id_pelaksana']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuspelaksana/' . $pel['id_pelaksana']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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