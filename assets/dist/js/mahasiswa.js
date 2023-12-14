$(document).ready(function(){
    var BASE_URL = $("base").attr("href");
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        }
        else {
            return true;
        }
    }

    $(function(){
        $(".number").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           $("#errmsg").html("Input harus berupa angka").stop().show().fadeOut(1700);
           return false;
         }
        });
     });

    if($("#profile_mhs").length){
        $("#propinsi").change(function() {
            $("#kota option").remove();
            $("#kecamatan option").remove();
            $("#kelurahan option").remove();
            $.post(BASE_URL + 'mahasiswa/get_kota/' + $(this).val(), function(result) {
                var res = JSON.parse(result);
                var opt = '<option selected></option>';
                $.each(res, function(i, item) {
                    opt += "<option value='" + item.id + "' data-okr='"+item.city_id+"'>" + item.kota + "</option>";
                });
                $("#kota").append(opt);
            });
        });
        $("#kota").change(function() {
            $("#kecamatan option").remove();
            $("#kelurahan option").remove();
            $.post(BASE_URL + 'mahasiswa/get_kecamatan/' + $(this).val(), function(result) {
                var res = JSON.parse(result);
                var opt = '<option selected></option>';
                $.each(res, function(i, item) {
                    opt += "<option value='" + item.id + "'>" + item.kecamatan + "</option>";
                });
                $("#kecamatan").append(opt);
            });
        });
        $("#kecamatan").change(function() {
            $("#kelurahan option").remove();
            $.post(BASE_URL + 'mahasiswa/get_kelurahan/' + $(this).val(), function(result) {
                var res = JSON.parse(result);
                var opt = '<option selected></option>';
                $.each(res, function(i, item) {
                    opt += "<option value='" + item.id + "'>" + item.kelurahan + "</option>";
                });
                $("#kelurahan").append(opt);
            });
        });

        $('#foto').change(function(){
            const file = this.files[0];
            // console.log(file);
            if (file){
              let reader = new FileReader();
              reader.onload = function(event){
                // console.log(event.target.result);
                // $("#imgFrame").show();
                $('#imgPreview').attr('src', event.target.result).show();
                // $('#imgPreview').attr('src', event.target.result);
              }
              reader.readAsDataURL(file);
            }
        });
        $("#email").on('blur',function(){
            $(this).next("span").remove();
            if($(this).val() !== '' && !IsEmail($(this).val())){
                $("<span class='text-danger'>Email tidak valid!</span>").insertAfter("#email");
                $(this).focus();
            }
        });

        $("#save").on('click',function(){
            var err = false;
            // $("<span class='text-danger'>Tidak boleh kosong!</span>").insertAfter('#nama');
            $(".required").each(function(){
                if($(this).val() == ''){
                    $(this).addClass('is-invalid');
                    err = true;
                }else{
                    $(this).removeClass('is-invalid');
                }
            });

            if(err == true){
                $("#alert").html('<i class="fas fa-times-circle"></i> Ada data yang belum lengkap. Periksa ulang data isian Anda!').addClass('alert alert-danger');
            }else{
                // alert($("#id_prodi option:selected").attr('jenjang'));
                var form = $("form#profile_mhs");
			    var formdata = false;
			    if (window.FormData){
			        formdata = new FormData(form[0]);
                    formdata.append("kelurahan",$("select#id_kelurahan option:selected").text());
                    formdata.append("kecamatan",$("select#id_kecamatan option:selected").text());
                    formdata.append("kota",$("select#id_kota option:selected").text());
                    formdata.append("propinsi",$("select#id_propinsi option:selected").text());
                    formdata.append("prodi",$("select#id_prodi option:selected").text());
                    formdata.append("jenjang",$("select#id_prodi option:selected").attr('jenjang'));
			    }
                $.ajax({
                    url:BASE_URL+'mahasiswa/save_profile/'+$("#nim").val(), //URL submit
                    type:"post", //method Submit
                    data:formdata, //penggunaan FormData
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data, textStatus, jqXHR){
                          // alert("Upload Image Berhasil."); //alert jika upload berhasil
                        //   alert(data);
                        var r = JSON.parse(data);
                        if(r.status == 'done'){
                            Swal.fire({
                                text: "Data berhasil disimpan",
                                icon: "success",
                            })
                            .then(function () {
                                // location.href = BASE_URL + "account/profile";
                                location.reload();
                            });
                    	}else{
                            Swal.fire({
                                title: "Data gagal di simpan",
                                text: r.msg,
                                icon: "error",
                            });
                    	}
                    }
                });              
            }
        });
    }

    if($("#change_password").length){
        $("#save_password").on('click',function(){
            if($("#password").val() == ""){
                $("#alert").html("Password tidak boleh kosong!").addClass('alert alert-danger');
            }
            else if($("#password").val().length < 6){
                $("#alert").html("Password minimal 6 karakter!").addClass('alert alert-danger');
            }
            else if($("#password").val() !== $("#repassword").val()){
                $("#alert").html("Password tidak sama!").addClass('alert alert-danger');
            }else{
                $("#alert").html("").removeClass('alert alert-success alert-danger');
                $.post(BASE_URL+'mahasiswa/save_password/'+$("#nim").val(),{password:$("#password").val()},function(result){
                    if(result == 'done'){
                        $("#alert").html("Password berhasil diubah!").addClass('alert alert-success');
                        setTimeout(function(){location.reload();},1000);
                    }else{
                        $("#alert").html("Password gagal diubah!\n"+result).addClass('alert alert-danger');
                    }
                });
            }
        });
    }
    if($("#daftar-mahasiswa").length){
       $("#daftar-mahasiswa").DataTable({
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            ajax : BASE_URL+'mahasiswa/get_mahasiswa/',
            serverside : true,
            processing : true,
            columns:[
                {data:"no"},
                {data:"nim"},
                {data:"nama"},
                {data:"prodi"},
                {data:"thn_masuk"},
                {data:"kota"},
                {data:"nim",
                    render: function (data, type, row, meta) {
                        return (
                            '<a href="' +
                            BASE_URL +
                            "mahasiswa/edit/" +
                            data +
                            '" title="Edit" class="btn btn-sm btn-primary">Edit</a>'
                        );
                    }
                }
            ],
        });
    }
});