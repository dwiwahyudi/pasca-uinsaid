<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fab fa-wpforms text-kunyit"></i> Daftar Riwayat Permohonan</h1>
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
                        <div class="card-body">
                            <?php
                            echo $data;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="confirm" style="display:none">
        <div class="form-group">
            <label for="">Bubuhkan</label><br>
            <input type="checkbox" id="ttd" name="ttd"> Tanda tangan<br>
            <input type="checkbox" id="cap" name="cap"> Stempel/Cap<br>
        </div>
        <div class="form-group"><button class="btn btn-primary" type="button" id="cetak">Cetak</button> 
        <button class="btn btn-outline-secondary" onclick="$.fancybox.close();">Batal</button></div>
    </div>
</div>