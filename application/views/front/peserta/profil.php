<div style="margin-top: 2em;">
	<div class="container">
		<div class="row">
			<div class="col">
				
				<div class="card border border-info">
					<div class="card-body">
						
						<div class="form-group">
							<label for="">NIK</label>
							<input type="text" class="form-control" value="<?= $peserta->nik ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Nama Lengkap</label>
							<input type="text" class="form-control" value="<?= $peserta->nm_lgkp ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">No. HP</label>
							<input type="text" class="form-control" value="<?= $peserta->no_hp ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" value="<?= $peserta->email ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<textarea id="alamat" class="form-control" rows="5" readonly><?= $peserta->alamat ?></textarea>
						</div>

					</div> <!-- penutup card-body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->
		</div> <!-- penutup row -->
	</div> <!-- penutup container -->
</div>