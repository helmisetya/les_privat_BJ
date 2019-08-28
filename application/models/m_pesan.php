<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_pesan extends CI_Model{
    function get_id_kons(){
		$ngambil =$this->session->userdata("iduser");
		$this->db->select('id_konsumen');
		$this->db->from('konsumen');
		$this->db->where('id_akun', $ngambil);
		$query = $this->db->get();
		return $query->result();
    }
    function get_data_kons(){
    	$ngambil =$this->session->userdata("iduser");
    	$q="SELECT * FROM konsumen WHERE konsumen.id_akun = $ngambil";
    	$query = $this->db->query($q);
		return $query->result();
    }	
    function simpan_les($data){
		$this->db->insert('pesan2',$data);
    }
    function tampil_pesanan(){
		$ngambil =$this->session->userdata("iduser");
		$q = "SELECT * FROM pesan2 WHERE concat(materi,hari,jam) in (SELECT concat (keahlian2.materi,waktu_ngajar2.hari,waktu_ngajar2.waktu) FROM `waktu_ngajar2` INNER join keahlian2 on waktu_ngajar2.id_pengajar = keahlian2.id_pengajar INNER JOIN pengajar on waktu_ngajar2.id_pengajar = pengajar.id_pengajar where keahlian2.id_pengajar = pengajar.id_pengajar and pengajar.id_akun=$ngambil and pesan2.`status` = 'belum mendapat pengajar' )";

		$query = $this->db->query($q);
		return $query->result();
	}
	function data_ambil_pesan($id_pesan){
		$q="SELECT * FROM pesan2 WHERE concat(materi,hari,jam) in (SELECT concat (keahlian2.materi,waktu_ngajar2.hari,waktu_ngajar2.waktu) FROM `waktu_ngajar2` INNER join keahlian2 on waktu_ngajar2.id_pengajar = keahlian2.id_pengajar INNER JOIN pengajar on waktu_ngajar2.id_pengajar = pengajar.id_pengajar where keahlian2.id_pengajar = pengajar.id_pengajar and id_pesan = $id_pesan )";
		$query = $this->db->query($q);
		return $query->row();
	}
	function tambah_data($table,$data){
		$this->db->insert($table,$data);
	}
	function update_ambil_pesan($where, $data1, $table){
		$this->db->where($where);
		$this->db->update($table, $data1);
	}
}