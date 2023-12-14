<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('uid') && !$this->session->userdata('acc_type')){
		    redirect(base_url());
            exit();
		}else{
            $this->load->model('M_surat', 'surat');
            $header['css'] = array();
            $footer['js'] = array();
        }
    }

    public function jml_smster($x, $y)
    {
        #x = lulus; y = masuk
        $thn_masuk = substr($y, 0, 4);
        $sms_masuk = substr($y, -1, 1);
        if ($sms_masuk == 1) {$sem = 'GANJIL';} else { $sem = 'GENAP';}
        $bln_lulus = date("n", strtotime($x));
        $thn_lulus = date("Y", strtotime($x));
        if ($bln_lulus > 2 && $bln_lulus <= 8) {$sms_lulus = 2;} else { $sms_lulus = 1;}
        if ($sms_lulus == 2 || ($sms_lulus == 1 && $bln_lulus <= 2)) {
            $thn_lulus_ak = $thn_lulus - 1;
        } else {
            $thn_lulus_ak = $thn_lulus;
        }
        if ($sms_lulus == 2) {$sms = ($thn_lulus_ak + 1 - $thn_masuk) * 2;
            $sem_lls = 'GENAP';} else { $sms = ($thn_lulus_ak + 1 - $thn_masuk) * 2 - 1;
            $sem_lls = 'GANJIL';}
        return $sms;
    }

    public function s($y)
    {
        $thn_masuk = substr($y, 0, 4);
        $sms_masuk = substr($y, -1, 1);
        if ($sms_masuk == 1) {$sem = 'GANJIL';} else { $sem = 'GENAP';}
        $bln_lulus = date("n");
        $thn_lulus = date("Y");
        if ($bln_lulus > 2 && $bln_lulus <= 8) {$sms_lulus = 2;} else { $sms_lulus = 1;}
        if ($sms_lulus == 2 || ($sms_lulus == 1 && $bln_lulus <= 2)) {
            $thn_lulus_ak = $thn_lulus - 1;
        } else {
            $thn_lulus_ak = $thn_lulus;
        }
        if ($sms_lulus == 2) {$sms = ($thn_lulus_ak + 1 - $thn_masuk) * 2;
            $sem_lls = 'GENAP';} else { $sms = ($thn_lulus_ak + 1 - $thn_masuk) * 2 - 1;
            $sem_lls = 'GANJIL';}

        echo "Tahun masuk " . $thn_masuk . " semester " . $sem . "<br>";
        echo "Tahun masuk " . $thn_lulus_ak . " semester " . $sem_lls . "<br>";
        echo "Lama studi " . $sms . " semester";
    }

    public function permohonan($slug = false){
        $data['jns_surat'] = $this->surat->get_jenis_surat();
        $header['css'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
        $footer['js'] = array('assets/dist/js/surat.js','assets/plugins/datatables/jquery.dataTables.min.js','assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
        $this->load->view('template/header',$header);
        $this->load->library('table');
        if($this->session->userdata('acc_type') == '10'){
            $this->load->view('surat/ajuan_permohonan',$data);  
        }else{
            $where = array("d_permohonan.status NOT IN ('2','3')"=>null);
            $data['data'] = $this->surat->get_surat($where);
            $this->load->view('surat/daftar_permohonan',$data);  
        }
        $this->load->view('template/footer',$footer);
    }

    public function detail($jns,$id){
        $where = array('id'=>$id);
        $data['data'] = $this->surat->get_surat($where)->row();
        $data['sql'] = $this->db->last_query();
        $data['cuti'] = $this->surat->get_cuti(array('id_permohonan'=>$data['data']->id))->row();
        $header['css'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.css');
        $footer['js'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.js','assets/dist/js/surat.js');
        $this->load->view('template/header',$header);
        $this->load->view('surat/detail',$data);
        $this->load->view('template/footer',$footer);
    }

    public function proses_permohonan($jns,$id_jns_surat,$id_permohonan,$nim){
        $header['css'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.css');
        $footer['js'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.js','assets/dist/js/surat.js'); 
        $data['no_surat'] = $this->surat->get_last_number()->row();
        $data['ext'] = $this->surat->get_last_ext(array('id_jns_surat'=>$id_jns_surat))->row();
        $this->load->model(array('M_setup'=>'setup','M_main'=>'main','M_mahasiswa'=>'mhs'));
        if($id_permohonan == true){
            $where = array('id'=>$id_permohonan);
            $data['data'] = $this->surat->get_surat($where)->row(); 
        }else{
            $data['data'] = [];
        }
        $data['prodi'] = $this->main->get_prodi()->result();
        $data['pejabat'] = $this->setup->get_pejabat()->result();
        $data['jns_surat'] = $this->surat->get_jenis_surat()->result();
        $data['mhs'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$nim))->row();
        $data['sql'] = $this->db->last_query();
        $this->load->view('template/header');
        $this->load->view('surat/proses_permohonan',$data);
        $this->load->view('template/footer',$footer);
    }

    public function proses_permohonan_save($id_permohonan){
        // echo json_encode(array("status"=>'done','msg'=>'Berhasil disimpan'));
        echo $this->surat->save_proses_permohonan();
    }

    public function set_proses($do){
        echo $this->surat->set_proses($do,$this->input->post('id'));
    }

    public function cetak($page, $id){
        $this->load->model('M_mahasiswa','mhs');
        // if($page == 'cuti'){
        //     $data['data'] = $this->surat->get_cuti(array('id_permohonan'=>$id))->row();
        //     $data['mhs'] = $this->mhs->get_mahasiswa2(array('nim'=>$data['data']->nim))->row();
        //     $data['sql'] = $this->db->last_query();
        // }
        $data['data'] = $this->surat->get_surat_keluar(array('id_permohonan'=>$id))->row();
        $data['mhs'] = $this->mhs->get_mahasiswa2(array('nim'=>$data['data']->nim))->row();

        // $where = array('d_permohonan.id'=>$id);
        // $data['pejabat'] = $this->surat->get_pejabat()->row();
        // $data['data'] = $this->surat->get_surat($where)->row();

        $this->load->library('pdf');
        // $html = $this->load->view('user-area/skpi/arabic', $data, false);
        // $html = $this->load->view('user-area/skpi/skpi-template', $data, true);
        $html = $this->load->view('surat/template_'.$page,$data,false);
        // $html = $this->load->view('surat/template_'.$page,$data,true);
        // $html = $this->load->view('user-area/skpi/skpi-template-arabic2', $data, false);
        // $this->pdf->generate($html, 'Surat Keterangan Cuti.pdf', true, 'A4', 'portrait');
    }

    public function aktif(){
        $this->load->view('template/header');
        $this->load->view('surat/surat_masuk');  
        $this->load->view('template/footer');
    }

    public function cuti($type = false, $id_permohonan = false){ //deprecated
        $header['css'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.css');
        $footer['js'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.js','assets/dist/js/surat.js'); 
        $data['no_surat'] = $this->surat->get_last_number()->row();
        $data['ext'] = $this->surat->get_last_ext(array('id_jns_surat'=>'2'))->row();
        if($type == 'rekam'){
            $this->load->model(array('M_setup'=>'setup','M_main'=>'main'));
            if($id_permohonan == true){
                $where = array('id'=>$id_permohonan);
                $data['data'] = $this->surat->get_surat($where)->row(); 
            }else{
                $data['data'] = [];
            }
            $data['prodi'] = $this->main->get_prodi()->result();
            $data['pejabat'] = $this->setup->get_pejabat()->result();
            $this->load->view('template/header');
            $this->load->view('surat/rekam_cuti',$data);
            $this->load->view('template/footer',$footer);
        }else if($type == 'save'){
            echo $this->surat->save_cuti();
        }else{
            $this->load->view('template/header');
            $this->load->view('surat/surat_masuk');
            $this->load->view('template/footer',$footer);
        }
    }

    public function skl($type,$id_permohonan){
        $header['css'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.css');
        $footer['js'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.js','assets/dist/js/surat.js'); 
        $data['no_surat'] = $this->surat->get_last_number()->row();
        $data['ext'] = $this->surat->get_last_ext(array('id_jns_surat'=>'2'))->row();
        if($type == 'rekam'){
            $this->load->model(array('M_setup'=>'setup','M_main'=>'main'));
            if($id_permohonan == true){
                $where = array('id'=>$id_permohonan);
                $data['data'] = $this->surat->get_surat($where)->row(); 
            }else{
                $data['data'] = [];
            }
            $data['prodi'] = $this->main->get_prodi()->result();
            $data['pejabat'] = $this->setup->get_pejabat()->result();
            $this->load->view('template/header');
            $this->load->view('surat/proses_skl',$data);
            $this->load->view('template/footer',$footer);
        }else if($type == 'save'){
            echo $this->surat->save_skl();
        }else{
            $this->load->view('template/header');
            $this->load->view('surat/surat_masuk');
            $this->load->view('template/footer',$footer);
        }
    }

    public function riwayat_permohonan(){
        $header['css'] = array('vendor/fancybox/dist/jquery.fancybox.min.css','assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
        $footer['js'] = array('vendor/fancybox/dist/jquery.fancybox.min.js','assets/plugins/datatables/jquery.dataTables.min.js', 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', 'assets/dist/js/surat.js');
        $this->load->library('table');
        $template = array(
            'table_open' => "<table width='100%' cellpadding='0' cellspacing='0' class='table table-bordered datatable'>",
            'thead_open' => "<thead class='bg-primary'>"
        );
        $this->table->set_template($template);
        $this->table->set_heading('Jenis Surat','Tanggal','Keterangan','Status','Catatan','#');
        if($this->session->userdata('acc_type') == '10'){
            $where = array('nim'=>$this->session->userdata('nim'));
        }else{
            $where = array('YEAR(tgl_surat)'=>date("Y"));
        }
        $query = $this->surat->get_riwayat_permohonan($where);
        $data['sql'] = $this->db->last_query();
        foreach($query->result() as $d){
            $sts = array('BELUM DIBACA', 'PROSES', 'SELESAI', 'DITOLAK');
            $this->table->add_row(
                $d->jenis_surat,
                date("d-m-Y",strtotime($d->tgl_masuk)),
                $d->keterangan,
                $sts[$d->status],
                $d->catatan,
                '<a href="#" data-fancybox data-src="'.base_url().'assets/dok_permohonan/" title="Detail"><i class="fas fa-eye text-info" target="_blank" ></i></a>'
            );
        }
        $data['data'] = $this->table->generate();
        $this->load->view('template/header',$header);
        $this->load->view('surat/riwayat_permohonan',$data);  
        $this->load->view('template/footer',$footer);
    }
    
    public function pengaktifan(){
        $this->load->view('template/header');
        $this->load->view('surat/surat_masuk');  
        $this->load->view('template/footer');

    }

    public function ijin_belajar(){
        $this->load->view('template/header');
        $this->load->view('surat/surat_masuk');  
        $this->load->view('template/footer');

    }

    public function ijin_penelitian(){
        $this->load->view('template/header');
        $this->load->view('surat/surat_masuk');  
        $this->load->view('template/footer');

    }

    public function get_req_dokumen($jns_surat){
        echo $this->surat->get_jenis_surat($jns_surat)->row()->dok;
    }

    public function simpan_permohonan()
    {
        $config['upload_path']="./assets/dok_permohonan/";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = TRUE;
        
        $this->load->library('upload',$config);
        if($this->upload->do_upload('dokumen')){
            $data = $this->upload->data();
            $param = array(
                'nim' => $this->session->userdata('nim'),
                'nama' => $this->session->userdata('nama'),
                'tgl_masuk' => date("Y-m-d H:i:s"),
                'id_jns_surat' => $this->input->post('jns_surat'),
                'keterangan' => $this->input->post('keterangan'),
                'dokumen' => $data['file_name'],
                'status' => '0'
            );
            echo $this->surat->simpan_permohonan($param);
        }else{
            echo json_encode(array('status'=>'error','msg'=>$this->upload->display_errors()));
        }
    }

    # Surat keluar
    public function surat_keluar($type = false, $id_jns_surat = false, $id_permohonan = false){
        $header['css'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.css');
        $footer['js'] = array('assets/plugins/fancybox/dist/jquery.fancybox.min.js','assets/dist/js/surat.js'); 
        if($type == 'rekam'){
            $this->load->model(array('M_setup'=>'setup','M_main'=>'main'));
            if($id_permohonan == true){
                $where = array('id'=>$id_permohonan);
                $data['data'] = $this->surat->get_surat($where)->row(); 
            }else{
                $data['data'] = [];
            }
            $data['prodi'] = $this->main->get_prodi()->result();
            $data['pejabat'] = $this->setup->get_pejabat()->result();
            $data['jns_surat'] = $this->surat->get_jenis_surat()->result();
            $data['sql'] = $this->db->last_query();
            $this->load->view('template/header');
            $this->load->view('surat/rekam_surat_keluar',$data);
            $this->load->view('template/footer',$footer);
        }else if($type == 'save'){
            echo $this->surat->save_cuti();
        }else{
            $this->load->view('template/header');
            $this->load->view('surat/surat_masuk');
            $this->load->view('template/footer',$footer);
        }
    }

    public function riwayat(){  #riwayat surat keluar
        if($this->session->userdata('acc_type') == '10'){
            show_404($page = '', $log_error = TRUE);
        }else{
        $header['css'] = array('vendor/fancybox/dist/jquery.fancybox.min.css','assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
        $footer['js'] = array('vendor/fancybox/dist/jquery.fancybox.min.js','assets/plugins/datatables/jquery.dataTables.min.js', 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', 'assets/dist/js/surat.js');
        $this->load->library('table');
        $template = array(
            'table_open' => "<table width='100%' cellpadding='0' cellspacing='0' class='table table-bordered datatable'>",
            'thead_open' => "<thead class='bg-primary'>"
        );
        $this->table->set_template($template);
        $this->table->set_heading('Jenis Surat','NIM','Nama Mhs','Nomor','Tanggal','Status','#');
        if($this->session->userdata('acc_type') == '10'){
            $where = array('nim'=>$this->session->userdata('nim'));
        }else{
            $where = array('YEAR(tgl_surat)'=>date("Y"));
        }
        $query = $this->surat->get_riwayat($where);
        // $data['sql'] = $this->db->last_query();
        foreach($query->result() as $d){
            $this->table->add_row(
                $d->jenis_surat,
                $d->nim,
                $d->nama,
                $d->no_surat,
                date("d-m-Y",strtotime($d->tgl_surat)),
                $d->status_surat == '1'?'Proses':'Selesai',
                '<a href="'.base_url().'assets/dok_permohonan/" target="_blank"><i class="fas fa-download" style="color: #213454;"></i></a> <a href="#" data-fancybox data-src="'.base_url().'assets/dok_permohonan/"><i class="fas fa-eye" target="_blank" style="color: #213454;"></i></a> <a href="#confirm" data-fancybox><i class="fas fa-print" target="_blank" style="color: #213454;"></i></a>'
                // '<a href="'.base_url().'assets/dok_permohonan/" target="_blank"><i class="fas fa-download" style="color: #213454;"></i></a> <a href="#" data-fancybox data-src="'.base_url().'assets/dok_permohonan/"><i class="fas fa-eye" target="_blank" style="color: #213454;"></i></a> <a href="'.base_url().'surat/cetak/'.$d->slug.'/'.$d->id_permohonan.'/" target="_new" onclick="window.open(\''.base_url().'surat/cetak/'.$d->slug.'/'.$d->id_permohonan.'\',\'newwindow\',\'fullscreen=no,width=1000\'); return false;"><i class="fas fa-print" target="_blank" style="color: #213454;"></i></a>'
                // '<a href="'.base_url().'assets/dok_permohonan/'.$d->dokumen.'" target="_blank"><i class="fas fa-download" style="color: #213454;"></i></a> <a href="#" data-fancybox data-src="'.base_url().'assets/dok_permohonan/'.$d->dokumen.'"><i class="fas fa-eye" target="_blank" style="color: #213454;"></i></a>',
            );
        }
        $data['data'] = $this->table->generate();
        $this->load->view('template/header',$header);
        $this->load->view('surat/riwayat',$data);  
        $this->load->view('template/footer',$footer);
        }
    }

    public function surat_cuti(){
        $this->load->view('surat/rekam_cuti2');
    }
}