$(document).ready(function(){
    var BASE_URL = $("base").attr("href");
    if($(".datatable").length){
        $(".datatable").DataTable({
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        });
    }

    if($("select.dosen-select").length){
        $("select.dosen-select").select2({
            ajax: {
                url:BASE_URL+'dosen/get_dosen_list/',
                dataType:'json',
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
            },
            cache: true,
            placeholder: "Pilih nama dosen pembimbing Anda",
            allowClear: true
        });
    }

    if($("select.select-pejabat").length){
        $("select.select-pejabat").select2({
            ajax:{
                url: BASE_URL+'setup/get_pejabat_list/',
                dataType: 'json',
                data: function(params){
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function(response){
                    return{
                        results: response
                    };
                }
            },
            cache: true,
            placeholder: "Pilih nama pejabat",
            allowClear: true
        });
    }

    if($("select.select-mahasiswa").length){
        $("select.select-mahasiswa").select2({
            ajax:{
                url: BASE_URL+'setup/get_mahasiswa_list/',
                dataType: 'json',
                data: function(params){
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function(response){
                    return{
                        results: response
                    };
                }
            },
            cache: true,
            placeholder: "Masukkan NIM mahasiswa",
            allowClear: true
        });
    }
});