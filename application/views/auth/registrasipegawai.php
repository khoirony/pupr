<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		
		<div class="col-lg-5 shadow-lg mt-5 rounded">
			<div class="row fw-bold">
				<div class="col text-secondary text-center p-3">
					Pegawai
				</div>
				<a href="<?= base_url('auth/registrasipengunjung'); ?>" class="col text-white bg-secondary text-center p-3 text-decoration-none">
					Pengunjung
				</a>
			</div>
			<div class="p-5">
				<div class="text-center">
					<p class="h4 text-gray-900 mb-2">Registrasi Pegawai</p>
				</div>
				<br>
				<?= $this->session->flashdata('msg');
                                if (isset($_SESSION['msg'])) {
                                    unset($_SESSION['msg']);
                                } ?>
				<form method="POST" action="<?= base_url('auth/registrasipegawai'); ?>">
					<div class="mb-3">
						<input type="text" class="form-control rounded-pill py-3 ps-4" id="username" name="username"
							placeholder="Username" value="<?= set_value('username'); ?>">
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control rounded-pill py-3 ps-4" id="nip" name="nip"
							placeholder="NIP" value="<?= set_value('nip'); ?>">
						<?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control rounded-pill py-3 ps-4" id="nama" name="nama"
							placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
						<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control rounded-pill py-3 ps-4" id="pangkat" name="pangkat"
							placeholder="Pangkat" value="<?= set_value('pangkat'); ?>">
						<?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control rounded-pill py-3 ps-4" id="jabatan" name="jabatan"
							placeholder="Jabatan" value="<?= set_value('jabatan'); ?>">
						<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="mb-3 row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<input type="password" class="form-control rounded-pill py-3 ps-4" id="password1"
								name="password1" placeholder="Password">
							<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control rounded-pill py-3 ps-4" id="password2"
								name="password2" placeholder="Repeat Password">
						</div>
					</div>
					<div class="text-center d-grid gap-2">
						<button type="submit" class="btn btn-primary btn-user btn-block rounded-pill py-3">
							Daftar
						</button>
					</div>
				</form>
				<hr>
				<div class="text-center">
					<span class="small">Sudah Mempunyai akun? </span> <a class="small text-decoration-none"
						href="<?= base_url('auth/login'); ?>">Login!</a>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</div>
