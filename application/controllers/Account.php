<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_account','account');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function registration()
    {
		$this->load->model('M_main','main');
		$header['css'] = array('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');
		$data['prodi'] = $this->main->get_prodi();
        $this->load->view('template/header1',$header);
        $this->load->view('pages/registration',$data);
        $this->load->view('template/footer1');
    }

	public function Auth()
	{
		// $this->load->model('M_account','account');
		// $this->load->view('template/header1');
		if($this->session->has_userdata('uid') && $this->session->userdata('passwd') && $this->session->has_userdata('acc_type')){
			$this->load->view('template/header');
			$this->load->view('pages/home-admin');
			$this->load->view('template/footer');
		}else{
			$this->load->view('pages/login');
		}
		// $this->load->view('template/footer1');	
	}

	public function signin(){
		if($this->input->post('acc_type') == '10') #login as mahasiswa
		{
			$query = $this->account->auth_student();
			if($query->num_rows() >= 1){
				$data = $query->row();
				$param = array(
					'uid' => md5($data->uid),
					'nim' => $data->nim,
					'prodi' => $data->prodi,
					'passwd' => md5($data->password),
					'nama' => $data->nama,
					'jenjang' => $data->jenjang,
					'acc_type' => '10'
				);
				$this->db->update('d_mahasiswa',array('last_login'=>date("Y-m-d H:i:s")),array('nim'=>$data->nim));
				$this->session->set_userdata($param);
				echo "done";
			}else{
				echo "Username/password is wrong!";
			}
		}else if($this->input->post('acc_type') == '5') #login as dosen
		{
			$query = $this->account->auth_dosen();
			if($query->num_rows() >= 1){
				$data = $query->row();
				$param = array(
					'uid' => md5($data->uid),
					'nip' => $data->nip,
					'passwd' => md5($data->password),
					'nama' => $data->nama,
					'acc_type' => '5'
				);
				$this->db->update('d_dosen',array('last_login'=>date("Y-m-d H:i:s")),array('nip'=>$data->nip));
				$this->session->set_userdata($param);
				echo "done";
			}else{
				echo "Username/password is wrong!";
			}
		}else{
			$query = $this->account->auth();
			if($query->num_rows() >= 1){
				$data = $query->row();
				$param = array(
					'uid' => encrypt($data->uid),
					'passwd' => md5($data->password),
					'nama' => $data->nama,
					'acc_type' => $data->acc_type
				);
				$this->db->update('d_user',array('last_login'=>date("Y-m-d H:i:s")),array('uid'=>$data->uid));
				$this->session->set_userdata($param);
				echo "done";
			}else{
				echo "Username/password is wrong!";
			}
		}
	}

	public function signout(){
		session_destroy();
		header("Location: " . base_url() . 'index.php', true, 301);
		exit();
	}

	public function profile(){
		if($this->session->has_userdata('uid') && $this->session->has_userdata('acc_type')){
			$header['css'] = [];
			$footer['js'] = [];
			$this->load->view('template/header');
			if($this->session->userdata('acc_type') == '10'){
				$this->load->model('M_mahasiswa','mahasiswa');
				$where = array('d_mahasiswa.nim'=>$this->session->userdata('nim'));
				$data['data'] = $this->mahasiswa->get_mahasiswa($where)->row();
				$data['negara'] = $this->db->get('r_negara');
				$data['propinsi'] = $this->db->get('r_propinsi');
				$data['kota'] = $this->db->get_where('r_kota',array('id_propinsi'=>$data['data']->id_propinsi));
				$data['kecamatan'] = $this->db->get_where('r_kecamatan',array('id_kota'=>$data['data']->id_kota));
				// $data['sql'] = $this->db->last_query();
				$data['kelurahan'] = $this->db->get_where('r_kelurahan',array('id_kecamatan'=>$data['data']->id_kecamatan));
				$data['data'] = $this->mahasiswa->get_mahasiswa($where)->row();
				$data['prodi'] = $this->mahasiswa->get_prodi()->result();
				$this->load->view('mahasiswa/profile_mhs',$data);
				array_push($footer['js'],'assets/dist/js/mahasiswa.js');
			}else if($this->session->userdata('acc_type') == '5'){
				$this->load->model('M_dosen','dosen');
				$where = array('nip' =>$this->session->userdata('nip'));
				$data['data'] = $this->dosen->get_dosen($where); 
				$this->load->view('pages/profile_dosen',$data);
			}else{
				$where = array('uid' =>$this->session->userdata('uid'));
				$data['data'] = $this->account->get_admin();
				$this->load->view('pages/profile_admin',$data);
			}
			$this->load->view('template/footer',$footer);
		}else{
			redirect(base_url());
		}
	}

	public function change_password(){
        if(!$this->session->userdata('uid') && !$this->session->userdata('acc_type')){
		    redirect(base_url());
		}else{
			$header['css'] = [];
			$footer['js'] = [];
			$this->load->view('template/header');
			if($this->session->userdata('acc_type') == '10'){
				$this->load->model('M_mahasiswa','mahasiswa');
				$data['data'] = $this->mahasiswa->get_mahasiswa(array('nim'=>$this->session->userdata('nim')))->row();
				$data['sql'] = $this->db->last_query();
				$this->load->view('mahasiswa/change-password',$data);
				array_push($footer['js'],'assets/dist/js/mahasiswa.js');
			}
			$this->load->view('template/footer',$footer);

        }
    }
}

