<?php

Class M_dosen extends CI_model{
    public function get_dosen($where = false){
        if($where == true){
            $this->db->where($where);
        }
        $this->db->join('t_golongan','d_dosen.kdgol = t_golongan.kdgol');
        $this->db->order_by('d_dosen.jabatan');
        return $this->db->get('d_dosen');
    }
}