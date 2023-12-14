<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="far fa-clipboard text-kunyit"></i> Pendaftaran Ujian Tesis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Ujian</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?php
                    $error = false;
                    if(($data->jenjang == 'S2' && $data->nip_pemb1 == '') || ($data->jenjang == 'S3' && $data->nip_pemb1 == '' && $data->nip_pemb2 == '')){
                        echo "<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Anda belum mendapatkan <strong>Pembimbing/Promotor/Copromotor</strong>, sehingga Anda <strong>BELUM</strong> dapat mengajukan pendaftaran ujian. Silahkan menghubungi Bagian Akademik Pascasarjana UIN RM Said Surakarta. </div>";
                        $error = true;
                    }

                    if($ujian->num_rows() >= 1){
                        echo '<div class="alert alert-info"><i class="fas fa-info-circle"></i> Anda sudah mengajukan pendaftaran seminar proposal!</div>';
                        $error = true;
                    }

                    if($error == false){
                    ?>
                    
                    <div class="card">
                        <form id="form-sempro">
                            <!-- <div class="card-header">
                                <h4>Data Mahasiswa</h4>
                            </div> -->
                            <div class="card-body row">
                                <div class="col-12" id="alert"></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <h3>Data Mahasiswa</h3>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Nama</div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="text" id="nama_mhs" name="nama_mhs"
                                                    value="<?=$data->nama;?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">NIM <?=$this->session->userdata('nim');?></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="text" id="nim" name="nim" value="<?=$this->session->userdata('nim');?>"
                                                    class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Program Studi</div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="hidden" id="id_prodi" name="id_prodi" value="<?=$data->id_prodi;?>">
                                                <input type="hidden" id="jenjang" name="jenjang" value="<?=$data->jenjang;?>">
                                                <input type="hidden" id="jns_laporan" name="jns_laporan" value="<?=$data->jenjang == 'S2'?'tesis':'disertasi';?>">
                                                <input type="text" id="prodi" name="prodi" value="<?=$data->prodi;?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4"><?=$data->jenjang == 'S2'?'Pembimbing I':'Promotor';?> <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="text" id="nm_pemb1" class="form-control" name="nm_pemb1" value="<?=$data->nm_pemb1;?>" readonly>
                                                <input type="hidden" id="nip_pemb1" class="form-control" name="nip_pemb1" value="<?=$data->nip_pemb1;?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if($data->jenjang == 'S3'){
                                    ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Co-Promotor <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="text" id="nm_pemb2" class="form-control" name="nm_pemb2" value="<?=$data->nm_pemb2;?>" readonly>
                                                <input type="hidden" id="nip_pemb2" class="form-control" name="nip_pemb2" value="<?=$data->nip_pemb2;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Judul penelitian <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <textarea name="judul" id="judul" rows="2 " class="form-control required" style="resize:none" placeholder="Judul penelitian tesis/disertasi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">                                
                                    <div class="form-group">
                                        <h3>Upload Dokumen</h3>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Formulir Pendaftaran <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="file" name="dok_pendaftaran" id="dok_pendaftaran" class="form-control required" placeholder="Formulir pendaftaran">
                                            </div>
                                        </div>
                                    </div>                              
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Dokumen/buku bimbingan  <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="file" name="dok_bimbingan" id="dok_bimbingan" class="form-control required" placeholder="Berkas proposal">
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Lembar persetujuan pembimbing  <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="file" name="dok_persetujuan" id="dok_persetujuan" class="form-control required" placeholder="Berkas proposal">
                                            </div>
                                        </div>
                                    </div>                          
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Nota Pembimbing  <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="file" name="dok_nota" id="dok_nota" class="form-control required" placeholder="Berkas proposal">
                                            </div>
                                        </div>
                                    </div>                          
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Hasil cek plagiat/turnitin  <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="file" name="dok_turnitin" id="dok_turnitin" class="form-control required" placeholder="Hasil cek plagiat/turnitin">
                                            </div>
                                        </div>
                                    </div>                          
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Naskah proposal tesis/disertasi yang telah disetujui  <span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="file" name="dok_ujian" id="dok_ujian" class="form-control required" placeholder="Naskah ujian">
                                            </div>
                                        </div>
                                    </div>
                                                         
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">Bukti pembayaran UKT terakhir<span class="text-danger">*</span></div>
                                            <div class="col-lg-8 col-md-8">
                                                <input type="file" name="dok_keuangan" id="dok_keuangan" class="form-control required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-danger">
                                            *) Dokumen berupa file PDF (.pdf)<br>
                                            **) Maksimal 2MB
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <?php
                            // if($error == false){
                            ?>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" id="save">Simpan</button>        
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>