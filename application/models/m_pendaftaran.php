<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_pendaftaran extends CI_Model{
    function get_id_akun(){
		$ngambil = $this->session->userdata("username");
		$this->db->select('id_user');
		$this->db->from('user');
		$this->db->where('username',$ngambil);
		$query = $this->db->get();
		return $query->result();
	}
	function tambah_data($table,$data){
		$this->db->insert($table,$data);
	}
	function get_data_pgjr(){
		$ngambil =$this->session->userdata("iduser");
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->where('id_akun', $ngambil);
		$query = $this->db->get();
		return $query->row();
	}
	function tambah_keahlian($data)
    {
      	$this->db->insert('keahlian2',$data);
    }
    
	function tambah_waktu_ngajar($data){
		$this->db->insert('waktu_ngajar2',$data);
	}
}
