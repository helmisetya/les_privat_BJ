<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_jadwal extends CI_Model{
    function jadwal_les(){
    	$ngambil = $this->session->userdata("iduser");
		$q="SELECT penugasan.id_penugasan,penugasan.id_pesan, pengajar.nama AS nama_guru, pesan2.materi, pesan2.hari, pesan2.jam, pesan2.tempat_pertemuan,penugasan.tgl_mulai,penugasan.tgl_selesai,konsumen.nama FROM penugasan ,pesan2 ,konsumen ,pengajar WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_kons = pesan2.id_konsumen AND penugasan.id_kons = konsumen.id_konsumen AND penugasan.id_pengajar = pengajar.id_pengajar AND penugasan.`status` NOT LIKE 'Tidak Aktif' AND penugasan.`status` NOT LIKE 'terambil%' AND konsumen.id_akun =$ngambil";
		$query = $this->db->query($q);
		return $query->result();
	}
	function jadwal_ngajar(){
		$ngambil = $this->session->userdata("iduser");
		$q="SELECT penugasan.id_penugasan, penugasan.nama_kons, pesan2.materi, pesan2.hari, pesan2.jam, pesan2.tempat_pertemuan, penugasan.tgl_mulai, penugasan.tgl_selesai FROM penugasan, pesan2 , pengajar WHERE penugasan.id_pesan = pesan2.id_pesan AND penugasan.id_pengajar = pengajar.id_pengajar AND penugasan.id_pengajar=pengajar.id_pengajar  AND penugasan.`status` NOT LIKE 'Tidak Aktif%' AND penugasan.`status` NOT LIKE 'terambil%' AND pengajar.id_akun = $ngambil GROUP BY penugasan.id_penugasan";
		$query = $this->db->query($q);
		return $query->result();
	}
}
