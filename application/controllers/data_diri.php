<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_diri extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->helper('url','date');
        $this->load->model('m_data_diri');
        $this->load->library('session','form_valiadtion');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }
    public function profil_kons()
    {
      $data['bio']=$this->m_data_diri->data_diri_kons();
      $data['les_aktif']=$this->m_data_diri->jmlh_penugasan_aktif_kons();
      $data['les_tidak_aktif']=$this->m_data_diri->jmlh_penugasan_tdk_aktif_kons();

      $this->load->view('konsumen/v_profil', $data);
    }
    public function profil_pgjr()
    {
      $data['bio']=$this->m_data_diri->data_diri_pgjr();
      $data['les_aktif']=$this->m_data_diri->jmlh_penugasan_aktif_pgjr();
      $data['les_tidak_aktif']=$this->m_data_diri->jmlh_penugasan_tidak_aktif_pgjr();
      $data['ahli']=$this->m_data_diri->data_keahlian();
      $data['waktu']=$this->m_data_diri->data_waktu();
      $this->load->view('pengajar/v_profil', $data);
    }
    public function update_bio_kons()
    {
      $this->form_validation->set_rules('nama', 'NAMA','required');
       $this->form_validation->set_rules('alamat','alamat','required');
       $this->form_validation->set_rules('nama_siswa','nama_siswa','required');
       $this->form_validation->set_rules('sekolah','sekolah','required');
       $this->form_validation->set_rules('kelas','kelas','required');

      $id_konsumen = $this->input->post('id_kons');
      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $nama_siswa = $this->input->post('nama_siswa');
      $sekolah = $this->input->post('sekolah');
      $kelas = $this->input->post('kelas');

      if($this->form_validation->run()==FALSE){
        echo "<script>
            window.alert('Harap isi form dengan benar');
            window.location='profil_kons';
            </script>";
      }
      else{
        $data =array(
          'nama' => $nama,
          'alamat' => $alamat,
          'nama_siswa' => $nama_siswa,
          'sekolah' => $sekolah,
          'kelas' => $kelas
        );
        $where = array('id_konsumen' => $id_konsumen);
        $this->m_data_diri->update_data($where,$data,'konsumen');
        $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
        redirect(site_url("data_diri/profil_kons"));
      }
    }
    public function update_bio_pgjr()
    {
      $this->form_validation->set_rules('nama', 'NAMA','required');
       $this->form_validation->set_rules('alamat','alamat','required');
       $this->form_validation->set_rules('alamat_asal','alamat_asal','required');
       $this->form_validation->set_rules('kampus','kampus','required');
       $this->form_validation->set_rules('semester','semester','required');
       $this->form_validation->set_rules('jurusan','jurusan','required');

      $id_pengajar = $this->input->post('id_pengajar');
      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $alamat_asal = $this->input->post('alamat_asal');
      $kampus = $this->input->post('kampus');
      $semester = $this->input->post('semester');
      $jurusan = $this->input->post('jurusan');

      if($this->form_validation->run()==FALSE){
        echo "<script>
            window.alert('Harap isi form dengan benar');
            window.location='profil_pgjr';
            </script>";
      }
      else{
        $data =array(
          'nama' => $nama,
          'alamat' => $alamat,
          'alamat_asal' => $alamat_asal,
          'kampus' => $kampus,
          'semester' => $semester,
          'jurusan' => $jurusan
        );
        $where = array('id_pengajar' => $id_pengajar);
        $this->m_data_diri->update_data($where,$data,'pengajar');
        $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
        redirect(site_url("data_diri/profil_pgjr"));
      }
    }
    public function update_keahlian()
    {
      $data['bio']=$this->m_data_diri->data_diri_pgjr();
      $data['les_aktif']=$this->m_data_diri->jmlh_penugasan_aktif_pgjr();
      $data['les_tidak_aktif']=$this->m_data_diri->jmlh_penugasan_tidak_aktif_pgjr();
      $data['ahli']=$this->m_data_diri->data_keahlian();
      $this->load->view('pengajar/v_ganti_keahlian', $data);
    }
    public function hapus_keahlian($id_keahlian)
    {
       $where = array('id_keahlian' => $id_keahlian);
       $this->m_data_diri->hapus_data($where, 'keahlian2');
       $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
       redirect(site_url("data_diri/update_keahlian"));
    }
    public function form_ganti_keahlian($id_keahlian)
    {
      $data['keahliannya']=$this->m_data_diri->detail_keahlian($id_keahlian);
      $this->load->view('pengajar/v_form_ganti_keahlian', $data);
    }
    public function simpan_ganti_keahlian($id_keahlian)
    {
      $id_keahlian = $this->input->post('id_keahlian');
      $materi = $this->input->post('materi');
      $id_pgjr = $this->input->post('id_pengajar');

      $data = array('materi' => $materi);
      $where = array('id_keahlian' => $id_keahlian);

      $cek = $this->m_data_diri->update_keahlian($where,$data,'keahlian2',$id_pgjr,$materi );
      if($cek == false){
        $this->session->set_flashdata('gagal', 'Data gagal di simpan karena telah ada');
        redirect(site_url("data_diri/update_keahlian"));
      }
      else{
        $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
        redirect(site_url("data_diri/update_keahlian"));
      }

    }
    public function form_tambah_keahlian()
    {
      $this->load->model('m_pendaftaran');
      $data['pgjr']=$this->m_pendaftaran->get_data_pgjr();
  		$this->load->view('pengajar/v_form_tambah_keahlian', $data);
    }
    public function simpan_keahlian()
  	{
  		$id_pgjr = $this->input->post('id_pgjr');
  		$materi = $this->input->post('materi');
      // $this->load->model('m_pendaftaran');
  			foreach ($materi as $b) {
  				$cek = $this->m_data_diri->tambah_keahlian($id_pgjr,$b,array(
  					'id_pengajar' => $id_pgjr,
  					'materi' => $b
  				));
          if($cek==false){
            $this->session->set_flashdata('gagal', 'Data gagal di simpan karena telah ada');
            redirect(site_url("data_diri/update_keahlian"));
          }else{
            $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
            redirect(site_url("data_diri/update_keahlian"));
          }
  			}

  	}
    public function update_waktu()
    {
      $data['bio']=$this->m_data_diri->data_diri_pgjr();
      $data['les_aktif']=$this->m_data_diri->jmlh_penugasan_aktif_pgjr();
      $data['les_tidak_aktif']=$this->m_data_diri->jmlh_penugasan_tidak_aktif_pgjr();
      $data['waktu']=$this->m_data_diri->data_waktu();
      $this->load->view('pengajar/v_ganti_waktu', $data);
    }
    public function hapus_waktu($id_waktu_ngajar)
    {
       $where = array('id_waktu_ngajar' => $id_waktu_ngajar);
       $this->m_data_diri->hapus_data($where, 'waktu_ngajar2');
       $this->session->set_flashdata('pesan', 'Data berhasil di hapus');
       redirect(site_url("data_diri/update_waktu"));
    }
    public function form_ganti_waktu($id_waktu_ngajar)
    {
      $data['waktunya']=$this->m_data_diri->detail_waktu($id_waktu_ngajar);
      $this->load->view('pengajar/v_form_ganti_waktu', $data);
    }
    public function simpan_ganti_waktu()
    {
      $id_waktu_ngajar = $this->input->post('id_waktu_ngajar');
      $hari = $this->input->post('hari');
      $waktu = $this->input->post('waktu');
      $id_pgjr = $this->input->post('id_pengajar');

      $data = array('hari' => $hari, 'waktu' => $waktu);
      $where = array('id_waktu_ngajar' => $id_waktu_ngajar);

      $cek=$this->m_data_diri->update_waktu($where,$data,'waktu_ngajar2', $id_pgjr, $hari, $waktu);
      if($cek==false){
        $this->session->set_flashdata('gagal', 'Data gagal di simpan karena telah ada');
        redirect(site_url("data_diri/update_waktu"));
      }
      else{
        $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
        redirect(site_url("data_diri/update_waktu"));
      }
    }
    public function form_tambah_waktu()
    {
      $this->load->model('m_pendaftaran');
      $data['pgjr']=$this->m_pendaftaran->get_data_pgjr();
      $this->load->view('pengajar/v_form_tambah_waktu', $data);
    }
    public function simpan_waktu()
  	{
  		$id_pgjr = $this->input->post('id_pgjr');
  		$waktu = $this->input->post('jadwal');
      // $this->load->model('m_pendaftaran');
  		foreach ($waktu as $row=>$hari) {
  			foreach ($hari as $coll=>$jam){
  				$a = explode(" " , $jam);
  				//print_r($jam);
  				$cek=$this->m_data_diri->tambah_waktu($id_pgjr,$a,array(
  					'id_pengajar' => $id_pgjr,
  					'hari' => $a[0],
  					'waktu' => $a[1]
  				));
          if($cek==false){
            $this->session->set_flashdata('gagal', 'Data gagal di simpan karena telah ada');
            redirect(site_url("data_diri/update_waktu"));
          }
          else{
            $this->session->set_flashdata('pesan', 'data waktu mengajar berhasil di tambahkan');
            redirect(site_url("data_diri/update_waktu"));
          }
  			}
  		}

  	}

}
