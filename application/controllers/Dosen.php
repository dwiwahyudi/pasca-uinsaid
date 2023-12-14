<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dosen', 'dosen');
    }

    public function index()
    {
        // $this->load->view('welcome_message');
        redirect(base_url());
    }

    public function daftar($nim = false)
    {
        $this->load->library('table');
        $where = false;
        if ($nim == true) {
            $where = array('nim' => $nim);
        }
        $query = $this->dosen->get_dosen($where);
        $template = array(
            'table_open' => "<table width='100%' cellpadding='0' cellspacing='0' id='daftar-dosen' class='table table-sm table-bordered datatable'>",
            'thead_open' => "<thead class='bg-primary'>",
        );
        $this->table->set_heading(
            array('data' => 'NO','width' => '5%',),
            array('data' => 'NIP','width' => '10%',),
            array('data' => 'NAMA','width' => '20%',),
            array('data' => 'PANGKAT/GOL','width' => '15%',),
            array('data' => 'JABATAN','width' => '10%',),
            array('data' => 'BIDANG','width' => '15%',),
            array('data' => 'PENDIDIKAN','width' => '15%',), "#"
        );
        $this->table->set_template($template);
        // $data['data'] = $this->table->generate();
        $no = 1;
        if($query->num_rows() >= 1){
            foreach($query->result() as $data){
                $this->table->add_row(
                    $no,
                    $data->nip,
                    $data->nama,
                    $data->pangkat.'/'.$data->ruang,
                    $data->jabatan,
                    $data->matkul,
                    $data->pendidikan,
                    '<a href="'.base_url().'dosen/edit/'.$data->nip.'" class="btn btn-sm btn-primary">Edit</a> <a href="'.base_url().'dosen/delete/'.$data->nip.'" class="btn btn-sm btn-danger">Delete</a>'
                );
                $no++;
            }
        }
        // echo $this->table->generate();
        $dd['data'] = $this->table->generate();
        $header['css'] = array('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
        $footer['js'] = array('assets/plugins/datatables/jquery.dataTables.js', 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', 'assets/dist/js/mahasiswa.js');
        $this->load->view('template/header', $header);
        $this->load->view('dosen/daftar', $dd);
        $this->load->view('template/footer', $footer);
    }

    public function get_dosen()
    {
        $query = $this->dosen->get_dosen();
        $data = [];
        if ($query->num_rows() >= 1) {
            $no = 1;
            foreach ($query->result() as $d) {
                $data[] = array(
                    'no' => $no,
                    'nim' => $d->nim,
                    'nama' => $d->nama,
                    'prodi' => $d->prodi,
                    'thn_masuk' => $d->thn_masuk,
                    'kota' => $d->kota,
                    'nim' => $d->nim,
                );
                $no++;
            }
        }

        $callback = array(
            'draw' => 1,
            'recordsTotal' => $query->num_rows(),
            'recordsFiltered' => $query->num_rows(),
            'data' => $data,
        );
        echo json_encode($callback);
    }

    public function get_dosen_list(){
        $query = $this->dosen->get_dosen();
        $data = [];
        foreach($query->result() as $d){
            $res[] = array(
                'id'=>$d->nip,
                'text'=>$d->nama
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
