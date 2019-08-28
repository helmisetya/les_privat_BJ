<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertemuan extends CI_Controller {

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
        $this->load->model('m_pertemuan');
        $this->load->library('session','form_valiadtion');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }
	public function daftar_pertemuan()
	{
		$this->load->model('m_jadwal');
		$data['daftar_pertemuan']=$this->m_jadwal->jadwal_ngajar();
		$this->load->view('pengajar/v_daftar_pertemuan', $data);
    }
  public function form_isi_pertemuan($id_penugasan){
		$data['jam']=$this->m_pertemuan->tampil_jam($id_penugasan);
		$data['pertemuan_ke']=$this->m_pertemuan->tampil_pertemuan_ke($id_penugasan);
		$data['data_pertemuan']=$this->m_pertemuan->data_pertemuan($id_penugasan);
		$this->load->view('pengajar/v_form_pertemuan', $data);
	}
	public function simpan_pertemuan(){
		$id_penugasan = $this->input->post('id_penugasan');
		$id_pengajar = $this->input->post('id_pengajar');
		$id_konsumen = $this->input->post('id_konsumen');
		$materi = $this->input->post('materi');
		$waktu = $this->input->post('waktu_pertemuan');
		$tgl_pertemuan = $this->input->post('tgl_pertemuan');
		$pertemuan_ke = $this->input->post('pertemuan_ke');
		$isi_pertemuan = $this->input->post('isi_pertemuan');

		$data=array(
			'id_penugasan'=>$id_penugasan,
			'id_pengajar'=>$id_pengajar,
			'id_konsumen'=>$id_konsumen,
			'materi'=>$materi,
			'waktu_les'=>$waktu,
			'tgl_pertemuan'=>$tgl_pertemuan,
			'pertemuan_ke'=>$pertemuan_ke,
			'isi_pertemuan'=>$isi_pertemuan
		);

		$this->m_pertemuan->tambah_data('pertemuan', $data);
    	$this->session->set_flashdata('pesan', 'data pertemuan berhasil di simpan');
    	redirect(site_url("pertemuan/daftar_pertemuan"));
	}
	public function laporan_pertemuan_kons(){
		$data['laporan_pertemuan']=$this->m_pertemuan->laporan_pertemuan_kons();
		$this->load->view('Konsumen/v_laporan_pertemuan', $data);
	}
  public function laporan_pertemuan_pgjr(){
		$data['laporan_pertemuan']=$this->m_pertemuan->laporan_pertemuan_pengajar();
		$this->load->view('pengajar/v_laporan_pertemuan', $data);
	}

}
