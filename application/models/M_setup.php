<?php

Class M_setup extends CI_model{
    public function get_pejabat($where = false){
        if($where == true){
            $this->db->where($where);
        }
        return $this->db->get('d_pejabat');
    }

    public function get_prodi($id_prodi = false){
        if($id_prodi == true){
            $this->db->where(array('id_prodi'=>$id_prodi));
        }
        return $this->db->get('r_prodi');
    }

    // public function get_mahasiswa($where = false,$type = false){
    //     if($where == true){
    //         $this->db->where($where);
    //     }
    //     $query = $this->db->get('d_mahasiswa');
    //     if($type == true && $type == 'json'){
    //         return json_encode($query->result());
    //     }else{
    //         return $query;
    //     }
    // }

}