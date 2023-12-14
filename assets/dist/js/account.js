$(document).ready(function(){
    var BASE_URL = $("base").attr('href');
    $("#save").on('click',function(){
        if($("input,textarea,select").attr("require").val() == ''){
            $(this).append('<span class="text-danger">Harus di isi/di pilih!</span>');            
        }
    });

    if($("#signin-form").length){
        $("#uname").focus();
        $("button#signin2").on('click',function(){
            $("#alert").html("").removeClass("alert alert-danger alert-success");
            if($("#uname").val() == ''){
                $("#alert").html("<strong>Username</strong> can't be empty!").addClass("alert alert-danger");
                $("#uname").focus();
            }else if($("#password").val() == ''){                
                $("#alert").html("<strong>Password</strong> can't be empty!").addClass("alert alert-danger");
                $("#passwd").focus();
            }else if($("#type").val() == ''){                
                $("#alert").html("Choose <strong>account type</strong>, please!").addClass("alert alert-danger");
                $("#type").focus();
            }else{
                $("#alert").html("<i class=\"fas fa-circle-notch fa-spin text-primary text-center\"></i>").removeClass("alert alert-danger");
                $.post(BASE_URL+'account/signin/',$("#signin-form").serialize(), function(callback){
                    // alert(callback);
                    if(callback == 'done'){
                        $("#alert").html('Login successfully!').addClass('alert alert-success');
                        setTimeout(function () {
                            location.href=BASE_URL+"home/AuthUser/";
                        }, 300);
                    }else{
                        $("#alert").html(callback).addClass('alert alert-danger');
                    }
                })
            }
        });
    }

    if($("#profile-form").length){
        $("#save").on('click',function(){

        });
    }
});