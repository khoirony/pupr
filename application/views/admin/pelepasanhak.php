<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> <?= $title; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripelhak'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor bidtan..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<a class="btn btn-warning rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/laporanpelhak'); ?>">Laporan Pelhak</a>
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpelhak'); ?>">Tambah Pelepasan Hak</a>
				<?php
					}
				?>
			</div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white text-center">
					<th scope="col">No</th>
					<th scope="col">Nomor Bidang Tanah</th>
					<th scope="col">Nama Penggarap</th>
					<th scope="col">Desa/Kelurahan</th>
					<th scope="col">Nomor Kwitansi</th>
					<th scope="col">Nomor Rekening</th>
					<th scope="col">Jenis Ganti Rugi</th>
                    <th scope="col">Tgl Kwitansi</th>
					<th scope="col">Nama Bank</th>
					<th scope="col">Tgl Pembayaran</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($pelepasan_hak as $peha) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $peha['id_bidang_tanah']; ?></td>
					<td><?= $peha['nama_penggarap']; ?></td>
					<td><?= $peha['id_lokasi']; ?></td>
					<td><?= $peha['nomor_kwitansi']; ?></td>
					<td><?= $peha['nomor_rekening']; ?></td>
					<td><?= $peha['id_musyawarah']; ?></td>
					<td><?= $peha['tanggal_kwitansi']; ?></td>
                    <td><?= $peha['nama_bank']; ?></td>
					<td><?= $peha['tanggal_pembayaran']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:130px;';} ?>">
						<a href="<?= base_url('Admin/cetakpelhak/' . $peha['id_pelepasan']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1){?>
                        <a href="<?= base_url('Admin/editpelhak/' . $peha['id_pelepasan']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuspelhak/' . $peha['id_pelepasan']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
						<?php
							}
						?>
                    </td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>

</div>
<!-- /.container-fluid -->