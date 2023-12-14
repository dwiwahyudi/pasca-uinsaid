<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fab fa-wpforms text-kunyit"></i> Detail Permohonan/Surat masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Beranda</a></li>
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
                <div class="col-lg-12 col-md-12" id="detail-surat">
                    <div class="card">
                        <div class="card-body">
                            <div id="alert"></div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Tangal</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">: <?=$data->tgl_masuk;?><input
                                        type="hidden" id="id" value="<?=$data->id;?>"></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Jenis Surat</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">: <?="(".$data->id_jns_surat.") ".$data->jenis_surat;?></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Nama</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">: <?=$data->nama;?></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">NIM</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">: <?=$data->nim;?></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Program Studi</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">: <?=$data->prodi;?></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Keterangan</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">: <?=$data->keterangan;?></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Dokumen</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">: <i
                                        class="fas fa-file-pdf text-danger"></i> <a
                                        href="<?=base_url() . "assets/dok_permohonan/" . $data->dokumen;?>"
                                        data-fancybox><?=$data->dokumen;?></a></div>
                            </div>
                            <div class="row mt-2 form-group">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">Catatan</div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <?php
                                if($data->sts_permohonan == '0'){
                                ?>    
                                <textarea name="catatan" id="catatan" rows="3" class="form-control"></textarea>
                                <?php
                                }else{
                                    echo ": ".$data->catatan;
                                }
                                ?>
                                    </div>
                            </div>
                            <?php
                            if($data->sts_permohonan !== '0' && $data->sts_permohonan !== '3'){
                            ?>
                            <div class="border-top py-2"><h3>Pemberian Cuti</h3></div>
                            <div class="row form-group">
                                <div class="col-3">Cuti Semester</div>
                                <div class="col-9">: <?=$cuti->cuti_semester == '1'?'Ganjil':'Genap';?></div>
                            </div>                            
                            <div class="row mt-2 form-group">
                                <div class="col-3">Cuti Tahun Akademik</div>
                                <div class="col-9">: <?=$cuti->cuti_ta;?></div>
                            </div>
                            <div class="row mt-2 form-group">
                                <div class="col-3">Pejabat Penandatangan</div>
                                <div class="col-9">: <?=($cuti->pejabat == ''?'-':$cuti->pejabat)." | ".($cuti->nm_pejabat == ''?'-':$cuti->nm_pejabat)." | ".($cuti->nip_pejabat == ''?'':$cuti->nip_pejabat);?></div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="row mt-2 form-group">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"></div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                    <?php
                                    if($data->sts_permohonan == '0'){
                                    ?>
                                    <a href="<?=base_url();?>surat/permohonan/" class="btn btn-primary"> Daftar Permohonan</a>
                                    <a href="<?=base_url();?>surat/proses_permohonan/<?=$data->slug;?>/<?=$data->id_jns_surat;?>/<?=$data->id;?>/<?=$data->nim;?>" class="btn btn-primary">Lanjutkan/Proses</a>
                                    <!-- <button class="btn btn-primary" id="terima" type="button">Lanjutkan/Proses</button> -->
                                    <button class="btn btn-danger" id="tolak" type="button">Tolak</button>
                                    <?php
                                    }else{
                                    ?>
                                    <a href="<?=base_url();?>surat/permohonan/" class="btn btn-primary"> Daftar Permohonan</a>
                                    <a href="<?=base_url();?>surat/rekam/cuti/" class="btn btn-info"><i class="fas fa-edit"></i> Ubah</a>
                                    <button id="cetak" class="btn btn-success"><i class="fas fa-print"></i> Cetak</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>