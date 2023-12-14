<?php

class M_account extends CI_model{
    public function auth(){
        $param = array(
            'username' => $this->input->post('uname'),
            'password' => md5($this->input->post('passwd')),
            'acc_type' => $this->input->post('acc_type')
        );
        $this->db->where($param);
        return $this->db->get('d_user');
    }

    public function auth_student(){
        $param = array(
            'username' => $this->input->post('uname'),       
            'password' => md5($this->input->post('passwd'))
        );
        $this->db->where($param);
        return $this->db->get('d_mahasiswa');
    }

    public function auth_dosen(){
        $param = array(
            'username' => $this->input->post('uname'),       
            'password' => md5($this->input->post('passwd'))
        );
        $this->db->where($param);
        return $this->db->get('d_dosen');
    }

    public function get_admin($where = false){
        if($where == true){
            $this->db->where($where);
        }
        return $this->db->get('d_user');
    }
}