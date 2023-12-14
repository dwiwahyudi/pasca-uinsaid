<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fab fa-wpforms text-kunyit"></i> Daftar Permohonan/Surat masuk</h1>
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
                            $template = array(
                                'table_open' => '<table width="100%" cellspacing="0" cellpadding="0" id="daftar-permohonan" class="table table-bordered">',
                                'thead_open' => '<thead class="bg-secondary">'
                            );
                            $head = array(
                                array('width'=>'15%','data'=>'Tanggal'),
                                array('width'=>'20%','data'=>'Nama/NIM'),
                                array('width'=>'18%','data'=>'Prodi'),
                                array('width'=>'15%','data'=>'Jenis surat'),
                                array('width'=>'15%','data'=>'Keterangan'),
                                array('width'=>'7%','data'=>'Status'),
                                array('width'=>'10%','data'=>'#')
                            );
                            $this->table->set_heading($head);
                            $this->table->set_template($template);
                            $sts = array('BARU','PROSES','SELESAI','DITOLAK');
                            $cls = array('primary','warning','success','danger');
                            foreach($data->result() as $dt){
                                if($dt->sts_permohonan == '0' || $dt->sts_permohonan == '3'){
                                    $btn = "<a href='".base_url()."surat/detail/".$dt->slug."/".$dt->id."/".$dt->nim."' class='btn btn-primary btn-sm' title='Tampilkan Detail'><i class='fas fa-eye'></i></a>";
                                }else{
                                    $btn = "<a href='".base_url()."surat/detail/".$dt->slug."/".$dt->id."/".$dt->nim."' class='btn btn-primary btn-sm' title='Tampilkan Detail'><i class='fas fa-eye'></i></a> <button type='button' data='".$dt->id."' class='btn btn-warning btn-sm' title='Cetak'><i class='fas fa-print'></i></button> <button type='button' data='".$dt->id."' class='btn btn-success btn-sm' title='Selesai'><i class='fas fa-check-circle'></i></button>";
                                }
                                $this->table->add_row($dt->tgl_masuk,$dt->nama."<br>".$dt->nim,$dt->prodi,$dt->jenis_surat,$dt->keterangan,"<span class='badge badge-".$cls[$dt->sts_permohonan]."'>".$sts[$dt->sts_permohonan]."</span>",$btn);
                            }
                            echo $this->table->generate();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>