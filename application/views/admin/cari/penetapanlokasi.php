<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-compass"></i> Hasil Pencarian Dari: <?= $text; ?></h1>
	<br>
    <div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/caripenlok'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nomor penlok..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
				<?php if($user['role'] != 1){?>
					<a class="btn btn-primary rounded-pill pl-3 pr-3 mt-2" href="<?= base_url('Admin/tambahpenlok'); ?>">Tambah Penlok</a>
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
					<th scope="col">Nomor Penlok</th>
					<th scope="col">Kategori Pembangunan</th>
					<th scope="col">Rencana Pembangunan</th>
					<th scope="col">Sumber Anggaran</th>
					<th scope="col">Nilai Anggaran</th>
					<th scope="col">Tanggal Permohonan</th>
                    <th scope="col">Nama Pemohon</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($cari as $penlok) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
                    <td><?= $penlok['id_penlok']; ?></td>
					<td><?= $penlok['kategori_pembangunan']; ?></td>
					<td><?= $penlok['rencana_pembangunan']; ?></td>
					<td><?= $penlok['sumber_anggaran']; ?></td>
					<td><?= $penlok['nilai_anggaran']; ?></td>
					<td><?= $penlok['tanggal_permohonan']; ?></td>
					<td><?= $penlok['nama_pemohon']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:170px;';}else{echo'style="width:130px;';} ?>">
						<?php 
						if($user['role'] == 1):
							if($penlok['status'] == 1):
							?>
								<a class="btn btn-sm btn-success" href="<?= base_url('Admin/bataldetailpenlok/' . $penlok['id_penlok']); ?>"><i class="fas fa-check"></i></a>
							<?php
							elseif($penlok['status'] == 0):
							?>
								<a class="btn btn-sm btn-danger" href="<?= base_url('Admin/setujudetailpenlok/' . $penlok['id_penlok']); ?>"><i class="fas fa-times"></i></a>
							<?php 
							endif; ?>
						<?php
						endif;
						?>
						<?php if($penlok['berkas'] != null): ?>
							<a href="<?= base_url('assets/berkas/' . $penlok['berkas']); ?>" class="btn btn-sm btn-dark"><i class="fas fa-file-pdf"></i></a>
						<?php endif; ?>
						<a href="<?= base_url('Admin/cetakpenlok/' . $penlok['id_penlok']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1):?>
                        <a href="<?= base_url('Admin/editpenlok/' . $penlok['id_penlok']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/hapuspenlok/' . $penlok['id_penlok']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
						<?php
							endif;
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