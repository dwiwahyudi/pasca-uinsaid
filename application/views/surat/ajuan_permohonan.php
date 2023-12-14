<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fab fa-wpforms text-kunyit"></i> Permohonan Surat Keterangan </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Surat</li>
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
                    <div class="card">
                        <div class="card-body bg-primary"><i class="fas fa-info-circle"></i> Silahkan isi dengan lengkap
                            formulir berikut</div>
                    </div>
                    <form id="form-permohonan" name="form-permohonan">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div id="alert"></div>
                                        <div class="form-group">Jenis surat
                                            <span class="text-danger">*</span>
                                            <select name="jns_surat" id="jns_surat" class="form-control required">
                                                <option value=""></option>
                                                <?php
                                                foreach($jns_surat->result() as $jns){
                                                    echo "<option value='".$jns->id_jns_surat."'>".$jns->jenis_surat."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">Keterangan
                                            <span class="text-danger">*</span>
                                            <textarea name="keterangan" id="keterangan" rows="4" class="form-control required"
                                                style="resize:none"></textarea>
                                        </div>
                                        <div class="form-group">Upload dokumen (.pdf)
                                            <span class="text-danger">*</span>
                                            <input type="file" name="dokumen" id="dokumen" class="form-control required">
                                            <span>
                                                * Dokumen harus berupa file PDF (.pdf) dengan ukuran maksimal 2MB 
                                            </span>
                                        </div>
                                        <div class="form-group"><button class="btn btn-success" id="simpan_permohonan" type="button">Simpan</button></div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-xs-12" style="padding-left:20px;">
                                        <h2><i class="fas fa-info-circle"></i> Info</h2>
                                        <p>Sebelum mengajukan permohonan surat keterangan, silahkan lengkapi data pribadi Anda pada halaman <a href="<?=base_url();?>profile/" class="">profil</a>!</p>
                                        <p>Isi formulir disamping dengan lengkap, kemudian unggah/upload dokumen/surat permohonan yang dibutuhkan, seperti yang disebutkan dibawah ini. Jika dokumen lebih dari 1, maka jadikan 1 file terlebih dahulu sebelum diunggah. Hal tersebut bisa dilakukan menggunakan tool <a href="https://ilovepdf.com" target="_blank">ILovePDF</a> pada menu Merge PDF</p>
                                            <!-- <p>Contoh dokumen/surat permohonan dapat diunduh pada halaman <a href="<?=base_url();?>surat/contoh/">Contoh Surat</a></p> -->
                                        <h3>Dokumen yang dibutuhkan:</h3>
                                        <p id="req_dokumen"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>