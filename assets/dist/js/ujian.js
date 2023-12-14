$(document).ready(function () {
	var BASE_URL = $("base").attr("href");
    

    if($("form#form-sempro,form#form-tesis,form#form-semhas,form#form-ujtertutup,form#form-ujterbuka").length){
        $("#save").on("click",function(){
            var form = $(this).closest("form").attr("id");
            var jns_ujian = $(this).closest("form").attr("type");
            var err = false;
			$(".required").each(function () {
				if ($(this).val() == "") {
					$(this).addClass("is-invalid");
					err = true;
				} else {
					$(this).removeClass("is-invalid");
				}
			});

			if (err == true) {
				$("#alert")
					.html(
						'<i class="fas fa-times-circle"></i> Ada data yang belum lengkap. Periksa ulang data isian Anda!'
					)
					.addClass("alert alert-danger");
			} else {
				var form = $("form#"+form);
				var formdata = false;
				if (window.FormData) {
					formdata = new FormData(form[0]);
				}

                $.ajax({
					url: BASE_URL + "ujian/pendaftaran/"+jns_ujian+"/"+$("#nim").val(), //URL submit
					type: "post", //method Submit
					data: formdata, //penggunaan FormData
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function (response, textStatus, jqXHR) {
						// var r = JSON.parse(data);
						if (response == "done") {
							Swal.fire({
                                title: "Berhasil",
								text: "Pendaftaran ujian seminar proposal telah diajukan. Jadwal ujian dapat dilihat pada menu Jadwal Ujian!",
								icon: "success",
							}).then(function () {
								location.href = BASE_URL + "ujian/jadwal/";
							});
						} else {
							Swal.fire({
								title: "Data gagal di simpan",
								text: response,
								icon: "error",
							});
						}
					},
				});
            }

            // if($("#pembimbing1").val() == null || $("#pembimbing1").val() == ''){
            //     $("#alert").html('<i class="fas fa-times-circle"></i> Pembimbing 1 belum dipilih!').addClass("alert alert-danger");
            //     $("#pembiming1").focus();
            // }else if($("#pembimbing2").val()  == null || $("#pembimbing2").val()  == ''){
            //     $("#alert").html('<i class="fas fa-times-circle"></i> Pembimbing 2 belum dipilih!').addClass("alert alert-danger");
            //     $("#pembiming2").focus();
            // }else if($("#judul").val() == ''){
            //     $("#alert").html('<i class="fas fa-times-circle"></i> Judul penelitian tidak boleh kosong!').addClass("alert alert-danger");
            //     $("#judul").focus();
            // }else if($("#dokumen").val() == ''){
            //     $("#alert").html('<i class="fas fa-times-circle"></i> Dokumen proposal tidak boleh kosong!').addClass("alert alert-danger");
            //     $("#dokumen").focus();
            // }else {
            //     $.post(BASE_URL+'ujian/pendaftaran/sempro',$('#form-sempro').serialize(),function(result){
            //         if(result == 'done'){
            //             Swal.fire({
            //                 text: "Pendaftaran ujian seminar proposal telah diajukan. Jadwal ujian dapat dilihat pada menu Jadwal Ujian!",
            //                 icon: "success",
            //             }).then(function () {
            //                 location.href = BASE_URL + "surat/riwayat/";
            //             });
            //         }else{
            //             $("#alert").html('<i class="fas fa-times-circle"></i> Pendaftaran gagal! '+result).addClass("alert alert-danger");
            //         }
            //     });
            // }
        });
    }
    
});