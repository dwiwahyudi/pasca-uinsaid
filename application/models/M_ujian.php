<?php

class M_ujian extends CI_model{
    public function get_ujian($where = false){
        if($where == true){
            $this->db->where($where);
        }
        $this->db->join('r_ujian','r_ujian.jns_ujian = d_ujian.jns_ujian');
        return $this->db->get('d_ujian');
    }
    public function get_ref_ujian($jns_ujian = false){
        if($jns_ujian == true){
            $this->db->where('jns_ujian',$jns_ujian);
        }
        return $this->db->get('r_ujian');
    }

    public function save_pendaftaran($param){
        if($this->db->insert('d_ujian',$param) && 
        $this->db->update('d_penelitian',array('judul_penelitian'=>$this->input->post('judul')),array('nim'=>$this->input->post('nim')))){
            return 'done';
        }else{
            return $this->db->error();
        }
    }

}