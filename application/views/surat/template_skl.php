<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Lulus</title>
</head>
<style>
    @page{
        size: auto;
        size: portrait;
        margin: 1.5cm;
        /* margin-left: 1 cm;
        margin-right: 1 cm;
        margin-top: 1 cm; */
    }
    @media print{
        html, body {
            width: 210mm;
            height: 297mm;
            line-height: 10px;
        }
        .header{
            text-align:center !important;
        }
    }
    @media all{
        html, body {
            /* line-height: 10px; */
        }
        h1,h2,h3,h4,h5{
            padding: 0 !important;
            margin: 0 !important;
        }
        .header{
            text-align:center !important;
            border-bottom: 4px solid #000;
            padding-bottom: 10px;
        }
        .header h*{
            line-height: 5px;
        }
        .header p{
            padding: 0 !important;
            margin: 0 !important;
            font-size: 11pt;
        }
        .header .logo{
            position: fixed;
            top: -20px;
            left: -30px;
        }
        .header img{
            max-width:125px;
        }
        .body{
            text-align:justify;
        }
        .text-center{
            text-align:center !important;
        }
        .footer{
            margin-top:1.5cm;
            margin-bottom:1.5cm;
        }
        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) / -2);
            margin-left: calc(var(--bs-gutter-x) / -2);
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) / 2);
            padding-left: calc(var(--bs-gutter-x) / 2);
            margin-top: var(--bs-gutter-y);
        }
        .col-1 {
            flex: 0 0 auto;
            width: 8.3333333333%;
        }

        .col-2 {
            flex: 0 0 auto;
            width: 16.6666666667%;
        }

        .col-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .col-4 {
            flex: 0 0 auto;
            width: 33.3333333333%;
        }

        .col-5 {
            flex: 0 0 auto;
            width: 41.6666666667%;
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-7 {
            flex: 0 0 auto;
            width: 58.3333333333%;
        }

        .col-8 {
            flex: 0 0 auto;
            width: 66.6666666667%;
        }

        .col-9 {
            flex: 0 0 auto;
            width: 75%;
        }

        .col-10 {
            flex: 0 0 auto;
            width: 83.3333333333%;
        }

        .col-11 {
            flex: 0 0 auto;
            width: 91.6666666667%;
        }

        .col-12 {
            flex: 0 0 auto;
            width: 100%;
        }
        .offset-1 {
            margin-left: 8.3333333333%;
        }

        .offset-2 {
            margin-left: 16.6666666667%;
        }

        .offset-3 {
            margin-left: 25%;
        }

        .offset-4 {
            margin-left: 33.3333333333%;
        }

        .offset-5 {
            margin-left: 41.6666666667%;
        }

        .offset-6 {
            margin-left: 50%;
        }

        .offset-7 {
            margin-left: 58.3333333333%;
        }

        .offset-8 {
            margin-left: 66.6666666667%;
        }

        .offset-9 {
            margin-left: 75%;
        }

        .offset-10 {
            margin-left: 83.3333333333%;
        }

        .offset-11 {
            margin-left: 91.6666666667%;
        }
        .ttd{
            position: absolute;
            margin-top: -120px;
        }
        .ttd img{
            max-width: 160px !important;
        }
        .stamp{
            position:absolut;            
            margin-top: -160px;
            margin-left: -90px;
        }
        .stamp img{
            max-width: 150px !important;
        }
    }
</style>
<body>
    <div class="header">
        <div id="logo" class="logo">
            <img src="<?=base_url();?>assets/img/logo.png" alt="">
        </div>
        <h3>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h3>
        <h4>UNIVERSITAS ISLAM NEGERI RADEN MAS SAID SURAKARTA</h4>
        <h2>PASCASARJANA</h2>
        <p>Jl. Pakis-Wonosari Kepanjen Delanggu Klaten Tlp. (0272) 5533410 Kodepos 57471</p>
        <p>Website : www.pascasarjana.uinsaid.ac.id E-mail : pascasarjana@uinsaid.ac.id</p>
    </div>
    <div class="body">
    <div class="text-center">
        <p><strong><h3>SURAT KETERANGAN LULUS</strong></h3>
        Nomor : B- <?=$data->no_surat.$data->ext_surat;?></p>
    </div>
    <p><?php echo isset($sql)?$sql:''; ?></p>
<p>Yang bertanda tangan di bawah ini :</p>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td width="20%">Nama</td>
            <td width="15">: </td>
            <td> <?=$data->nm_pejabat;?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>: </td>
            <td> <?=$data->nip_pejabat;?></td>
        </tr>
        <tr>
            <td>Pangkat/Golongan/Ruang</td>
            <td>: </td>
            <td> <?=$data->pangkat."(".golongan_pns($data->kdgol).")";?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td> <?=$data->jabatan;?></td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>: </td>
            <td> Pascasarjana UIN RM Said Surakarta</td>
        </tr>
    </tbody>
</table>
<p></p>
mahasiswa tersebut menjalani AKTIF PERKULIAHAN KEMBALI mulai pada:<br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td width="20%">Semester</td>
            <td width="15">: </td>
            <td><?=$data->cuti_semester == '1'?'Ganjil':'Genap';?></td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>: </td>
            <td> <?=$data->cuti_ta;?></td>
        </tr>
    </tbody>
</table>
Demikian surat ini di sampaikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.

    </div>
    <div class="footer">
        <div class="sign">
            <div class="row">
                <div class="col-6 offset-6">
                <p>Surakarta, <br><?=$data->pejabat;?>,
                <br>
                <br>
                <br>
                <p><?=$data->nm_pejabat;?><br>NIP. <?=$data->nip_pejabat;?></p>
                <?php
                if(isset($_GET['ttd']) && $_GET['ttd'] == 1){
                echo '<div class="ttd"><img src="'.base_url().'assets/img/ttd.png" alt=""></div>';
                }
                if(isset($_GET['cap']) && $_GET['cap'] == 1){
                echo '<div class="stamp"><img src="'.base_url().'assets/img/stamp.png" alt=""></div>';
                }
                ?>
                </div>
            </div>
        </div>
        <div class="tembusan">
            <p>Tembusan :</p>
            <ol>
                <li>Kabag. Akademik dan Kemahasiswaan UIN RM Said Surakarta;</li>
                <li>Kabag. Keuangan dan Perencanaan UIN RM Said Surakarta.</li>
            </ol>
        </div>
    </div>
</body>
</html>