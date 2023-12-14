<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fab fa-wpforms text-kunyit"></i> Surat Masuk/Permohonan</h1>
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
                <div class="col-lg-12 col-md-12">
                    <!-- <div class="card"> -->
                    <!-- <div class="card-body"> -->
                    <form class="form" id="form-proses-permohonan">
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-primary">
                                    <div class="card-header">Data Mahasiswa</div>
                                    <div class="card-body">
                                        <div class="row py-1">
                                            <div class="col-4">Nama</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$data->nama;?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">NIM</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$data->nim;?>
                                            <input type="hidden" name="nim" id="nim" value="<?=$data->nim;?>">
                                        </div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Jenjang Pendidikan</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$mhs->jenjang;?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Program Studi</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$mhs->prodi;?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Angkatan</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$mhs->thn_masuk;?> -
                                                <?=$mhs->sms_masuk == '2' ? 'Genap' : 'Ganjil';?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Semester aktif</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$mhs->semester;?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Alamat</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$mhs->alamat;?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Jarak/waktu ke kampus</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=$mhs->jarak . 'Km / ' . $mhs->waktu . ' menit';?>
                                            </div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Judul Penelitian</div>
                                            <div class="left">: </div>
                                            <div class="col-7">
                                                <?=isset($mhs->judul_penelitian) ? $mhs->judul_penelitian : '-';?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Pembimbing 1/Promotor</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=isset($mhs->nm_pemb1) ? $mhs->nm_pemb1 : '-';?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Pembimbing 2/Co Promotor</div>
                                            <div class="left">: </div>
                                            <div class="col-7"><?=isset($mhs->nm_pemb2) ? $mhs->nm_pemb2 : '-';?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-primary">
                                    <div class="card-header">Riwayat Ujian</div>
                                    <div class="card-body">
                                        <div class="row py-1">
                                            <div class="col-4">Seminar Proposal</div>
                                            <div class="left">:</div>
                                            <div class="col-7"></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Ujian Tesis</div>
                                            <div class="left">:</div>
                                            <div class="col-7"></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Seminar Hasil</div>
                                            <div class="left">:</div>
                                            <div class="col-7"></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Ujian Terbuka</div>
                                            <div class="left">:</div>
                                            <div class="col-7"></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Ujian Tertutup</div>
                                            <div class="left">:</div>
                                            <div class="col-7"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-info">
                                    <div class="card-header">Data Permohonan</div>
                                    <div class="card-body">
                                        <div class="row py-1">
                                            <div class="col-4">Tanggal</div>
                                            <div class="left">:</div>
                                            <div class="col-7"><?=$data->tgl_masuk;?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Keterangan</div>
                                            <div class="left">:</div>
                                            <div class="col-7"><?=$data->keterangan;?></div>
                                        </div>
                                        <div class="row py-1">
                                            <div class="col-4">Berkas/file</div>
                                            <div class="left">:</div>
                                            <div class="col-7"> <i                                       class="fas fa-file-pdf text-danger"></i>
                                            <a href="<?=base_url() . "assets/dok_permohonan/" . $data->dokumen;?>"                                        data-fancybox><?=$data->dokumen;?></a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-success">
                                    <div class="card-header">Surat</div>
                                    <div class="card-body">
                                        <div id="alert"></div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Jenis Permohonan</div>
                                                <div class="col-9">
                                                    <?php
                                                    foreach ($jns_surat as $js) {
                                                        if ($js->id_jns_surat == $data->id_jns_surat) {
                                                            echo '<input type="text" name="id_jns_surat" id="id_jns_surat" class="form-control required" slug="' . $js->slug . '" value="' . $js->jenis_surat . '" readonly>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Nomor surat</div>
                                                <div class="col-3"><input type="text" name="no_surat" id="no_surat"
                                                        class="form-control required" placeholder="Nomor"
                                                        value="<?php echo (intval('no_surat') + 1); ?>"></div>
                                                <div class="col-6"><input type="text" name="ext_surat"
                                                        class="form-control required" id="ext_surat"
                                                        placeholder="Ekstensi" value="<?=$ext;?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Tanggal surat</div>
                                                <div class="col-lg-3 col-md-7 col-sm-12 col-xs-12"><input type="date"
                                                        name="tgl_surat" id="tgl_surat" class="form-control required"
                                                        placeholder="Tanggal Surat"
                                                        value="<?=isset($data->tgl_surat) ? $data->tgl_surat : date("Y-m-d");?>">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($data->id_jns_surat == '2') {
                                            ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Cuti Untuk Semester</div>
                                                <div class="col-8">
                                                    <!-- <input type="text" name="semester" id="semester" class="form-control"> -->
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="ganjil" name="cuti_semester"
                                                                value="1">
                                                            <label for="ganjil">Ganjil
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline ml-3">
                                                            <input type="radio" id="genap" name="cuti_semester"
                                                                value="2">
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
                                                <div class="col-4"><input type="text" name="cuti_ta" id="cuti_ta"
                                                        class="form-control required"></div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        if ($data->id_jns_surat == '3') { #aktif kuliah kembali
                                        ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Aktif mulai Semester</div>
                                                <div class="col-8">
                                                    <!-- <input type="text" name="semester" id="semester" class="form-control"> -->
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="ganjil" name="aktif_semester"
                                                                value="1">
                                                            <label for="ganjil">Ganjil
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline ml-3">
                                                            <input type="radio" id="genap" name="aktif_semester"
                                                                value="2">
                                                            <label for="genap">Genap
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Tahun Akademik</div>
                                                <div class="col-4"><input type="text" name="aktif_ta" id="aktif_ta"
                                                        class="form-control required"></div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        if ($data->id_jns_surat == '8') { #ijin observasi
                                        ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Tujuan</div>
                                                <div class="col-9"><textarea name="tujuan" id="tujuan" cols="30" rows="4" class="form-control required" style="resize:none"></textarea>
                                                <span class="text-danger">Jika tujuan lebih dari 1, pisahkan dengan tanda <strong>titik koma (;)</strong></span>
                                            </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">Pejabat Penandatangan</div>
                                                <div class="col-9">
                                                    <select name="pejabat" id="pejabat" class="form-control required">
                                                        <option></option>
                                                        <?php
                                                        foreach ($pejabat as $pj) {
                                                            echo "<option value='" . $pj->nip . "' jbt='" . $pj->nm_jabatan . "' nm='" . $pj->nama . "'>" . $pj->nip . " | " . $pj->nama . " | " . $pj->nm_jabatan . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>
                                                <div class="col-8">Bubuhkan:<br> <input type="checkbox" name="ttd"
                                                        value="1" id="ttd"> Tandatangan<br>
                                                    <input type="checkbox" name="cap" value="1" id="cap"> Cap
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>
                                                <div class="col-8"><button type="button" class="btn btn-primary"
                                                        id="save"><i class="fas fa-print"></i> Cetak dan Proses</button>
                                                    </col-8>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <!-- </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
</div>