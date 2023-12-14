$(document).ready(function () {
	var BASE_URL = $("base").attr("href");
	if ($("#form-permohonan").length) {
		$("#jns_surat").on("change", function () {
			$.post(
				BASE_URL + "surat/get_req_dokumen/" + $(this).val(),
				function (result) {
					$("#req_dokumen").html(result);
				}
			);
		});

		$("#simpan_permohonan").on("click", function () {
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
				var form = $("form#form-permohonan");
				var formdata = false;
				if (window.FormData) {
					formdata = new FormData(form[0]);
				}
				$.ajax({
					url: BASE_URL + "surat/simpan_permohonan/", //URL submit
					type: "post", //method Submit
					data: formdata, //penggunaan FormData
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function (data, textStatus, jqXHR) {
						var r = JSON.parse(data);
						if (r.status == "done") {
							Swal.fire({
								text: "Data berhasil disimpan",
								icon: "success",
							}).then(function () {
								location.href = BASE_URL + "surat/riwayat_permohonan/";
							});
						} else {
							Swal.fire({
								title: "Data gagal di simpan",
								text: r.msg,
								icon: "error",
							});
						}
					},
				});
			}
		});
	}

	if($("#detail-surat").length){
		$("#tolak").on("click",function(){
			$("#alert").html('').removeClass("alert alert-danger alert-success");
			if($("#catatan").val() == ""){
				$("#alert").html("Tambahkan catatan/komentar penolakan!").addClass('alert alert-danger');
				$(this).addClass('is-invalid');
			}else{
				$.post(BASE_URL+'surat/set_proses/tolak/',{id:$("#id").val(),catatan:$('#catatan').val()},function(result,status){
					if(status == 'success' && result =='done'){
						$("#alert").html('Berhasil disimpan').addClass("alert alert-success");
					}else{
						$("#alert").html('Gagal disimpan\n'+result).addClass("alert alert-danger");
					}
				});
			}
		});

		$("#terima").on('click',function(){
			$.post(BASE_URL+'surat/set_proses/terima/',{id:$("#id").val(),catatan:$('#catatan').val()},function(result,status){
				if(status == 'success' && result =='done'){
					$("#alert").html('Berhasil disimpan').addClass("alert alert-success");
					window.open(BASE_URL+'surat/cetak/cuti/'+$("#id").val(),'newwindow',"fullscreen=no,width=1000"); 
				}else{
					$("#alert").html('Gagal disimpan\n'+result).addClass("alert alert-danger");
				}
			});
		});
	}

	if($("#form-proses-permohonan").length){
		// $("#nim").on('blur', function(){
		// 	if($(this).val() !== ''){
		// 		var nim = $(this).val();
		// 		$.post(BASE_URL+'mahasiswa/get_mahasiswa2/'+nim+'/json/',function(result){
		// 			var d = JSON.parse(result);
		// 			if(d.length == 1){
		// 				$("#nama").val(d[0]['nama']);
		// 				$("#id_prodi").val(d[0]['id_prodi']);
		// 				$("#prodi").val(d[0]['prodi']);
		// 			}
		// 			// var d = $.parseJSON(result);
		// 			// $("#alert").html(d[0]['nama']).addClass('alert alert-danger');
		// 			// alert(result);
		// 		});
		// 	}
		// });

		$("#save").on("click",function(){
			$("#alert").html('').removeClass("alert alert-danger alert-success");
			var err = false;
			$(".required").each(function () {
				if ($(this).val() == "") {
					$(this).addClass("is-invalid");
					err = true;
				} else {
					$(this).removeClass("is-invalid");
				}
			});
			if($("input[type='radio']:checked").val() == 'undefined'){
				err = true;
			}

			if (err == true) {
				$("#alert")
					.html(
						'<i class="fas fa-times-circle"></i> Ada data yang belum lengkap. Periksa ulang data isian Anda!'
					)
					.addClass("alert alert-danger");
			} else {
				var url = BASE_URL + "surat/proses_permohonan_save/"+$("#id_permohonan").val();
				var form = $("form#form-cuti");
				var formdata = false;
				var jns_surat = $("#id_jns_surat").val();
				var slug = $("#id_jns_surat").attr('slug');
				if (window.FormData) {
					formdata = new FormData(form[0]);
					formdata.append('nip',$("select#pejabat option:selected").val());
					formdata.append('nm',$("select#pejabat option:selected").attr('nm'));
					formdata.append('jbt',$("select#pejabat option:selected").attr('jbt'));
				}
				var u = '?';
				if($("#ttd").is(':checked')){
					u+="ttd=1&";
				}
				if($("#cap").is(':checked')){
					u+="cap=1&"
				}
				$.ajax({
					url: url, //URL submit
					type: "post", //method Submit
					data: formdata, //penggunaan FormData
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function (data, textStatus, jqXHR) {
					var d = JSON.parse(data);
						if(d['status'] == 'success'){
							$("#alert").html('<i class="fas fa-check-circle"></i> Berhasil disimpan').addClass("alert alert-success");
							window.open(BASE_URL+'surat/cetak/'+slug+'/'+$("#id_permohonan").val()+'/'+d['msg']+'/'+u,'newwindow',"fullscreen=no,width=1000");
							location.href = BASE_URL + "surat/riwayat_permohonan/";
						}else{
							$("#alert").html('<i class="fas fa-times-circle"></i> Gagal disimpan\n'+d['msg']).addClass("alert alert-danger");
						}
					}
				});
			}
		});
	}

	if($("#daftar-permohonan").length){
        $("#daftar-permohonan").DataTable({
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
			"order" : [[0,'desc']]
        });
    }

	if($("#rekam_surat_keluar").length){
		$("#id_jns_surat").on('change',function(){
			// alert($(this).find('option:selected').val());
			var slug = $(this).find('option:selected').attr('slug');
			
			$("#load").load(BASE_URL+"surat/surat_"+slug);
		});

		// $("#")
	}
});
