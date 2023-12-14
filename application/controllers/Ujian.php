<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('uid') && $this->session->has_userdata('acc_type')){
		    $this->load->model('M_ujian','ujian');
        }else{
            redirect(base_url());
            exit();
        }
	}

    public function sempro()
    {
        $this->load->model('M_mahasiswa','mhs');
        $where = array('d_ujian.jns_ujian'=>'1','nim'=>$this->session->userdata('nim'));
        $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
        if($data['data']->jenjang == 'S2'){$n = 6;}
        else if($data['data']->jenjang == 'S3'){$n = 1;}
        $data['info'] = $this->ujian->get_ref_ujian($n)->row();
        $data['ujian'] = $this->ujian->get_ujian($where);
        $footer['js'] = array('assets/dist/js/ujian.js');
        $this->load->view('template/header');
        $this->load->view('ujian/sempro_pendaftaran',$data);
        $this->load->view('template/footer',$footer);
    }

    public function tesis()
    {
        $this->load->model('M_mahasiswa','mhs');
        $where = array('d_ujian.jns_ujian'=>'2','nim'=>$this->session->userdata('nim'));
        $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
        $data['info'] = $this->ujian->get_ref_ujian(2)->row();
        $data['ujian'] = $this->ujian->get_ujian($where);
        $footer['js'] = array('assets/dist/js/ujian.js');
        $this->load->view('template/header');
        $this->load->view('ujian/tesis_pendaftaran',$data);
        $this->load->view('template/footer',$footer);
    }

    public function semhas()
    {
        $this->load->model('M_mahasiswa','mhs');
        $where = array('d_ujian.jns_ujian'=>'3','nim'=>$this->session->userdata('nim'));
        $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
        $data['penelitian'] = $this->mhs->get_penelitian(array('nim'=>$this->session->userdata('nim')))->row();
        $data['ujian'] = $this->ujian->get_ujian($where);
        $data['info'] = $this->ujian->get_ref_ujian(3)->row();
        $footer['js'] = array('assets/dist/js/ujian.js');
        $this->load->view('template/header');
        $this->load->view('ujian/semhas_pendaftaran',$data);
        $this->load->view('template/footer',$footer);
    }

    public function ujtertutup()
    {
        $this->load->model('M_mahasiswa','mhs');
        $where = array('d_ujian.jns_ujian'=>'4','nim'=>$this->session->userdata('nim'));
        $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
        $data['penelitian'] = $this->mhs->get_penelitian(array('nim'=>$this->session->userdata('nim')))->row();
        $data['ujian'] = $this->ujian->get_ujian($where);
        $data['info'] = $this->ujian->get_ref_ujian(4)->row();
        $footer['js'] = array('assets/dist/js/ujian.js');
        $this->load->view('template/header');
        $this->load->view('ujian/ujtertutup_pendaftaran',$data);
        $this->load->view('template/footer',$footer);
    }

    public function ujterbuka()
    {
        $this->load->model('M_mahasiswa','mhs');
        $where = array('d_ujian.jns_ujian'=>'5','nim'=>$this->session->userdata('nim'));
        $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
        $data['penelitian'] = $this->mhs->get_penelitian(array('nim'=>$this->session->userdata('nim')))->row();
        $data['ujian'] = $this->ujian->get_ujian($where);
        $data['info'] = $this->ujian->get_ref_ujian(5)->row();
        $footer['js'] = array('assets/dist/js/ujian.js');
        $this->load->view('template/header');
        $this->load->view('ujian/ujterbuka_pendaftaran',$data);
        $this->load->view('template/footer',$footer);
    }

    public function jadwal()
    {
        $this->load->model('M_mahasiswa','mhs');
        // $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
        // $where = array('');
        if($this->session->userdata('acc_type') == '10'){
            $where = array('nim'=>$this->session->userdata('nim'));
        }
        $ujian = $this->ujian->get_ujian($where);
        $template = array(
            'table_open' => '<table width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">',
            'thead_open' => '<thead class="bg-primary">'
        );
        $heading = array(
            'No',array('width'=>'15%','data'=>'Nama Mahasiswa'),
            array('width'=>'22%','data'=>'Judul'),
            array('width'=>'8%','data'=>'Jenjang'),
            array('width'=>'18%','data'=>'Program Studi'),
            array('width'=>'10%','data'=>'Ujian'),
            array('width'=>'15%','data'=>'Jadwal'),
            array('width'=>'8%','data'=>'Status')
        );
        $this->table->set_template($template);
        $this->table->set_heading($heading);
        if($ujian->num_rows() >= 1){
            $no = 1;
            foreach($ujian->result() as $u){
                if($u->jenjang == 'S2'){$jenjang = 'S2 - Tesis';}
                if($u->jenjang == 'S3'){$jenjang = 'S3 - Disertasi';}
                $sts_pend = array('PROSES','DITERIMA/DIJADWALKAN','DITOLAK');
                $uj = array('','SEMPRO','UJIAN TESIS','SEMHAS','UJIAN TERTUTUP','UJIAN TERBUKA');
                // if($u->status_pendaftaran == )
                $this->table->add_row($no,$u->nama_mhs.'<br> NIM: '.$u->nim,$u->judul_penelitian_id,$jenjang,$u->prodi,$uj[$u->jns_ujian],$u->jadwal_ujian."<br>".$u->ruang_ujian,$sts_pend[$u->status_pendaftaran]);
                $no++;
            }
            $data['data'] = $this->table->generate();
        }
        $footer['js'] = array('assets/dist/js/ujian.js');
        $this->load->view('template/header');
        $this->load->view('ujian/jadwal',$data);
        $this->load->view('template/footer',$footer);
    }

    public function hasil(){   
        $this->load->model('M_mahasiswa','mhs');
        if($this->session->userdata('acc_type') == '10'){
            $where = array('nim'=>$this->session->userdata('nim'));
        }
        $ujian = $this->ujian->get_ujian($where);
        $template = array(
            'table_open' => '<table width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">',
            'thead_open' => '<thead class="bg-primary">'
        );
        $heading = array(
            'No',array('width'=>'20%','data'=>'Nama Mahasiswa'),
            array('width'=>'25%','data'=>'Judul'),
            array('width'=>'8%','data'=>'Jenjang'),
            array('width'=>'20%','data'=>'Program Studi'),
            array('width'=>'15%','data'=>'Ujian'),
            array('width'=>'8%','data'=>'Status')
        );
        $this->table->set_template($template);
        $this->table->set_heading($heading);
        if($ujian->num_rows() >= 1){
            $no = 1;
            foreach($ujian->result() as $u){
                if($u->jenjang == 'S2'){$jenjang = 'S2 - Tesis';}
                if($u->jenjang == 'S3'){$jenjang = 'S3 - Disertasi';}
                $uj = array('','SEMPRO','UJIAN TESIS','SEMHAS','UJIAN TERTUTUP','UJIAN TERBUKA');
                $sts_ujian = array('','LULUS TANPA REVISI','LULUS DENGAN REVISI','TIDAK LULUS');
                // if($u->status_pendaftaran == )
                $this->table->add_row($no,$u->nama_mhs.'<br> NIM: '.$u->nim,$u->judul_penelitian_id,$jenjang,$u->prodi,$uj[$u->jns_ujian],$u->status_ujian == ''?'':$sts_ujian[$u->status_ujian]);
                $no++;
            }
            $data['data'] = $this->table->generate();
        }     
        $footer['js'] = array('assets/dist/js/ujian.js');
        $this->load->view('template/header');
        $this->load->view('ujian/hasil',$data);
        $this->load->view('template/footer',$footer);
    }

    public function pendaftaran($type = false,$nim = false){ #pendaftaran ujian
        if($type == false){
            echo "error";
        }else{
            if($type == 'sempro'){
                $file_folder = './dok_ujian/sempro/';
                $jns_ujian = '1';
            }else if ($type == 'tesis'){
                $jns_ujian = '2';
                $file_folder = './dok_ujian/semhas/';
            }else if ($type == 'semhas'){
                $jns_ujian = '3';
                $file_folder = './dok_ujian/semhas/';
            }else if ($type == 'ujtertutup'){
                $jns_ujian = '4';
                $file_folder = './dok_ujian/ujtertutup/';
            }else if ($type == 'ujterbuka'){
                $jns_ujian = '5';
                $file_folder = './dok_ujian/ujterbuka/';
            }
            $config['upload_path'] = $file_folder;
            $config['allowed_types']='pdf';
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = TRUE;
            
            $this->load->library('upload',$config);
            $err_upload = [];
            if($this->upload->do_upload('dok_pendaftaran')){$dok_pendaftaran = $this->upload->data()['file_name'];}
            else{$err_upload[] = $this->upload->display_errors();}

            if($this->upload->do_upload('dok_bimbingan')){$dok_bimbingan = $this->upload->data()['file_name'];}
            else{$err_upload[] = $this->upload->display_errors();}
            
            if($this->upload->do_upload('dok_persetujuan')){$dok_persetujuan = $this->upload->data()['file_name'];}
            else{$err_upload[] = $this->upload->display_errors();}

            if($this->upload->do_upload('dok_nota')){$dok_nota = $this->upload->data()['file_name'];}
            else{$err_upload[] = $this->upload->display_errors();}
            
            if($this->upload->do_upload('dok_turnitin')){$dok_turnitin = $this->upload->data()['file_name'];}
            else{$err_upload[] = $this->upload->display_errors();}
            
            if($this->upload->do_upload('dok_ujian')){$dok_ujian = $this->upload->data()['file_name'];}
            else{$err_upload[] = $this->upload->display_errors();}

            if($this->upload->do_upload('dok_keuangan')){$dok_keuangan = $this->upload->data()['file_name'];$config['file_name'] = 'dok_keuangan_'.$this->input->post('nim');}
            else{$err_upload[] = $this->upload->display_errors();}

            if(count($err_upload) <= 0){
                // $data = $this->upload->data();
                // $d = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->input->post('nim')));
                $param = array(
                    'nim' => $this->input->post('nim'),
                    'nama_mhs' => $this->input->post('nama_mhs'),
                    'id_prodi' => $this->input->post('id_prodi'),
                    'prodi' => $this->input->post('prodi'),
                    'tgl_pendaftaran' => date("Y-m-d H:i:s"),
                    'jns_penelitian' => $this->input->post('jns_laporan'),
                    'jenjang' => $this->input->post('jenjang'),
                    'judul_penelitian' => $this->input->post('judul'),
                    'jns_ujian' => '1',
                    'nip_pemb1' => $this->input->post('nip_pemb1'),
                    'nm_pemb1' => $this->input->post('nm_pemb1'),
                    'dok_pendaftaran' => $dok_pendaftaran,
                    'dok_bimbingan' => $dok_bimbingan,
                    'dok_persetujuan' => $dok_persetujuan,
                    'dok_nota' => $dok_nota,
                    'dok_turnitin' => $dok_turnitin,
                    'dok_ujian' => $dok_ujian,
                    'dok_keuangan' => $dok_keuangan,
                    'status_pendaftaran' => '0'
                );
                if($this->input->post('jenjang') == 'S3'){
                    $param['nip_pemb2'] = $this->input->post('nip_pemb2');
                    $param['nm_pemb2'] = $this->input->post('nm_pemb2');
                }
                echo $this->ujian->save_pendaftaran($param);
                // echo "oke";
            }else{
                echo implode("<br>",$err_upload);
            }
        }
    }
}