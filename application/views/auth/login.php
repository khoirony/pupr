<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-5 shadow-lg mt-5 rounded">
			<div class="p-5">
				<div class="text-center">
					<p class="h3 text-gray-900 mb-2">Login</p>
				</div>
				<br>
				<?= $this->session->flashdata('msg');
                                if (isset($_SESSION['msg'])) {
                                    unset($_SESSION['msg']);
                                } ?>
				<form method="POST" action="<?= base_url('auth/login'); ?>">
					<div class="mb-3">
						<input type="text" class="form-control rounded-pill py-3 ps-4" id="username" name="username"
							placeholder="Masukkan Username" value="<?= set_value('username'); ?>">
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<input type="password" class="form-control rounded-pill py-3 ps-4" id="password" name="password"
							placeholder="Password">
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="text-center d-grid gap-2">
						<button type="submit" class="btn btn-primary btn-user py-3 btn-block rounded-pill">
							Masuk
						</button>
					</div>
				</form><br>
				<hr>
				<div class="text-center mt-0">
					<span class="small">Belum Mempunyai Akun?</span> <a class="small text-decoration-none"
						href="<?= base_url('auth/registrasipegawai'); ?>">Daftar disini!</a>
				</div>
			</div>

		</div>

	</div>
	<br><br>

</div>
