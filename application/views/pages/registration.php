<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Registrasi data mahasiswa baru</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container">
        <!-- <div class="card card-info"> -->
        <!-- <div class="card-header"> -->
        <!-- <h3 class="card-title">Horizontal Form</h3> -->
        <!-- </div> -->
        <form id="formRegistration" name="formRegistration action="">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Mahasiswa</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Nama lengkap <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-8"><input type="text" class="form-control" name="nama" id="nama"></div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">NIM <span class="text-danger">*</span></label>
                        <div class="col-lg-5 col-md-5"><input type="text" class="form-control" name="nim" id="nim"></div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Alamat</label>
                        <div class="col-lg-9 col-md-8">
                            <textarea name="alamat" id="alamat" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Program Studi <span class="text-danger">*</span></label>
                        <div class="col-lg-3 col-md-4">
                            <select name="iid_prodi" id="id_prodi" class="form-control">
                                <option value=""></option>
                                <?php
                                foreach($prodi->result() as $p){
                                    echo "<option value='".$p->id_prodi."'>".$p->prodi."</option>";
                                }
                                ?>
                            </select></div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Angkatan <span class="text-danger">*</span></label>
                        <div class="col-lg-2 col-md-3">
                            <select name="thn_angkat" id="thn_angkat" class="form-control">
                                <option value=""></option>
                                <?php
for ($i = (date("Y") - 6); $i <= date("Y"); $i++) {
    echo "<option value='" . $i . "'>" . $i . "</option>";
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Semester <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-8">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="semester" name="1" checked="">
                                    <label for="semester">Ganjil</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="semester" name="2">
                                    <label for="semester">Genap</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Email <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-8"><input type="text" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">WA aktif <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-8"><input type="text" name="wa" id="wa" class="form-control"></div>
                    </div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">Akun</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Username <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-8"><input type="text" class="form-control" name="username"
                                id="username"></div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Password <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-8"><input type="password" class="form-control" name="password"
                                id="password"><small>Minimal 6 karakter</small></div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-md-4">Retype Password <span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-md-8"><input type="password" class="form-control" name="password2"
                                id="password2"></div>
                    </div>
                </div>
            </div>
            <div class="card-body2">
                <div class="row">
                    <button type="button" id="save" class="btn btn-success mx-2">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>