<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_ganti_jadwal extends CI_Model{
 	 function jadwal_les(){
    	$ngambil = $this->session->userdata("iduser");
		$q="SELECT penugasan.id_penugasan,penugasan.id_pesan, pengajar.nama AS nama_guru, pesan2.materi, pesan2.hari, pesan2.jam, pesan2.tempat_pertemuan,penugasan.tgl_mulai,penugasan.tgl_selesai,konsumen.nama FROM penugasan ,pesan2 ,konsumen ,pengajar WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_kons = pesan2.id_konsumen AND penugasan.id_kons = konsumen.id_konsumen AND penugasan.id_pengajar = pengajar.id_pengajar AND penugasan.`status` LIKE 'Aktif' AND konsumen.id_akun =$ngambil";
		$query = $this->db->query($q);
		return $query->result();
	}
 	function data_ganti_jadwal_les($id_penugasan){
 		 $q="SELECT * FROM penugasan ,pesan2 ,konsumen WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_kons = pesan2.id_konsumen AND penugasan.id_kons = konsumen.id_konsumen AND penugasan.`status` LIKE 'Aktif' AND id_penugasan = $id_penugasan";
		$query = $this->db->query($q);
		return $query->row();
 	}
 	function tambah_data($table,$data){
		$this->db->insert($table,$data);
	}
	function simpan_ganti_les($data){
		$this->db->insert('minta_ganti_jadwal_les',$data);
    }
  function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function update_status_minta_ganti($where1, $data1, $table){
		$this->db->where($where1);
		$this->db->update($table, $data1);
	}
  function update_hari_jam_pesanan($where2, $data2, $table){
		$this->db->where($where2);
		$this->db->update($table, $data2);
	}
	function daftar_permintaan_ganti_les(){
		$q="SELECT * FROM minta_ganti_jadwal_les, konsumen WHERE minta_ganti_jadwal_les.id_konsumen = konsumen.id_konsumen AND minta_ganti_jadwal_les.`status` = 'belum di verifikasi'";
		$query = $this->db->query($q);
		return $query->result();
	}
	function data_permintaan_ganti_les($id_penugasan_lama){
		$q="SELECT * FROM minta_ganti_jadwal_les, konsumen WHERE minta_ganti_jadwal_les.id_konsumen = konsumen.id_konsumen AND id_penugasan_lama = $id_penugasan_lama";
		$query = $this->db->query($q);
		return $query->row();
	}
	function data_pengajar_sesuai_pesanan($id_penugasan_lama){
		$a = "SELECT pengajar.id_pengajar, pengajar.nama, keahlian2.materi,waktu_ngajar2.hari,waktu_ngajar2.waktu FROM minta_ganti_jadwal_les ,pengajar ,keahlian2 ,waktu_ngajar2 WHERE minta_ganti_jadwal_les.materi = keahlian2.materi AND minta_ganti_jadwal_les.hari = waktu_ngajar2.hari AND minta_ganti_jadwal_les.jam = waktu_ngajar2.waktu AND minta_ganti_jadwal_les.id_penugasan_lama = $id_penugasan_lama AND pengajar.id_pengajar = keahlian2.id_pengajar GROUP BY id_pengajar";
		$query = $this->db->query($a);
		return $query->result();
	}
	function data_ganti_jadwal_ngajar($id_penugasan){
		$q="SELECT penugasan.id_pengajar,penugasan.id_kons,penugasan.id_penugasan, penugasan.nama_kons, pesan2.materi, pesan2.hari, pesan2.jam, pesan2.tempat_pertemuan, penugasan.tgl_mulai, penugasan.tgl_selesai FROM penugasan , pesan2 , pengajar WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_pengajar = pengajar.id_pengajar  AND penugasan.id_pengajar = pengajar.id_pengajar AND penugasan.`status` LIKE '%Aktif%' AND penugasan.id_penugasan = $id_penugasan GROUP BY penugasan.id_penugasan";
		$query = $this->db->query($q);
		return $query->row();
	}
	function daftar_permintaan_ganti_ngajar(){
		$q="SELECT minta_ganti_jadwal_ngajar.id_ganti_pgjr,minta_ganti_jadwal_ngajar.id_penugasan_lama,minta_ganti_jadwal_ngajar.id_kons,minta_ganti_jadwal_ngajar.id_pgjr,minta_ganti_jadwal_ngajar.materi_penugasan, minta_ganti_jadwal_ngajar.hari_penugasan, minta_ganti_jadwal_ngajar.jam_penugasan, minta_ganti_jadwal_ngajar.tgl_minta, minta_ganti_jadwal_ngajar.alasan, minta_ganti_jadwal_ngajar.`status`, konsumen.nama AS nama_siswa, pengajar.nama FROM minta_ganti_jadwal_ngajar , konsumen , pengajar WHERE minta_ganti_jadwal_ngajar.id_pgjr = pengajar.id_pengajar AND minta_ganti_jadwal_ngajar.id_kons = konsumen.id_konsumen AND minta_ganti_jadwal_ngajar.`status` = 'belum di verifikasi'";
		$query = $this->db->query($q);
		return $query->result();
	}
	function data_permintaan_ganti_ngajar($id_penugasan_lama){
		$q="SELECT minta_ganti_jadwal_ngajar.id_ganti_pgjr,minta_ganti_jadwal_ngajar.id_penugasan_lama,minta_ganti_jadwal_ngajar.id_kons,minta_ganti_jadwal_ngajar.id_pgjr,minta_ganti_jadwal_ngajar.materi_penugasan, minta_ganti_jadwal_ngajar.hari_penugasan, minta_ganti_jadwal_ngajar.jam_penugasan, minta_ganti_jadwal_ngajar.tgl_minta, minta_ganti_jadwal_ngajar.alasan, minta_ganti_jadwal_ngajar.`status`, konsumen.nama AS nama_siswa, pengajar.nama FROM minta_ganti_jadwal_ngajar , konsumen , pengajar WHERE minta_ganti_jadwal_ngajar.id_pgjr = pengajar.id_pengajar AND minta_ganti_jadwal_ngajar.id_kons = konsumen.id_konsumen AND minta_ganti_jadwal_ngajar.`status` = 'belum di verifikasi' AND id_penugasan_lama = $id_penugasan_lama";
		$query = $this->db->query($q);
		return $query->row();
	}
	function data_pengajar_pengganti($id_penugasan_lama){
		$a = "SELECT pengajar.id_pengajar, pengajar.nama, keahlian2.materi,waktu_ngajar2.hari,waktu_ngajar2.waktu FROM minta_ganti_jadwal_ngajar ,pengajar ,keahlian2 ,waktu_ngajar2 WHERE minta_ganti_jadwal_ngajar.materi_penugasan = keahlian2.materi AND minta_ganti_jadwal_ngajar.hari_penugasan = waktu_ngajar2.hari AND minta_ganti_jadwal_ngajar.jam_penugasan = waktu_ngajar2.waktu AND minta_ganti_jadwal_ngajar.id_penugasan_lama = $id_penugasan_lama AND pengajar.id_pengajar = keahlian2.id_pengajar GROUP BY id_pengajar";
		$query = $this->db->query($a);
		return $query->result();
	}


}
