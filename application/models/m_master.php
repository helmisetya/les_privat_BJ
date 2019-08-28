<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_master extends CI_Model{
   function daftar_pgjr(){
		$q= "SELECT * FROM pengajar";
		$query = $this->db->query($q);
		return $query->result();
	}
	function detail_bio_pgjr($id_pengajar){
		$q="SELECT * FROM pengajar WHERE id_pengajar = $id_pengajar ";
		$query = $this->db->query($q);
		return $query->result();
	}
	function detail_penugasan($id_pengajar){
		$q= "SELECT * FROM  pesan2, penugasan WHERE penugasan.id_pesan = pesan2.id_pesan AND id_pengajar = $id_pengajar ";
		$query = $this->db->query($q);
		return $query->result();
	}
	function detail_keahlian($id_pengajar){
		$q= "SELECT * FROM  keahlian2 WHERE id_pengajar = $id_pengajar ";
		$query = $this->db->query($q);
		return $query->result();
	}
	function detail_waktu($id_pengajar){
		$q= "SELECT * FROM  waktu_ngajar2 WHERE id_pengajar = $id_pengajar ORDER BY id_waktu_ngajar ASC";
		$query = $this->db->query($q);
		return $query->result();
	}
  function jmlh_penugasan_aktif_pgjr($id_pengajar)
  {
    $q="SELECT count(id_penugasan) AS jmlh FROM penugasan,pengajar where penugasan.`status` like 'Aktif%' AND penugasan.id_pengajar = pengajar.id_pengajar AND pengajar.id_pengajar= $id_pengajar";
    $query = $this->db->query($q);
    return $query->result();
  }
  function jmlh_penugasan_tidak_aktif_pgjr($id_pengajar)
  {
    //$ngambil =$this->session->userdata("iduser");
    $q="SELECT count(id_penugasan) AS jmlh FROM penugasan,pengajar where penugasan.`status` like 'Tidak Aktif' AND penugasan.id_pengajar = pengajar.id_pengajar AND pengajar.id_pengajar= $id_pengajar";
    $query = $this->db->query($q);
    return $query->result();
  }
  function daftar_kons()
  {
    $q= "SELECT * FROM konsumen";
		$query = $this->db->query($q);
		return $query->result();
  }
  function detail_bio_kons($id_konsumen){
    $q="SELECT * FROM konsumen WHERE id_konsumen = $id_konsumen ";
    $query = $this->db->query($q);
    return $query->result();
  }
  function jmlh_penugasan_aktif_kons($id_konsumen)
  {
    $q="SELECT count(id_penugasan) AS jmlh FROM penugasan,konsumen where penugasan.`status` like 'Aktif%' AND penugasan.id_kons = konsumen.id_konsumen AND konsumen.id_konsumen= $id_konsumen";
    $query = $this->db->query($q);
    return $query->result();
  }
  function jmlh_penugasan_tidak_aktif_kons($id_konsumen)
  {
    //$ngambil =$this->session->userdata("iduser");
    $q="SELECT count(id_penugasan) AS jmlh FROM penugasan,konsumen where penugasan.`status` like 'Tidak Aktif' AND penugasan.id_kons = konsumen.id_konsumen AND konsumen.id_konsumen= $id_konsumen";
    $query = $this->db->query($q);
    return $query->result();
  }
  function daftar_penugasan()
  {
    $q="SELECT penugasan.id_penugasan, penugasan.id_pesan,pengajar.nama as nama_pgjr,konsumen.nama as nama_kons,konsumen.nama_siswa,penugasan.tgl_mulai,penugasan.tgl_selesai,penugasan.`status`,pesan2.materi,pesan2.hari,pesan2.jam, DATEDIFF(CURDATE(),penugasan.tgl_selesai) as waktu_habis FROM penugasan ,pengajar ,konsumen ,pesan2 WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_kons = konsumen.id_konsumen AND penugasan.id_pengajar = pengajar.id_pengajar";
    $query = $this->db->query($q);
    return $query->result();
  }
  function detailnya_penugasan($id_penugasan)
  {
    $q="SELECT penugasan.id_penugasan, penugasan.id_pesan,pengajar.nama as nama_pgjr,konsumen.nama as nama_kons,konsumen.nama_siswa,penugasan.tgl_mulai,penugasan.tgl_selesai,penugasan.`status`,pesan2.materi,pesan2.hari,pesan2.jam, DATEDIFF(CURDATE(),penugasan.tgl_selesai) as waktu_habis FROM penugasan ,pengajar ,konsumen ,pesan2 WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_kons = konsumen.id_konsumen AND penugasan.id_pengajar = pengajar.id_pengajar AND id_penugasan = $id_penugasan";
    $query = $this->db->query($q);
    return $query->row();
  }
  function update_data($where, $data, $table){
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  function update_status_pesan($where1, $data1, $table){
    $this->db->where($where1);
    $this->db->update($table, $data1);
  }
}
