<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fa fa-user-graduate text-kunyit"></i> Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Beranda</a></li>
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
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">Daftar Mahasiswa</div>
                <div class="card-body">
                <?php
                if(isset($sql)){
                    echo $sql;
                }
                echo $data;
                ?>
                </div>
            </div>
        </div>
        </div>
      </div>
      </section>
      </div>
      