<?php

Class M_surat extends CI_model{
    public function get_surat($where = false){
        $this->db->select("d_permohonan.*,d_mahasiswa.*,d_permohonan.status as sts_permohonan,r_jns_surat.*");
        if($where == true){
            $this->db->where($where);
        }
        $this->db->join('d_mahasiswa','d_mahasiswa.nim = d_permohonan.nim');
        $this->db->join('r_jns_surat','d_permohonan.id_jns_surat = r_jns_surat.id_jns_surat');
        $this->db->order_by('d_permohonan.tgl_masuk','desc');
        return $this->db->get('d_permohonan');
    }

    public function get_surat_keluar($where){
        if($where == true){
            $this->db->where($where);
        }
        return $this->db->get('d_surat_keluar');
    }

    public function get_cuti($where = false){
        if($where == true){
            $this->db->where($where);
        }
        return $this->db->get('d_surat_cuti');
    }

    public function get_jenis_surat( $eksternal = false, $jns_surat = false){
        $where = array('tampil' => 'Y');
        if($eksternal == true && $eksternal == '0'){
            $where['eksternal'] = 'N';
        }else{            
            $where['eksternal'] = 'Y';
        }
        if($jns_surat == true){
            // $this->db->where('id_jns_surat',$jns_surat);
            $where['id_jns_surat'] = $jns_surat;
        }
        return $this->db->get_where('r_jns_surat',$where);
    }

    public function get_pejabat(){
        return $this->db->get('d_pengaturan');
    }

    public function set_proses($do,$id){
        if($do == 'tolak'){
            $param = array('catatan'=>$this->input->post('catatan'),'tgl_tolak'=>date("Y-m-d H:i:s"),'status'=>'3');
        }else{
            $param = array('catatan'=>$this->input->post('catatan'),'tgl_proses'=>date("Y-m-d H:i:s"),'status'=>'1');
        }
        if($this->db->update('d_permohonan',$param,array('id'=>$id))){
            return 'done';
        }else{
            return $this->db->error();
        }
    }

    public function get_last_number(){
        return $this->db->query("select max(no_surat) from v_surat");
    }

    public function get_last_ext($where){
        $this->db->where($where);
        return $this->db->get('v_surat');
    }
    
    public function save_cuti(){
        $param = array(
            'id_permohonan'=>$this->input->post('id_permohonan'),
            'nim'=>$this->input->post('nim'),
            'nama'=>$this->input->post('nama'),
            'id_prodi'=>$this->input->post('id_prodi'),
            'prodi'=>$this->input->post('prodi'),
            'id_jns_surat'=>'2',
            'no_surat'=>$this->input->post('no_surat'),
            'ext_surat'=>$this->input->post('ext_surat'),
            'tgl_surat'=>date("Y-m-d"),
            'cuti_semester'=>$this->input->post('semester'),
            'cuti_ta'=>$this->input->post('ta'),
            'pejabat'=>$this->input->post('jbt'),
            'nm_pejabat'=>$this->input->post('nm'),
            'nip_pejabat'=>$this->input->post('nip'),
            'status_surat'=>'1'
        );

        $sql = "INSERT INTO d_surat_keluar
        (id_permohonan, nim, nama, id_prodi, prodi, id_jns_surat, no_surat, ext_surat, tgl_surat, cuti_semester, cuti_ta, pejabat, nm_pejabat, nip_pejabat,status_surat)
        VALUES
        (
            '".$this->input->post('id_permohonan')."', 
            '".$this->input->post('nim')."', 
            '".$this->input->post('nama')."', 
            '".$this->input->post('id_prodi')."', 
            '".$this->input->post('prodi')."', 
            '2', 
            '".$this->input->post('no_surat')."', 
            '".$this->input->post('ext_surat')."', 
            '".date("Y-m-d",strtotime($this->input->post('tgl_surat')))."', 
            '".$this->input->post('semester')."', 
            '".$this->input->post('ta')."', 
            '".$this->input->post('jbt')."', 
            '".$this->input->post('nm')."', 
            '".$this->input->post('nip')."',
            '1')
        ON DUPLICATE KEY UPDATE
            id_permohonan = '".$this->input->post('id_permohonan')."',
            nim = '".$this->input->post('nim')."',
            nama = '".$this->input->post('nama')."',
            id_prodi = '".$this->input->post('id_prodi')."',
            prodi = '".$this->input->post('prodi')."',
            id_jns_surat = '2',
            no_surat = '".$this->input->post('no_surat')."',
            ext_surat = '".$this->input->post('ext_surat')."',
            tgl_surat = '".date("Y-m-d",strtotime($this->input->post('tgl_surat')))."',
            cuti_semester = '".$this->input->post('semester')."',
            cuti_ta = '".$this->input->post('ta')."',
            pejabat = '".$this->input->post('jbt')."',
            nm_pejabat = '".$this->input->post('nm')."',
            nip_pejabat = '".$this->input->post('nip')."',
            status_surat = '1'
            ";

        if($this->db->query($sql) && $this->db->update('d_permohonan',array('status'=>'1','tgl_proses'=>date("Y-m-d H:i:s")),array('id'=>$this->input->post('id_permohonan')))){
            // if($this->db->insert('d_surat_cuti',$param) && $this->db->update('d_permohonan',array('status'=>'1','tgl_proses'=>date("Y-m-d H:i:s")),array('id'=>$this->input->post('id_permohonan')))){
            return json_encode(array('status'=>'success','msg'=>$this->db->insert_id()));
        }else{
            return json_encode(array('status'=>'error','msg'=>$this->db->error()));
        }
    }

    public function simpan_permohonan($param){
        if($this->db->insert('d_permohonan',$param)){
            return json_encode(array('status'=>'done','msg'=>'Data berhasil disimpan!'));
        }else{
            return json_encode(array('status'=>'error','msg'=>$this->db->error()));
        }
    }

    public function save_proses_permohonan(){
        $param = array(
            'id_permohonan'=>$this->input->post('id_permohonan'),
            'nim'=>$this->input->post('nim'),
            'nama'=>$this->input->post('nama'),
            'id_prodi'=>$this->input->post('id_prodi'),
            'prodi'=>$this->input->post('prodi'),
            'id_jns_surat'=>$this->input->post('id_jns_surat'),
            'no_surat'=>$this->input->post('no_surat'),
            'ext_surat'=>$this->input->post('ext_surat'),
            'tgl_surat'=>date("Y-m-d"),
            'cuti_semester'=>$this->input->post('semester'),
            'cuti_ta'=>$this->input->post('ta'),
            'pejabat'=>$this->input->post('jbt'),
            'nm_pejabat'=>$this->input->post('nm'),
            'nip_pejabat'=>$this->input->post('nip'),
            'status_surat'=>'1'
        );
    }

    public function get_riwayat($where = false){
        if($where == true){
            $this->db->where($where);
        }
        // $this->db->join('r_jns_surat','r_jns_surat.id_jns_surat = d_surat_keluar.id_jns_surat');
        return $this->db->get('v_surat');
    }

    public function get_riwayat_permohonan($where){
        if($where == true){
            $this->db->where($where);
        }
        $this->db->join('r_jns_surat','r_jns_surat.id_jns_surat = d_permohonan.id_jns_surat');
        return $this->db->get('d_permohonan');
    }
}