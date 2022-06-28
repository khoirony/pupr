<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Hasil Pencarian Dari: <?= $text; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripegawai'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nip..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpegawai'); ?>">Tambah Pegawai</a>
			</div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white">
					<th scope="col">No</th>
					<th scope="col">NIP</th>
					<th scope="col">Nama Pegawai</th>
					<th scope="col">Pangkat</th>
					<th scope="col">Jabatan</th>
					<th scope="col">Username</th>
					<th scope="col">Password</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				foreach ($cari as $peg) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $peg['nip']; ?></td>
					<td><?= $peg['nama']; ?></td>
					<td><?= $peg['pangkat']; ?></td>
					<td><?= $peg['jabatan']; ?></td>
					<td><?= $peg['username']; ?></td>
					<td><?= $peg['password']; ?></td>
                    <td class="text-center" style="width:100px;">
                        <a href="<?= base_url('Admin/editpegawai/' . $peg['id_user']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuspegawai/' . $peg['id_user']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>

</div>
<!-- /.container-fluid -->