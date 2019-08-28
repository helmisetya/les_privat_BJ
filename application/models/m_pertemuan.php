<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_pertemuan extends CI_Model{
   function tampil_jam($id_penugasan){
		$q="SELECT pesan2.jam FROM penugasan , pesan2 WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_penugasan = $id_penugasan";
		$query = $this->db->query($q);
		return $query->row();
	}
	function tampil_pertemuan_ke($id_penugasan){
		$q="SELECT MAX(pertemuan.pertemuan_ke)+1 AS ke FROM pertemuan WHERE pertemuan.id_penugasan = $id_penugasan";
		$query = $this->db->query($q);
		return $query->row();
	}
	function data_pertemuan($id_penugasan){
		$q="SELECT penugasan.id_penugasan,penugasan.id_pengajar,penugasan.id_kons, penugasan.nama_kons,pesan2.nama_peserta, pesan2.materi, pesan2.hari, pesan2.jam, pesan2.tempat_pertemuan, penugasan.tgl_mulai, penugasan.tgl_selesai FROM penugasan , pesan2 , pengajar WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_pengajar = pengajar.id_pengajar AND penugasan.`status` NOT LIKE 'Tidak Aktif%' AND id_penugasan = $id_penugasan GROUP BY penugasan.id_penugasan";
		$query = $this->db->query($q);
		return $query->row();
	}
	function tambah_data($table,$data){
		$this->db->insert($table,$data);
	}
	function laporan_pertemuan_kons()
  {
		$ngambil =$this->session->userdata("iduser");
		$q="SELECT pertemuan.pertemuan_ke,konsumen.nama_siswa,pertemuan.materi,pertemuan.waktu_les,pertemuan.tgl_pertemuan,pertemuan.isi_pertemuan,pengajar.nama FROM pertemuan ,penugasan , konsumen, pengajar WHERE pertemuan.id_penugasan = penugasan.id_penugasan AND pertemuan.id_konsumen = konsumen.id_konsumen AND pertemuan.id_pengajar = pengajar.id_pengajar AND  konsumen.id_akun = $ngambil";
		$query = $this->db->query($q);
		return $query->result();
	}
	function laporan_pertemuan_pengajar(){
		$ngambil =$this->session->userdata("iduser");
		$q="SELECT pertemuan.id_penugasan, pertemuan.pertemuan_ke,konsumen.nama, pertemuan.materi, pertemuan.waktu_les, pertemuan.tgl_pertemuan, pertemuan.isi_pertemuan, konsumen.id_konsumen FROM pertemuan ,penugasan ,konsumen, pengajar WHERE pertemuan.id_penugasan = penugasan.id_penugasan AND pertemuan.id_pengajar = pengajar.id_pengajar AND pertemuan.id_konsumen = konsumen.id_konsumen AND pertemuan.id_pengajar = penugasan.id_pengajar AND pengajar.id_akun = $ngambil";
		$query = $this->db->query($q);
		return $query->result();
	}
}
