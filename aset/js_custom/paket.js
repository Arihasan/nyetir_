var Paket = function () {
	
	var paket = null;
	var sesi = "";
	var siteurl = "";
	var apiurl = "";

	var ambilPaket = function () {
		$.post(apiurl+"datapaket", {}, function (res) {
			buatTampil(res.data);
			// console.log(res);
		});
	}

	var buatTampil = function (data) {
		var html = "";
		var col = 6;
		if (data.length === 1) {
			col = 12;
		}
		if (data.length > 2) {
			col = 4;
		}
		if (data.length > 0) {
			data.forEach(function (item, index) {
				html += `<div class="col-${col} p-3">
				<div class="card text-center border border-info">
				  <div class="card-header bg-info text-light">
				    <b>${item.nm_paket}</b>
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">${Konversi.kerupiah(item.hrg_paket)}</h5>
				    <p class="card-text">${potongDetail(item.dtl_paket)}</p>`;

				if (sesi !== "") {
					html += `<a href="${siteurl+"pendaftaran/"+item.id_paket}" class="btn btn-primary btn-block">Daftar</a>`;
				}else{
					html += `<div class="btn-group">
						<a href="${siteurl+"masuk"}" class="btn btn-danger">Masuk</a>
					  <a href="${siteurl+"daftar"}" class="btn btn-success">Daftar</a>
				  </div>`;
				}

				html += `</div>
				  <div class="card-footer text-muted bg-info">
				    <a href="${siteurl+"paket/"+item.id_paket}" class="btn btn-info btn-block"><b>Lihat Detail Paket</b></a>
				  </div>
				</div>
			</div>`;
			});
		}else{
			html += `<div class="col">
				<div class="card text-center">
				  <div class="card-header">
				    Non-paket
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">Belum ada paket aktif</h5>
			    </div>
				</div>
			</div>`;
		}
		$('#paket-disini').html(html);
	}

	var potongDetail = function (data, panjang=30) {
		if (data.length > panjang) {
			return data.trim().substring(0, panjang);
		}else{
			return data.trim();
		}
	}

	return {

		sesiApp: "",
		siteUrl: "",
		apiUrl: "",
		init: function () {
			sesi = this.sesiApp;
			apiurl = this.apiUrl;
			siteurl = this.siteUrl;
			ambilPaket();
		}

	}

}();