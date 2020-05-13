<div style="margin-top: 2em;">
	<div class="container">
		<div class="row">
			<div class="col">
				
				<div class="card border border-info">
					<div class="card-body">
						
						<div class="form-group">
							<label for="">Nama Paket</label>
							<input type="text" class="form-control" value="<?= $paket->nm_paket ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Harga Paket</label>
							<input type="text" class="form-control" value="<?= kerupiah($paket->hrg_paket) ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">No. HP</label>
							<div class="card border border-primary">
								<div class="card-body">
									<?= $paket->dtl_paket ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Status Paket</label>
							<input type="text" class="form-control" value="<?= status($paket->stts_paket) ?>" readonly>
						</div>
						
						<div class="float-right">
							<?php if ($this->session->has_userdata('id_peserta_peserta')): ?>
								<a class="btn btn-success" href="<?= site_url('pendaftaran/').$paket->id_paket ?>"><b>Daftar</b></a>
							<?php endif ?>
							<a class="btn btn-danger" href="<?= site_url() ?>"><b>Kembali</b></a>
						</div>

					</div> <!-- penutup card-body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->
		</div> <!-- penutup row -->
	</div> <!-- penutup container -->
</div>