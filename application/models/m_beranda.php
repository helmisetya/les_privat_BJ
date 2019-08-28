<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_beranda extends CI_Model{
    function permintaan_les()
    {
      $q="SELECT COUNT(*) as jmlh FROM pesan2 where `status` = 'belum mendapat pengajar'";
      $query = $this->db->query($q);
      return $query->result();
    }
    function permintaan_les_terambil()
    {
      $q="SELECT COUNT(*) as jmlh FROM pesan2 where `status` = 'Sudah terambil'";
      $query = $this->db->query($q);
      return $query->result();
    }
    function permintaan_ganti_les()
    {
      $q="SELECT count(*) as jmlh FROM `minta_ganti_jadwal_les` WHERE `status` = 'belum di verifikasi'";
      $query = $this->db->query($q);
      return $query->result();
    }
    function permintaan_ganti_ngajar()
    {
      $q="SELECT count(*) as jmlh FROM `minta_ganti_jadwal_ngajar` WHERE `status` = 'belum di verifikasi'";
      $query = $this->db->query($q);
      return $query->result();
    }
    function pesanan_les_sesuai(){
		$ngambil =$this->session->userdata("iduser");
		$q = "SELECT count(*) AS jmlh FROM pesan2 WHERE concat(materi,hari,jam) in (SELECT concat (keahlian2.materi,waktu_ngajar2.hari,waktu_ngajar2.waktu) FROM `waktu_ngajar2` INNER join keahlian2 on waktu_ngajar2.id_pengajar = keahlian2.id_pengajar INNER JOIN pengajar on waktu_ngajar2.id_pengajar = pengajar.id_pengajar where keahlian2.id_pengajar = pengajar.id_pengajar and pengajar.id_akun=$ngambil and pesan2.`status` = 'belum mendapat pengajar' )";

		$query = $this->db->query($q);
		return $query->result();
	}
  function menunggu_les()
  {
    $ngambil =$this->session->userdata("iduser");
    $q="SELECT count(*) as jmlh FROM `pesan2`,konsumen WHERE pesan2.`status` = 'belum mendapat pengajar' AND konsumen.id_konsumen = pesan2.id_konsumen AND konsumen.id_akun = $ngambil ";
    $query = $this->db->query($q);
    return $query->result();
  }

}
