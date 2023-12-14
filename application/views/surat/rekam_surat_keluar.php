<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fab fa-wpforms text-kunyit"></i> Rekam Surat Keluar</h1>
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
    <section class="content" id="rekam_surat_keluar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                            <div class="col-6">
                            <select name="id_jns_surat" id="id_jns_surat" class="form-control">
                                <option value=""></option>
                                <?php
                                foreach($jns_surat as $jns){
                                    echo "<option value='".$jns->id_jns_surat."' slug='".$jns->slug."'>".$jns->jenis_surat."</option>";
                                }
                                ?>
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-6"><button type="button" class="btn btn-primary">Selanjutnya</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="">
                        <div class="card-body">
                            <div id="load"></div>
                        </div>
                    </div>
                    <div class="card" id="cuti_akademik" style="display:none">
                        <div class="card-body">
                            <form class="form" id="form-cuti">
                                <div id="alert"></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">NIM</div>
                                        <div class="col-4">
                                        <input type="hidden" name="id_permohonan" id="id_permohonan" class="form-control required" value="<?=!isset($data->id)?'':$data->id;?>">    
                                        <input type="text" name="nim" id="nim" class="form-control required" value="<?=!isset($data->nim)?'':$data->nim;?>" placeholder="Masukkan NIM mahasiswa"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Nama</div>
                                        <div class="col-8"><input type="text" name="nama" id="nama" class="form-control required" value="<?=!isset($data->nama)?'':$data->nama;?>" readonly></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Prodi</div>
                                        <div class="col-4">
                                            <input type="hidden" id="id_prodi" name="id_prodi" value="<?=isset($data->id_prodi)?$data->id_prodi:'';?>">
                                            <input type="text" name="prodi" id="prodi" class="form-control" value="<?=isset($data->prodi)?$data->prodi:'';?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Nomor surat</div>
                                        <div class="col-1"><input type="text" name="no_surat" id="no_surat" class="form-control required" placeholder="Nomor"></div>
                                        <div class="col-5"><input type="text" name="ext_surat" class="form-control required" id="ext_surat" placeholder="Ekstensi"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Tanggal surat</div>
                                        <div class="col-lg-3 col-md-3 col-sm-5"><input type="date" name="tgl_surat" id="tgl_surat" class="form-control required" placeholder="Tanggal Surat" value="<?=isset($data->tgl_surat)?$data->tgl_surat:date("Y-m-d");?>"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Cuti Untuk Semester</div>
                                        <div class="col-8">
                                            <!-- <input type="text" name="semester" id="semester" class="form-control"> -->
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="ganjil" name="semester" value="1">
                                                    <label for="ganjil">Ganjil
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline ml-3">
                                                    <input type="radio" id="genap" name="semester" value="2">
                                                    <label for="genap">Genap
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Cuti Tahun Akademik</div>
                                        <div class="col-4"><input type="text" name="ta" id="ta" class="form-control required"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Pejabat Penandatangan</div>
                                        <div class="col-8">
                                            <select name="pejabat" id="pejabat" class="form-control required">
                                                <option></option>
                                                <?php
                                                foreach($pejabat as $pj){
                                                    echo "<option value='".$pj->nip."' jbt='".$pj->nm_jabatan."' nm='".$pj->nama."'>".$pj->nip." | ".$pj->nama." | ".$pj->nm_jabatan."</option>";
                                                }
                                                ?>
                                            </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-8">Bubuhkan:<br> <input type="checkbox" name="ttd" value="1" id="ttd"> Tandatangan<br>
                                        <input type="checkbox" name="cap" value="1" id="cap"> Cap
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-8"><button type="button" class="btn btn-primary" id="save"><i class="fas fa-print"></i> Cetak dan Proses</button></col-8>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>