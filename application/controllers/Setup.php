<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('uid') && !$this->session->userdata('acc_type')){
		    redirect(base_url());
            exit();
		}else{
            $this->load->model('M_setup', 'setup');
            $header['css'] = array();
            $footer['js'] = array();
        }
    }

    public function get_pejabat_list(){
        $query = $this->setup->get_pejabat();
        $data = [];
        foreach($query->result() as $d){
            $res[] = array(
                'id'=>$d->id_pejabat,
                'text'=>$d->nip.' | '.$d->nama.' | '.$d->nm_jabatan
            );
        }
        $data = $res;
        // $data = array(
        //     'results' => $res,
        //     "pagination" => 
        // );
        echo json_encode($data);
    }

}