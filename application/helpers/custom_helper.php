<?php
function tanggal_id($x){
    $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
    $bln = $bulan[date("n",strtotime($x))-1];
    return date("d",strtotime($x))." ".$bln." ".date("Y",strtotime($x));
}

function tanggal_en($x){

}

function get_user_image($acc_type,$id){
    $ci =& get_instance();
    $ci->load->database();
    if($acc_type == '10'){
        $ci->db->where('nim',$id);
        $q = $ci->db->get('d_mahasiswa')->row();
        if($q->foto == '' || $q->foto == null){
            return 'assets/dist/img/avatar5.png';
        }else{
            return 'assets/foto/'.$q->foto;
        }
    }else if($acc_type == '5'){
        $ci->db->where('nip',$id);
        $q = $ci->db->get('d_dosen')->row();
        if($q->foto == '' || $q->foto == null){
            return 'assets/dist/img/avatar5.png';
        }else{
            return 'assets/foto/'.$q->foto;
        }
    }else{
        $ci->db->where('uid',$id);
        $q = $ci->db->get('d_user')->row();
        // return $ci->db->last_query();
        if($q->foto == '' || $q->foto == 'null'){
            return 'assets/dist/img/avatar5.png';
        }else{
            return 'assets/foto/'.$q->foto;
        }
    }
}

function golongan_pns($kdgol){
    $gol = array(
        11=>'Juru Muda',
        12=>'Juru Muda Tk. I',
        13=>'Juru',
        14=>'Juru Tk. I',
        21=>'Pengatur Muda',
        22=>'Pengatur Muda Tk. I',
        23=>'Pengatur',
        24=>'Pengatur Tk. I',
        31=>'Penata Muda',
        32=>'Penata Muda Tk. I',
        33=>'Penata',
        34=>'Penata Tk. I',
        41=>'Pembina',
        42=>'Pembina Tk. I',
        43=>'Pembina Muda',
        44=>'Pembina Madya',
        45=>'Pembina Utama'
    );
    return $gol[$kdgol];
}