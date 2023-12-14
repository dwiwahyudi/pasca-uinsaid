<?php

Class M_mahasiswa extends CI_model{
    public function get_mahasiswa($where = false){
        if($where == true){
            $this->db->where($where);
        }
        $this->db->join('d_penelitian','d_penelitian.nim = d_mahasiswa.nim','left');
        $this->db->join('r_prodi','r_prodi.id_prodi = d_mahasiswa.id_prodi');
        return $this->db->get('d_mahasiswa');
    }
    
    public function get_mahasiswa2($where = false){
        if($where == true){
            $this->db->where($where);
        }
        return $this->db->get('d_mahasiswa');
    }

    public function get_prodi(){
        return $this->db->get('r_prodi');
    }

    public function get_penelitian($where = false){
        if($where == true){
            $this->db->where($where);
        }
        return $this->db->get('d_penelitian');
    }
    public function get_kota($id_propinsi = false){
        if($id_propinsi == true){
            $this->db->where('id_propinsi',$id_propinsi);
        }
        return $this->db->get('r_kota');
    }
    public function get_kecamatan($id_kota = false){
        if($id_kota == true){
            $this->db->where('id_kota',$id_kota);
        }
        return $this->db->get('r_kecamatan');
    }
    public function get_kelurahan($id_kecamatan = false){
        if($id_kecamatan == true){
            $this->db->where('id_kecamatan',$id_kecamatan);
        }
        return $this->db->get('r_kelurahan');
    }

    public function save_profile($param,$nim){
        if($this->db->update('d_mahasiswa',$param,array('nim'=>$nim))){
			echo json_encode(array('status'=>'done','msg'=>'Data berhasil disimpan!'));
        }else{
			echo json_encode(array('status'=>'error','msg'=>$this->db->error()));
        }
    }

    public function save_password($nim){
        if($this->db->update('d_mahasiswa',array('password'=>md5($this->input->post('password'))),array('nim'=>$nim))){
            return 'done';
        }else{
            return $this->db->last_query();
        }
    }
}