var DaftarLatihan = function () {
	
	var url_api = "";
	var site_url = "";
	var tabel = null;

	var stts_daftar = [
		'Menunggu Pembayaran',
		'Menunggu Verifikasi',
		'Pembayaran Berhasil',
		'Menunggu Jadwal',
	];

	var loadData = function () {
		resetTabel();
		$.post(url_api+"datapendaftaran", {}, function (res) {
			// console.log(res.data);
			buatTabel(res.data);
		});
	}

	var buatTabel = function (data) {
		var html = "";
		data.forEach( function (item, index) {
			html += `<tr>
				<td><b>${++index}</b></td>
				<td>
					<a href="${site_url}paket/${item.id_paket}" class="btn btn-sm btn-primary" target="_blank"><b>${item.nm_paket}</b></a>
				</td>
				<td><b>${item.jns_mobil}</b></td>
				<td><b>${item.tgl_jemput}</b></td>
				<td><b>${item.nm_metode}</b></td>
				<td>`;
			if (!item.sc_bukti) {
				html += `<button type="button" class="btn btn-sm btn-success btnUpload" data-id="${item.id_daftar}" data-toggle="modal" data-target="#uploadBukti"><b>Upload Bukti</b></button>`;
			}else{
				html += `<div class="badge badge-info">${stts_daftar[item.stts_daftar]}</div>`;
			}
			html += ` <a href="${url_api}cetak/invoice/${item.id_daftar}" class="btn btn-sm btn-info" target="_blank"><b>Cetak Invoice</b></a>`;
			html += ` <button type="button" class="btn btn-sm btn-warning btnDetail" data-id="${item.id_daftar}"><b>Detail</b></button>`;
			html += `</td>
			</tr>`;
		});
		$('#data-disini').html(html);
		tabel = $('#tabel').DataTable({
			"dom" : "frtp",
		});
		btnUpload();
		btnDetail();
	}

	var resetTabel = function () {
		$('#data-disini').empty();
		if (tabel) {
			tabel.destroy();
		}
	}

	var btnUpload = function () {
		$('.btnUpload').on('click', function () {
			$('#id_daftar').val(null);
			$('#id_daftar').val( $(this).data('id') );
		});
	}

	var uploadBukti = function () {
		$('#form-bukti').on("submit", function(e) {
			e.preventDefault();
			$.ajax({
				url: $(this).attr("action"),
				type: $(this).attr("method"),
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function (data, status) {
					console.log(data);
					$('#uploadBukti').modal('hide');
					loadData();
					Swal.fire({
						title: data.teks,
						text: (data.status === 200) ? 'Silahkan tunggu konfirmasi' : '',
					  icon: (data.status === 200) ? 'success' : 'error',
					});
				},
				error: function (xhr, desc, err) {
					console.log(desc);
					loadData();
					Swal.fire({
			      title: 'Gagal',
			      text: desc,
					  icon: 'error',
					});
				}
			});
		});
	}

	var resetDetail = function () {
		$('#detail-disini').empty();
	}

	var btnDetail = function () {
		resetDetail();
		$('.btnDetail').on('click', function () {
			$.post(url_api+"datapendaftaran/detail", {id_daftar: $(this).data('id')}, function (res) {
				$('#detail-disini').html(res);
				$('#detail').modal();
			});
		});
	}

	return {

		urlApi: "",
		siteUrl: "",
		init: function () {
			url_api = this.urlApi;
			site_url = this.siteUrl;
			loadData();
			uploadBukti();
		}

	}

}();