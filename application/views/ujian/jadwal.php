<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="far fa-clipboard text-kunyit"></i> Jadwal Ujian</h1>
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
            <div class="card">
                <!-- <div class="card-header">Jadwal ujian</div> -->
                <div class="card-body">
                <?php
                echo $data;
                ?>
                </div>
            </div>
        </div>
    </section>
</div>