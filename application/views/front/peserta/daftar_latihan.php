<div style="margin-top: 2em;">
	<div class="container">
		<div class="row">
			<div class="col">
				
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><?= $judul ?></h5>
						
						<table class="table" id="tabel">
							<thead>
								<tr>
									<th>No.</th>
									<th>Paket</th>
									<th>Jenis Mobil</th>
									<th>Tanggal Jemput</th>
									<th>Metode Pembayaran</th>
									<th>Pilihan</th>
								</tr>
							</thead>
							<tbody id="data-disini">
								<tr>
									<td colspan="6" align="center">Memuat data ...</td>
								</tr>
							</tbody>
						</table>

					</div> <!-- penutup card body -->
				</div> <!-- penutup card -->

			</div> <!-- penutup col -->
		</div> <!-- penutup row -->
	</div> <!-- penutup container -->
</div>

<!-- upload bukti -->
<div class="modal fade" id="uploadBukti" tabindex="-1" role="dialog" aria-labelledby="uploadBuktiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadBuktiLabel">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  			<form id="form-bukti" action="<?= site_url_api() ?>upload_sc_bukti" method="POST" enctype="multipart/form-data">
    			<input type="hidden" name="id_daftar" id="id_daftar">
        	<div class="form-group">
        		<label for="">Bukti Pembayaran</label>
        		<input type="file" class="form-control" name="sc_bukti" id="sc_bukti">
        	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Upload</button>
        <button type="button" class="btn btn-danger btnTutup" data-dismiss="modal">Batal</button>
    		</form>
      </div>
    </div>
  </div>
</div>

<!-- Detail -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detail-disini"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= site_url('aset/js_custom/daftar_latihan.js') ?>"></script>
<script>
	$(document).ready(function () {
		DaftarLatihan.urlApi = "<?= site_url_api() ?>";
		DaftarLatihan.siteUrl = "<?= site_url() ?>";
		DaftarLatihan.init();
	});
</script>