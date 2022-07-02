<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-newspaper"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/cariberita'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor berita..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<?php if($user['role'] != 1){?>
                	<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahberita'); ?>">Tambah Berita Acara</a>
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
					<th scope="col">Nomor Berita Acara</th>
					<th scope="col">Jenis Berita Acara</th>
					<th scope="col">Tanggal</th>
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
				foreach ($berita_acara as $berac) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $berac['nomor_berita']; ?></td>
					<td><?= $berac['jenis_berita']; ?></td>
					<td><?= $berac['tanggal_berita']; ?></td>
					<?php if($user['role'] != 1){?>
					<td class="text-center" style="width:100px;">
                        <a href="<?= base_url('Admin/editberita/' . $berac['id_berita']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapusberita/' . $berac['id_berita']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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