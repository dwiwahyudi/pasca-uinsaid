<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Selamat datang</h1><strong><?=$this->session->userdata('nama');?></strong>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    
    <!-- Main content -->
    <section class="content">        
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <div class="card card-info">
              <div class="card-header"><i class="fas fa-info-circle"></i> Info</div>
              <div class="card-body">
                <h3><i class="fas fa-info-circle"></i> Info</h3>
                Info
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card card-primary">
              <div class="card-header"><i class="fas fa-info-circle"></i> Data Mahasiswa <?=$this->session->userdata('acc_type');?></div>
              <div class="card-body">

                <div class="row">
                  <div class="col-4">Nama</div>
                  <div class="col-8"><?=$data->nama;?></div>
                </div>
                <div class="row">
                  <div class="col-4">NIM</div>
                  <div class="col-8"> <?=$data->nim;?></div>
                </div>
                <div class="row">
                  <div class="col-4">Tempat, Tgl Lahir</div>
                  <div class="col-8"> <?=ucwords($data->tempat_lahir).", ".tanggal_id($data->tgl_lahir);?></div>
                </div>
                <div class="row">
                  <div class="col-4">Alamat</div>
                  <div class="col-8"> <?=$data->alamat." RT.".$data->rt." RW.".$data->rw." KEL. ".$data->kelurahan." KEC. ".$data->kecamatan." KAB/KOTA ".$data->kota." PROP. ".$data->propinsi;?></div>
                </div>
                <div class="row">
                  <div class="col-4">Email</div>
                  <div class="col-8"> <?=$data->email;?></div>
                </div>
                <div class="row">
                  <div class="col-4">HP</div>
                  <div class="col-8"> <?=$data->hp;?></div>
                </div>
                <div class="row">
                  <div class="col-4">Media Sosial</div>
                  <div class="col-8"> <i class="fab fa-instagram"></i> <?=$data->medsos_ig;?><br><i class="fab fa-twitter"></i> <?=$data->medsos_x;?><br><i class="fab fa-facebook"></i> <?=$data->medsos_fb;?></div>
                </div>
                <div class="row">
                  <div class="col-4">Program Studi</div>
                  <div class="col-8"> <?=$data->prodi;?></div>
                </div>
                <div class="row">
                  <div class="col-4">Jenjang</div>
                  <div class="col-8"> <?=$data->jenjang == '2'?'Master (S2)':'Doktoral (S3)';?></div>
                </div>
                <div class="row">
                  <div class="col-4">Angkatan</div>
                  <div class="col-8"> <?=$data->thn_masuk;?></div>
                </div>
                <div class="row">
                  <div class="col-4">Semester</div>
                  <div class="col-8"> <?=$data->sms_masuk == '1'?'Ganjil':'Genap';?></div>
                </div>
                <div class="row">
                  <div class="col-4">Semester Aktif</div>
                  <div class="col-8"> <?=$data->semester;?></div>
                </div>
                <?php
                if($data->jenjang == 'S2'){
                ?>
                <div class="row">
                  <div class="col-4">Pembimbing</div>
                  <div class="col-8"> <?=$data->nm_pemb1;?></div>
                </div>
                <?php
                }
                if($data->jenjang == 'S3'){
                ?>
                <div class="row">
                  <div class="col-4">Promotor</div>
                  <div class="col-7"> <?=$data->nm_pemb1;?></div>
                </div>
                <div class="row">
                  <div class="col-4">Co Promotor</div>
                  <div class="col-8"> <?=$data->nm_pemb2;?></div>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
       </div>
    </section>
</div>