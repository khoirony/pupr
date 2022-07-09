<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-running"></i> Hasil Pencarian Dari: <?= $text; ?></h1>
	<br>
	<div class="mr-3 mb-2">
        <div class="row">
            <div class="col ps-3">
                <div class="border border-primary rounded-pill bg-white p-1" style="width: 19em;">
                    <form class="d-inline-flex ms-3" method="POST" action="<?= base_url('Admin/carihonorarium'); ?>">
                        <input type="text" class="border-0" id="cari" name="cari" placeholder="Masukkan nama..">
                        <button type="submit" class="btn btn-primary rounded-pill ps-3 pe-3 ms-4">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
            <div class="col text-right">
			
			</div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="bg-white text-center">
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">Gol</th>
					<th scope="col">Jabatan</th>
					<th scope="col">Satgas</th>
					<th scope="col">Kegiatan</th>
					<th scope="col">Uang Harian</th>
					<th scope="col">Pajak</th>
					<th scope="col">Nilai Bersih</th>
                    <th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($cari as $hon) {
				?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $hon['nama_pelaksana']; ?></td>
					<td><?= $hon['golongan']; ?></td>
					<td><?= $hon['jabatan']; ?></td>
					<td><?= $hon['satgas']; ?></td>
					<td><?= $hon['kegiatan']; ?></td>
					<td><?= $hon['uang_harian']; ?></td>
					<td><?= $hon['pajak']; ?></td>
					<td><?= $hon['nilai_bersih']; ?></td>
					<td class="text-center" <?php if($user['role'] != 1){ echo'style="width:130px;';}else{echo'style="width:130px;';} ?>">
						<?php 
						if($user['role'] == 1):
							if($hon['status'] == 1):
							?>
								<a class="btn btn-sm btn-success" href="<?= base_url('Admin/bataldetailhonorarium/' . $hon['id_honorarium']); ?>"><i class="fas fa-check"></i></a>
							<?php
							elseif($hon['status'] == 0):
							?>
								<a class="btn btn-sm btn-danger" href="<?= base_url('Admin/setujudetailhonorarium/' . $hon['id_honorarium']); ?>"><i class="fas fa-times"></i></a>
							<?php 
							endif; ?>
						<?php
						endif;
						?>
						<a href="<?= base_url('Admin/cetakhonorarium/' . $hon['id_honorarium']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></a>
						<?php if($user['role'] != 1):?>
                        	<a href="<?= base_url('Admin/edithonorarium/' . $hon['id_honorarium']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        	<a href="<?= base_url('Admin/hapushonorarium/' . $hon['id_honorarium']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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