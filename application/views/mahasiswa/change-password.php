<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ganti Password</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-12 col-lg-12">
                            <div id="alert"></div>
                        </div>
                    </div>
                    <form action="" class="form" id="change_password">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3">Nama</div>
                                <div class="col-lg-9">: <?=$data->nama;?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3">Username</div>
                                <div class="col-lg-9">: <?=$data->username;?><input type="hidden" name="nim" id="nim" value="<?=$data->nim;?>" class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3">Password</div>
                                <div class="col-lg-5"><input type="password" name="password" id="password" class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3">Retype Password</div>
                                <div class="col-lg-5"><input type="password" name="repassword" id="repassword" class="form-control"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-5">
                                    <button type="button" class="btn btn-primary" id="save_password">Simpan</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">* Password minimal 6 karekter</div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>