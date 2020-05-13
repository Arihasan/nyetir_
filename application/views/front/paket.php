<div style="background-color: white;">
	<div class="container my-3" style="min-height: 400px;">
		<div class="row">
			<div class="col">
				<h1 class="text-center"><b>Daftar Paket</b></h1><br>
			</div>
		</div>
		<div class="row" id="paket-disini">	
			<h2>Memuat data .....</h2>
		</div>
	</div>
</div>

<script src="<?= site_url() ?>aset/js_custom/paket.js"></script>
<script>
	$(document).ready(function () {
		Paket.sesiApp = "<?= $this->session->userdata('id_peserta_peserta') ?>";
		Paket.siteUrl = "<?= site_url() ?>";
		Paket.apiUrl = "<?= site_url_api() ?>";
		Paket.init();
	});
</script>