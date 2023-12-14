<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_mahasiswa','mahasiswa');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function daftar($nim=false){
		$this->load->library('table');
		$where = false;
		if($nim == true){
			$where = array('nim'=>$nim);
		}
		$query = $this->mahasiswa->get_mahasiswa($where);
		$template = array(
			'table_open' => "<table width='100%' cellpadding='0' cellspacing='0' id='daftar-mahasiswa' class='table table-sm table-bordered'>",
			'thead_open' => "<thead class='bg-primary'>"
		);
		$this->table->set_heading(
			array(
				'data'=>'NO',
				'width' => '5%'
			),
			array(
				'data' => 'NIM',
				'width' => '10%'
			),
			array(
				'data' => 'NAMA',
				'width' => '25%'
			),
			array(
				'data' => 'PRODI',
				'width' => '30%'
			),
			array(
				'data' => 'ANGKATAN',
				'width' => '10%'
			),
			array(
				'data' => 'ASAL',
				'width' => '20%'
			),"#"
		);
		$this->table->set_template($template);
		$data['data'] = $this->table->generate();
		$header['css'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
		$footer['js'] = array('assets/plugins/datatables/jquery.dataTables.js','assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js','assets/dist/js/mahasiswa.js');
		$this->load->view('template/header',$header);
		$this->load->view('mahasiswa/daftar',$data);
		$this->load->view('template/footer',$footer);
	}

	public function get_mahasiswa(){
		$query = $this->mahasiswa->get_mahasiswa();
		$data = [];
		if($query->num_rows() >= 1){
			$no = 1;
			foreach($query->result() as $d){
				$data[] = array(
					'no' => $no,
					'nim' =>$d->nim,
					'nama' =>$d->nama,
					'prodi' =>$d->prodi,
					'thn_masuk' =>$d->thn_masuk,
					'kota' =>$d->kota,
					'nim' =>$d->nim
				);
				$no++;
			}
		}

		$callback = array(
			'draw' => 1,
			'recordsTotal' => $query->num_rows(),
			'recordsFiltered' => $query->num_rows(),
			'data'=>$data
		);
		echo json_encode($callback);
	}

	public function get_mahasiswa2($nim = false, $type = false){
        if($nim == true){
            if($nim == 'all'){ //tampilkan semua data mahasiswa baik yang aktif maupun tidak aktif
				$where = null; 
            }else{
				$where = array("d_mahasiswa.nim"=>$nim,"d_mahasiswa.status IN ('1','2')"=>null);
			}
        }else{
			$where = array("d_mahasiswa.status IN ('1','2')"=>null);
		}
        $data = $this->mahasiswa->get_mahasiswa2($where);
		if($type == 'json'){
			// echo $this->db->last_query()."<br>";
        	echo json_encode($data->result());
		}else{
			echo $data;
		}
    }

	public function get_kota($id_propinsi)
    {
        echo json_encode($this->mahasiswa->get_kota($id_propinsi)->result_array());
    }

    public function get_kecamatan($id_kota)
    {
        echo json_encode($this->mahasiswa->get_kecamatan($id_kota)->result_array());
    }

    public function get_kelurahan($id_kecamatan)
    {
        echo json_encode($this->mahasiswa->get_kelurahan($id_kecamatan)->result_array());
    }

	public function get_prodi()
	{
		echo $this->mahasiswa->get_prodi();
	}

	public function save_profile($nim = false){
		if($nim == false){
			echo json_encode(array('status'=>'error','msg'=>'Error! Illegal access!'));
		}else{
			$config['upload_path']="./assets/foto";
        	$config['allowed_types']='gif|jpg|png';
			$config['file_name'] = $nim;
			$config['overwrite'] = TRUE;
			
			if($_FILES['foto']['name'] !== ''){
				$this->load->library('upload',$config);
				if($this->upload->do_upload('foto')){
					$data = $this->upload->data(); //ambil file name yang diupload
					$image= $data['file_name']; //set file name ke variable image
					$param['foto'] = $image;
					$param = array(
						'nama' => $this->input->post('nama'),
						'tempat_lahir' => $this->input->post('tempat_lahir'),
						'tgl_lahir' => $this->input->post('tgl_lahir'),
						'alamat' => $this->input->post('alamat'),
						'rt' => $this->input->post('rt'),
						'rw' => $this->input->post('rw'),
						'id_kelurahan' => $this->input->post('id_kelurahan'),
						'kelurahan' => $this->input->post('kelurahan'),
						'id_kecamatan' => $this->input->post('id_kecamatan'),
						'kecamatan' => $this->input->post('kecamatan'),
						'id_kota' => $this->input->post('id_kota'),
						'kota' => $this->input->post('kota'),
						'id_propinsi' => $this->input->post('id_propinsi'),
						'propinsi' => $this->input->post('propinsi'),
						'negara' => $this->input->post('negara'),
						'kdpos' => $this->input->post('kdpos'),
						'jarak' => $this->input->post('jarak'),
						'waktu' => $this->input->post('waktu'),
						'email' => $this->input->post('email'),
						'hp' => $this->input->post('hp'),
						'foto'=> $image,
						'thn_masuk' => $this->input->post('thn_masuk'),
						'sms_masuk' => $this->input->post('sms_masuk'),
						'medsos_ig' => $this->input->post('medsos_ig'),
						'medsos_x' => $this->input->post('medsos_x'),
						'medsos_fb' => $this->input->post('medsos_fb')
					);
		
					if($this->session->userdata('acc_type') !== '10'){
						$param['id_fakultas'] = $this->input->post('id_fakultas');
						$param['fakultas'] = $this->input->post('fakultas');
						$param['id_prodi'] = $this->input->post('id_prodi');
						$param['prodi'] = $this->input->post('prodi');
						$param['jenjang'] = $this->input->post('jenjang');
					}
					echo $this->mahasiswa->save_profile($param,$nim);
				}else{
					echo json_encode(array('status'=>'error','msg'=>$this->upload->display_error()));
				}
			}else{
				echo $this->mahasiswa->save_profile($param,$nim);
				// echo json_encode(array('status'=>'error','msg'=>$this->input->post('prodi')));
			}			
		}
	}

	public function save_password($nim = false){
		if($nim == false){
			echo "Error! You are not allowed to access this page!";
		}else{
			echo $this->mahasiswa->save_password($nim);
		}
	}
}
