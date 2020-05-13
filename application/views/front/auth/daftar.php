<div style="margin-top: 2em;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				
				<div class="card border border-success">
					<div class="card-body">
						
						<form action="<?= site_url_api() ?>daftarakun" method="POST" id="form-daftar" autocomplete="off">
							<h3><b>Daftar Akun</b></h3>

							<div class="row">
								<div class="form-group col-md-6">
									<label for=""><b>NIK</b></label>
									<input type="number" name="nik" id="nik" class="form-control" required>
								</div>
								<div class="form-group col-md-6">
									<label for=""><b>Nama Lengkap</b></label>
									<input type="text" name="nm_lgkp" id="nm_lgkp" class="form-control" required>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for=""><b>No. HP</b></label>
									<input type="text" name="no_hp" id="no_hp" class="form-control" required>
								</div>
								<div class="form-group col-md-6">
									<label for=""><b>Email</b></label>
									<input type="email" name="email" id="email" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label for=""><b>Alamat Domisili</b></label>
								<textarea name="alamat" id="alamat" rows="5" class="form-control" required></textarea>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for=""><b>Kata sandi</b></label>
									<input type="text" name="sandi" id="sandi" class="form-control" required>
								</div>
								<div class="form-group col-md-6">
									<label for=""><b>Ulangi kata sandi</b></label>
									<input type="text" name="ulangi_sandi" id="ulangi_sandi" class="form-control" required>
								</div>
							</div>

							<button type="submit" id="btnDaftar" class="btn btn-success btn-block" disabled><b>Daftar</b></button>
						</form>

					</div> <!-- penutup card-body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->
		</div> <!-- penutup row -->
	</div> <!-- penutup container -->
</div>

<script src="<?= site_url('aset/js_custom/daftar_akun.js') ?>"></script>
<script>
	$(document).ready(function () {
		Daftar.siteUrl = "<?= site_url() ?>";
		Daftar.init();
		Daftar.ulangiSandi();
		Daftar.tombolMasuk();
	});
</script>