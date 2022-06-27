<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripentan'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor bidtan..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpentan'); ?>">Tambah Penilaian Tanah</a>
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
					<th scope="col">Nomor Bidang tanah</th>
					<th scope="col">Penilai Tanah</th>
					<th scope="col">Satgas</th>
					<th scope="col">Nilai Tanah</th>
					<th scope="col">Nilai Bangunan</th>
                    <th scope="col">Nilai Benda Lain</th>
					<th scope="col">Nilai Kerugian</th>
					<th scope="col">Total Nilai Ganti Rugi</th>
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
					<?php if($user['role'] != 1){?>
                    <td class="text-center" style="width:100px;">
                        <a href="<?= base_url('Admin/editpentan/' . $pentan['id_penilaian']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuspentan/' . $pentan['id_penilaian']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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