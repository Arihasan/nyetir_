var Daftar = function () {

	var site_url = "";

	var cekInput = function () {
		if ( $('#nik').val() === "" || 
				 $('#nm_lgkp').val() === "" || 
				 $('#no_hp').val() === "" ||
				 $('#email').val() === "" ||
				 $('#alamat').val() === "" ||
				 $('#sandi').val() === ""
		) {
			return false;
		}
		return true;
	}
	
	return {

		siteUrl: "",
		init: function () {
			site_url = this.siteUrl;
		},
		ulangiSandi: function () {
			$('#ulangi_sandi').keyup(function (e) {
				$('#btnDaftar').attr('disabled', true);
				if ( $(this).val() !== $('#sandi').val() ) {
					$(this).addClass('border border-danger');
					return;
				}
				$('#btnDaftar').attr('disabled', false);
				$(this).removeClass('border border-danger');
			});
		},
		tombolMasuk: function () {
			$('#form-daftar').on('submit', function (e) {
				e.preventDefault();
				if ( cekInput() ) {
					$('#btnDaftar').attr('disabled', true);
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
								confirmButtonText: 'OK',
							}).then((result) => {
							  if (result.value) {
							    if (data.status === 201) {
							    	window.location.href = site_url+"masuk";
							    	return;
							    }
									$('#btnDaftar').attr('disabled', false);
							    return;
							  }
							}); // penutup Swal
						}, // penutup success
						error: function (xhr, desc, err) {
							console.log(desc);
						}
					}); // penutup ajax
				} // penutup if
			}); // penutup form submit
		}

	}

}();