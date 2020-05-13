<div style="">
	<div class="container-fluid p-4" style="min-height: 400px;">
		<div class="row">
			<div class="col">
				<h2 class="text-center"><b>Pendaftaran</b></h2>
			</div>
		</div>

		<form action="<?= site_url_api() ?>proses_pendaftaran" method="POST" enctype="multipart/form-data" id="form-upload">
			<input type="hidden" name="id_peserta" value="<?= $this->session->userdata('id_peserta_peserta') ?>">
		<!-- FORM PEMBUKA -->

		<div class="row" id="paket-disini">
			<div class="col-md-4 pt-2">
				
				<div class="card border border-success">
					<div class="card-body">

							<div class="card border border-primary">
								<div class="card-body">
									<b>Anda masuk sebagai <?= strtoupper($this->session->userdata('nm_lgkp_peserta')) ?></b>
								</div>
							</div>

							<hr>

							<div class="card border border-info">
								<div class="card-body">
									
									<div class="form-group">
										<label for=""><b>Paket</b></label>
										<select name="id_paket" id="id_paket" class="form-control" onchange="Pendaftaran.cekHargaPaket()" required>
											<option value="">-- Pilih --</option>
											<?php foreach ($paket as $p): ?>
											<option value="<?= $p->id_paket ?>" <?= $p->id_paket == $id_paket ? 'selected' : '' ?> > <?= $p->nm_paket ?> </option>
											<?php endforeach ?>
										</select>
										<br>
										<button type="button" id="btnDetail" data-id="0" class="btn btn-info" disabled><b>Detail Paket</b></button>
									</div>

								</div> <!-- penutup card body -->
							</div> <!-- penutup card -->

							<br>

							<div class="form-group">
								<label for=""><b>Jenis Mobil</b></label>
								<select name="id_jenis" id="id_jenis" class="form-control" required>
									<option value="">-- Pilih --</option>
									<?php foreach ($jenis as $p): ?>
									<option value="<?= $p->id_jenis ?>"> <?= $p->jns_mobil ?> </option>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label for=""><b>Tanggal Jemput</b></label>
								<input type="date" name="tgl_jemput" id="tgl_jemput" 
									min="<?= date('Y-m-d', strtotime(date('Y-m-d').'+1 days')) ?>" 
									max="<?= date('Y-m-d', strtotime(date('Y-m-d').'+7 days')) ?>" 
									value="<?= date('Y-m-d', strtotime(date('Y-m-d').'+1 days')) ?>" 
									class="form-control" required>
							</div> <!-- penutup col -->

							<div class="form-group">
								<label for=""><b>Titik Penjemputan</b></label>
								<select name="penjemputan" id="penjemputan" class="form-control" required>
									<option value="">-- Pilih --</option>
									<option value="0">Sesuai alamat akun</option>
									<?php foreach ($penjemputan as $j): ?>
									<option value="<?= $j->id_jemput ?>"><?= $j->penjemputan ?></option>
									<?php endforeach ?>
								</select>
							</div> <!-- penutup col -->

					</div> <!-- penutup card body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->

			<div class="col-md-4 pt-2">
				
				<div class="card border border-info">
					<div class="card-body">
						
						<div class="form-group">
							<label for=""><b>Metode Pembayaran</b></label>
							<select name="id_metode" id="id_metode" class="form-control" onchange="Pendaftaran.metodeDetail()" required>
								<option value="">-- Pilih --</option>
								<?php foreach ($metode as $p): ?>
								<option value="<?= $p->id_metode ?>"> <?= $p->nm_metode ?> </option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group">
							<label for="">Kode</label>
							<input type="text" id="kode" class="form-control" value="-" readonly>
							<label for="">Jenis</label>
							<input type="text" id="jns_metode" class="form-control" value="-" readonly>
							<label for="">Keterangan</label>
							<div class="p-2 border">
								<p id="ket">-</p>
							</div>
						</div>

					</div> <!-- penutup card body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->

			<div class="col-md-4 pt-2">
				
				<div class="card border border-primary">
					<div class="card-body">
						
						<div class="form-group">
							<label for="">Total</label>
							<h2 id="harga_paket"></h2>
						</div>

						<br>
						<button type="submit" class="btn btn-success btn-block"><b>Daftar</b></button>

					</div><!-- penutup card body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->

		</div> <!-- penutup row -->

		</form>
		<!-- FORM PENUTUP -->

	</div> <!-- penutup container -->
</div>

<div class="modal fade" id="detailPaket" tabindex="-1" role="dialog" aria-labelledby="detailPaketLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailPaketLabel">Detail Paket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= site_url('aset/js_custom/pendaftaran.js') ?>"></script>
<script>
	$(document).ready(function () {
		Pendaftaran.urlApi = "<?= site_url_api() ?>";
		Pendaftaran.siteUrl = "<?= site_url() ?>";
		Pendaftaran.init();
		Pendaftaran.cekHargaPaket();
		Pendaftaran.detail();
		Pendaftaran.tombolDaftarNon();
	});
</script>