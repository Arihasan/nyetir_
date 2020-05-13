<div style="margin-top: 2em;">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				
				<div class="card border border-success">
					<div class="card-body">
						
						<?= $this->session->flashdata('pesan') ?>

						<form action="<?= site_url('masuk') ?>" method="POST" autocomplete="off">
							<h3><b>Masuk Akun</b></h3>
							<div class="form-group">
								<!-- <label for=""><b>No. HP / Email</b></label>
								<input type="text" name="no_hp_email" id="no_hp_email" class="form-control"> -->
								<label for=""><b>No. HP</b></label>
								<input type="text" name="no_hp" id="no_hp" class="form-control">
							</div>
							<div class="form-group">
								<label for=""><b>Kata sandi</b></label>
								<input type="password" name="sandi" id="sandi" class="form-control">
							</div>
							<button type="submit" id="btnMasuk" class="btn btn-success btn-block">Masuk</button>
						</form>

					</div> <!-- penutup card-body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->
		</div> <!-- penutup row -->
	</div> <!-- penutup container -->
</div>

<script>
	var Masuk = function () {
		
		return {



		}

	}();
</script>