<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
                if($this->session->has_userdata('uid') && $this->session->has_userdata('passwd') && $this->session->has_userdata('acc_type') && $this->session->has_userdata('acc_type')){
                        $this->load->view('template/header');
                        if($this->session->userdata('acc_type') == '10'){ //jika login sebagai mahasiswa
                                $this->load->model('M_mahasiswa','mhs');
                                $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
                                $this->load->view('pages/home-mahasiswa',$data);
                        }else{
                                $data['data'] = array();
                        }
                        $this->load->view('template/footer');
                }
                else{
                        $this->load->view('template/header1');
                        $this->load->view('pages/home');
                        $this->load->view('template/footer1');
                }
	}

        public function AuthUser()
        {
        //     echo $this->session->userdata('uid')."<br>".$this->session->userdata('passwd')."<br>".$this->session->userdata('acc_type');

                if(!$this->session->userdata('uid') && !$this->session->userdata('passwd') && !$this->session->userdata('acc_type')){
		        header("refresh:1;url=" . base_url());
                }else{
                        $this->load->view('template/header');
                        if($this->session->userdata('acc_type') == '10'){ //jika login sebagai mahasiswa
                                $this->load->model('M_mahasiswa','mhs');
                                $data['data'] = $this->mhs->get_mahasiswa(array('d_mahasiswa.nim'=>$this->session->userdata('nim')))->row();
                                $this->load->view('pages/home-mahasiswa',$data);
                        }else{
                                $data['data'] = array();
                        }
                        $this->load->view('template/footer');
                }
        }

}
