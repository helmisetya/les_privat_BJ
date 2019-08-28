<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_penugasan extends CI_Model{
    function pesanan_sudah_terambil(){
		$q="SELECT * FROM pesan2 where status = 'Sudah terambil' ";

		$query = $this->db->query($q);
		return $query->result();
	}
	function pesanan_belum_terambil(){
		$q="SELECT * FROM pesan2 where status = 'belum mendapat pengajar' ";

		$query = $this->db->query($q);
		return $query->result();
	}
	function data_acc_penugasan($id_pesan){
		$q= "SELECT * FROM penugasan , pesan2, pengajar WHERE penugasan.id_pesan = $id_pesan AND penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_pengajar = pengajar.id_pengajar";
		$query = $this->db->query($q);
		return $query->row();
	}
	function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function update_status_pesan($where, $data1, $table){
		$this->db->where($where);
		$this->db->update($table, $data1);
	}
	function data_entri_penugasan($id_pesan){
		$s = "SELECT * FROM pesan2, konsumen WHERE pesan2.id_konsumen = konsumen.id_konsumen AND id_pesan ='$id_pesan'";
		$query = $this->db->query($s);
		return $query->row();
	}
	function data_pengajar_sesuai_pesanan($id_pesan){
		$a = "SELECT pengajar.id_pengajar, pengajar.nama, keahlian2.materi,waktu_ngajar2.hari,waktu_ngajar2.waktu FROM pesan2 ,pengajar ,keahlian2 ,waktu_ngajar2 WHERE pesan2.materi = keahlian2.materi AND pesan2.hari = waktu_ngajar2.hari AND pesan2.jam = waktu_ngajar2.waktu AND pesan2.id_pesan = $id_pesan AND pengajar.id_pengajar = keahlian2.id_pengajar GROUP BY id_pengajar";
		$query = $this->db->query($a);
		return $query->result();
	}
	function tambah_data($table,$data){
		$this->db->insert($table,$data);
	}
}
