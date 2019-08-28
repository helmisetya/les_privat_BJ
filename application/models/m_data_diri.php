<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class m_data_diri extends CI_Model{
    function data_diri_kons()
   {
     $ngambil =$this->session->userdata("iduser");
     $q="SELECT konsumen.id_konsumen, konsumen.id_akun,konsumen.nama,konsumen.alamat,konsumen.nama_siswa,konsumen.kelas,konsumen.sekolah,konsumen.tgl_dftr,user.username,user.password FROM user , konsumen WHERE user.id_user = konsumen.id_akun AND id_akun = $ngambil";
     $query = $this->db->query($q);
     return $query->result();
    }
    function jmlh_penugasan_aktif_kons()
    {
      $ngambil =$this->session->userdata("iduser");
      $q="SELECT COUNT(id_penugasan) AS jmlh FROM `penugasan`,konsumen where penugasan.`status` like 'Aktif%' AND konsumen.id_akun = $ngambil AND penugasan.id_kons = konsumen.id_konsumen";
      $query = $this->db->query($q);
      return $query->result();
    }
    function jmlh_penugasan_tdk_aktif_kons()
    {
      $ngambil =$this->session->userdata("iduser");
      $q="SELECT COUNT(id_penugasan) AS jmlh FROM `penugasan`,konsumen where penugasan.`status` like 'Tidak Aktif' AND konsumen.id_akun = $ngambil AND penugasan.id_kons = konsumen.id_konsumen";
      $query = $this->db->query($q);
      return $query->result();
    }
    function data_diri_pgjr()
    {
      $ngambil =$this->session->userdata("iduser");
      $q="SELECT * FROM pengajar, user WHERE pengajar.id_akun = user.id_user and id_akun = $ngambil";
      $query = $this->db->query($q);
      return $query->result();
    }
    function jmlh_penugasan_aktif_pgjr()
    {
      $ngambil =$this->session->userdata("iduser");
      $q="SELECT count(id_penugasan) AS jmlh FROM penugasan,pengajar where penugasan.`status` like 'Aktif%' AND penugasan.id_pengajar = pengajar.id_pengajar AND pengajar.id_akun= $ngambil";
      $query = $this->db->query($q);
      return $query->result();
    }
    function jmlh_penugasan_tidak_aktif_pgjr()
    {
      $ngambil =$this->session->userdata("iduser");
      $q="SELECT count(id_penugasan) AS jmlh FROM penugasan,pengajar where penugasan.`status` like 'Tidak Aktif' AND penugasan.id_pengajar = pengajar.id_pengajar AND pengajar.id_akun= $ngambil";
      $query = $this->db->query($q);
      return $query->result();
    }
    function data_keahlian()
    {
      $ngambil =$this->session->userdata("iduser");
      $q="SELECT * FROM keahlian2, pengajar WHERE keahlian2.id_pengajar = pengajar.id_pengajar AND pengajar.id_akun = $ngambil ORDER BY id_keahlian";
      $query = $this->db->query($q);
      return $query->result();
    }
    function detail_keahlian($id_keahlian)
    {
      $q="SELECT * FROM keahlian2, pengajar WHERE keahlian2.id_pengajar = pengajar.id_pengajar AND keahlian2.id_keahlian = $id_keahlian";
      $query = $this->db->query($q);
      return $query->result();
    }
    function data_waktu()
    {
      $ngambil =$this->session->userdata("iduser");
      $q="SELECT * FROM waktu_ngajar2, pengajar WHERE waktu_ngajar2.id_pengajar = pengajar.id_pengajar AND pengajar.id_akun = $ngambil ORDER BY id_waktu_ngajar";
      $query = $this->db->query($q);
      return $query->result();
    }
    function detail_waktu($id_waktu_ngajar)
    {
      $q="SELECT * FROM waktu_ngajar2, pengajar WHERE waktu_ngajar2.id_pengajar = pengajar.id_pengajar AND waktu_ngajar2.id_waktu_ngajar = $id_waktu_ngajar";
      $query = $this->db->query($q);
      return $query->result();
    }
    function update_data($where, $data, $table){
  		$this->db->where($where);
  		$this->db->update($table, $data);
  	}
    function hapus_data($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }
    function update_keahlian($where, $data, $table, $id_pengajar, $materi){
      $cek=array(
        'id_pengajar' => $id_pengajar,
        'materi' => $materi
      );
      $this->db->where($cek);
      $ceks=$this->db->get($table);
      if($ceks->num_rows() > 0 ){
        return false;
      }
      else{
        $this->db->where($where);
        $this->db->update($table, $data);
        return true;
      }

    }
    function tambah_keahlian($id_pengajar,$b,$data)
      {
        $cek=array(
          'id_pengajar' => $id_pengajar,
          'materi' => $materi
        );
        $this->db->where($cek);
        $ceks=$this->db->get('keahlian2');
        if($ceks->num_rows() > 0 ){
          return false;
        }
        else{
          $this->db->insert('keahlian2',$data);
          return true;
        }
      }
      function update_waktu($where, $data, $table, $id_pengajar, $hari, $waktu)
      {
        $cek=array(
          'id_pengajar' => $id_pengajar,
          'hari' => $hari,
          'waktu' => $waktu
        );
        $this->db->where($cek);
        $ceks=$this->db->get($table);
        if($ceks->num_rows() > 0 ){
          return false;
        }
        else{
          $this->db->where($where);
          $this->db->update($table, $data);
          return true;
        }
      }
      function tambah_waktu($id_pengajar,$a,$data)
        {
          $cek=array(
            'id_pengajar' => $id_pengajar,
            'hari' => $a[0],
            'waktu' => $a[1]
          );
          $this->db->where($cek);
          $ceks=$this->db->get('waktu_ngajar2');
          if($ceks->num_rows() > 0 ){
            return false;
          }
          else{
            $this->db->insert('waktu_ngajar2',$data);
            return true;
          }
        }
}
