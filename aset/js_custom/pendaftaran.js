var Pendaftaran = function () {

	var url_api = "";
	var site_url = "";

	var resetMetode = function () {
		$('#kode').val("-");
		$('#jns_metode').val("-");
		$('#ket').html("-");
	}
	
	return {

		urlApi: "",
		siteUrl: "",
		init: function () {
			url_api = this.urlApi;
			site_url = this.siteUrl;
		},
		cekHargaPaket: function () {
			$('.modal-body').empty();
			var id = $('#id_paket').val();
			if (id === "") {
				$('#harga_paket').html(Konversi.kerupiah(0));
				$('#btnDetail').attr('data-id', null);
				$('#btnDetail').attr('disabled', true);
			}else{
				$.post(url_api+"datapaket", {id_paket: id}, function (res) {
					$('#harga_paket').html(Konversi.kerupiah(res.data[0].hrg_paket));
					$('#btnDetail').attr('data-id', res.data[0].id_paket);
					$('#btnDetail').attr('disabled', false);
				});
			}
		},
		detail: function () {
			$('#btnDetail').on('click', function () {
				$.post(url_api+"datapaket", {id_paket: $('#id_paket').val()}, function (res) {
					$('.modal-body').html(res.data[0].dtl_paket);
					$('#detailPaket').modal();
					// console.log($('#id_paket').val());
				});
			});
		},
		metodeDetail: function () {
			resetMetode();
			var id = $('#id_metode').val();
			if (id !== "") {
				$.post(url_api+"datametode", {id_metode: id}, function (res) {
					$('#kode').val(res.data[0].kode);
					$('#jns_metode').val(res.data[0].jns_metode);
					$('#ket').html(res.data[0].ket);
				});
			}
			return;
		},
		tombolDaftar: function () {
			$('#form-upload').on("submit", function(e) {
				e.preventDefault();
				$.ajax({
					url: $(this).attr("action"),
					type: $(this).attr("method"),
					data: new FormData(this),
					processData: false,
					contentType: false,
					success: function (data, status) {
						console.log(data);
						Swal.fire({
						  title: data.teks,
						  icon: (data.status === 201) ? 'success' : 'error',
						  confirmButtonText: 'OK',
						}).then((result) => {
						  if (result.value) {
						  	if (data.status === 201) {
							    window.location.href = site_url+"daftar_latihan";
						    	return;
						  	}
						  	return;
						  }
						});
					},
					error: function (xhr, desc, err) {
						console.log(desc);
					}
				});
			});
		}

	}

}();