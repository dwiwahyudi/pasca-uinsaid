<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xs-12">
                    <form id="profile_mhs" name="profile_mhs" enctype="multipart/form-data">
                    <div class="card card-primary">
                        <div class="card-header">Data Mahasiswa</div>
                        <div class="card-body">
                            <div id="alert"></div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">                                    
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">NIM <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12"><input type="text" name="nim"
                                                id="nim" class="form-control" value="<?php echo $data->nim; ?>" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Nama lengkap <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><input type="text" name="nama"
                                                id="nama" class="form-control required" value="<?php echo $data->nama; ?>" placeholder="Nama lengkap tanpa gelar" readonly></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Tempat lahir <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><input type="text" name="tempat_lahir"
                                                id="tempat_lahir" class="form-control required"
                                                value="<?php echo $data->tempat_lahir; ?>" placeholder="Tempat lahir"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Tanggal lahir <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><input type="date"
                                                name="tgl_lahir" id="tgl_lahir" class="form-control required"
                                                value="<?php echo $data->tgl_lahir; ?>" placeholder="Tanggal lahir"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Alamat <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <textarea name="alamat" id="alamat required" rows="3" class="form-control"
                                                style="resize:none" placeholder="Alamat lengkap sesuai KTP"><?=$data->alamat;?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">RT/RW <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                            <input type="number" class="form-control required" id="rt" name="rt" placeholder="RT" value="<?=$data->rt;?>" min="1">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                            <input type="number" class="form-control required" id="rw" name="rw" placeholder="RW" value="<?=$data->rw;?>" min="1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Negara <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                                            <select name="negara" id="negara" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                                foreach($negara->result() as $n){
                                                    if($n->nama == $data->negara){
                                                        echo "<option value='".$n->nama."' selected>".$n->nama."</option>";
                                                    }else{
                                                        echo "<option value='".$n->nama."'>".$n->nama."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Propinsi <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                                            <select name="id_propinsi" id="id_propinsi" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                                foreach($propinsi->result() as $p){
                                                    if($p->id == $data->id_propinsi){
                                                        echo "<option value='".$p->id."' selected>".$p->propinsi."</option>";
                                                    }else{
                                                        echo "<option value='".$p->id."'>".$p->propinsi."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Kota/Kabupaten <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                                            <select name="id_kota" id="id_kota" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                                foreach($kota->result() as $k){
                                                    if($k->id == $data->id_kota){
                                                        echo "<option value='".$k->id."' selected>".$k->kota."</option>";
                                                    }else{
                                                        echo "<option value='".$k->id."'>".$k->kota."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Kecamatan <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                                            <select name="id_kecamatan" id="id_kecamatan" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                                foreach($kecamatan->result() as $kec){
                                                    if($kec->id == $data->id_kecamatan){
                                                        echo "<option value='".$kec->id."' selected>".$kec->kecamatan."</option>";
                                                    }else{
                                                        echo "<option value='".$kec->id."'>".$kec->kecamatan."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Desa/Kelurahan <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                                            <select name="id_kelurahan" id="id_kelurahan" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                                foreach($kelurahan->result() as $kel){
                                                    if($kel->id == $data->id_kelurahan){
                                                        echo "<option value='".$kel->id."' selected>".$kel->kelurahan."</option>";
                                                    }else{
                                                        echo "<option value='".$kel->id."'>".$kel->kelurahan."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Kode Pos <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12"><input type="text"
                                                name="kdpos" id="kdpos" class="form-control"
                                                value="<?php echo $data->kdpos; ?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Email <span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><input type="text"
                                                name="email" id="email" class="form-control required"
                                                value="<?php echo $data->email; ?>" placeholder="Alamat email aktif. Contoh: jhon@site.com"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">No HP/WA<span
                                                class="text-danger">*</span></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><input type="text" name="hp"
                                                id="hp" class="form-control number required" value="<?php echo $data->hp; ?>" placeholder="Nomor HP -> Harus berupa angka!">
                                                <div id="errmsg"></div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Media sosial<br><span class="text-danger">**) Minimal diisi salah satu</span></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-instagram"></i></span></div>
                                                <input type="text" class="form-control" name="medsos_ig" id="medsos_ig" value="<?=$data->medsos_ig;?>" placeholder="Intagram">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-twitter"></i></span></div>
                                                <input type="text" class="form-control" name="medsos_x" id="medsos_x" value="<?=$data->medsos_x;?>" placeholder="Twitter/X">
                                            </div>
                                            
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-facebook-f"></i></span></div>
                                                <input type="text" class="form-control" name="medsos_fb" id="medsos_fb" value="<?=$data->medsos_x;?>" placeholder="Facebook">
                                            </div>
                                        </div>       
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Jarak tempuh ke kampus</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <input type="text" class="form-control" name="jarak" id="jarak"value="<?=$data->jarak;?>">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-8">KM</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Waktu tempuh ke kampus</div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <input type="text" class="form-control" name="waktu" id="waktu" value="<?=$data->waktu;?>">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-8">Menit</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group"><label for="foto">Foto Resmi</label><input type="file"
                                            class="form-control" id="foto" name="foto" <?=$data->foto == null || $data->foto == ''?'required':'';?>>
                                    
                                            <div id="imgFrame" style="text-align:center">
                                        <?php
                                        if($data->foto !== null && $data->foto !== ''){
                                            echo '<img id="imgPreview" src="'.base_url().'assets/foto/'.$data->foto.'" alt="pic" class="col-12" style="max-width:300px"/>';
                                        }else{
                                            echo '<img id="imgPreview" src="#" alt="pic" class="col-12" style="max-width:300px; display:none"/>';   
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Program Studi <span class="text-danger">*</span></label>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">: <?=$data->prodi;?>
                                            <select name="id_prodi" id="id_prodi" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                                foreach($prodi as $pr){
                                                    if($pr->id_prodi == $data->id_prodi){
                                                        echo "<option value='".$pr->id_prodi."' selected jenjang='".$pr->jenjang."'>".$pr->prodi."</option>";
                                                    }else{
                                                    echo "<option value='".$pr->id_prodi."' jenjang='".$pr->jenjang."'>".$pr->prodi."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Angkatan/Tahun masuk <span class="text-danger">*</span></label>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">: <?=$data->thn_masuk;?>
                                            <select name="thn_masuk" id="thn_masuk" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                            $s = date("Y") - 8;
                                            for($i = $s;$i<=date("Y");$i++){
                                              if($data->thn_masuk == $i){
                                              echo "<option value='".$i."' selected>".$i."</option>";
                                              }else{
                                              echo "<option value='".$i."'>".$i."</option>";
                                              }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Semester <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">: <?=$data->sms_masuk == '1'?'Ganjil':'Genap';?>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="sms_masuk1" name="sms_masuk" value="1" <?php if($data->sms_masuk == '1'){ echo "checked";} ?>>
                                                    <label for="sms_masuk1">Ganjil 
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="sms_masuk2" name="sms_masuk" value="2" <?php if($data->sms_masuk == '2'){ echo "checked";} ?>>
                                                    <label for="sms_masuk2">Genap
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-12">Semester Aktif <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">: <?=$data->semester;?>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="sms_masuk1" name="sms_masuk" value="1" <?php if($data->sms_masuk == '1'){ echo "checked";} ?>>
                                                    <label for="sms_masuk1">Ganjil 
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="sms_masuk2" name="sms_masuk" value="2" <?php if($data->sms_masuk == '2'){ echo "checked";} ?>>
                                                    <label for="sms_masuk2">Genap
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        <!-- </div> -->
                        <!-- <div class="card-header">Penelitian</div> -->
                        <!-- <div class="card-body"> -->
                            
                            <!-- <div class="border-top pt-2"><h3>Penelitian</h3></div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Status penelitian</div>
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
                                            <?php
                                            if($data->status_penelitian == '' || $data->status_penelitian == null){
                                                $indx = 0;
                                            }else{
                                                $indx = $data->status_penelitian;
                                            }
                                            $stat_s2 = array('BELUM SEMINAR PROPOSAL','SUDAH SEMINAR PROPOSAL','SUDAH UJIAN TESIS/LULUS','SUDAH UJIAN/SIDANG TERTUTUP','SUDAH SIDANG TERBUKA/LULUS');
                                            $stat_s3 = array('BELUM SEMINAR PROPOSAL','SUDAH SEMINAR PROPOSAL','SUDAH SEMINAR HASIL','SUDAH UJIAN/SIDANG TERTUTUP','SUDAH SIDANG TERBUKA/LULUS');
                                            echo '<h1 class="text-danger">'.$data->jenjang == 'S2'?$stat_s2[$indx]:$stat_s3[$indx].'</h1>';
                                            // echo $data->status_penelitian;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Judul Penelitian</div>
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12"><input name="judul" id="judul" class="form-control" value="<?=$data->judul;?>" placeholder="Judul penelitian tesis/disertasi"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Pembimbing I <?=$data->jenjang == 'S3'?"/ Promotor":"";?></div>
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12"><input type="text" name="nm_pemb1" readonly="readonly" id="nm_pemb1" class="form-control" value="<?=$data->nm_pemb1;?>"></div>
                                    </div>
                                    <?php
                                    if($data->jenjang == 'S3'){
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Pembimbing II <?=$data->jenjang == 'S3'?"/ Co-Promotor":"";?></div>
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12"><input type="text" name="nm_pemb2" readonly="readonly" id="nm_pemb1" class="form-control" value="<?=$data->nm_pemb1;?>"></div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div class="form-group"><button type="button" class="btn btn-primary" id="save">Simpan</button> <button class="btn btn-secondary" type="reset">Reset</button></div>
                        </div>
                        <!-- <div class="card-header">Ganti Password</div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-8">
                              <div class="form-group row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Password Baru</div>
                                <div class="col-lg-8 col-md-8 col-xs-12">
                                <input type="password" id="password" class="form-control">
                                          </div>
                              </div>
                            </div>
                          </div>
                        </div> -->
                    </div>
                    <?php
// echo $this->session->userdata('uid')."<br>".$this->session->userdata('passwd')."<br>".$this->session->userdata('acc_type');
?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>