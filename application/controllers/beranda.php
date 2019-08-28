<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
        //$this->load->model('m_login');
        $this->load->library('session','form_validation');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }
	public function kons()
	{
    $this->load->model('m_beranda');
    $data['menunggu_les']=$this->m_beranda->menunggu_les();
		$this->load->view('konsumen/v_index',$data);
    }
    public function pengajar()
	{
    $this->load->model('m_beranda');
    $data['pesanan_sesuai']=$this->m_beranda->pesanan_les_sesuai();
		$this->load->view('pengajar/v_index',$data);
    }
    public function pengelola()
	{
    $this->load->model('m_beranda');
    $data['pesanan']=$this->m_beranda->permintaan_les();
    $data['pesanan_terambil']=$this->m_beranda->permintaan_les_terambil();
    $data['ganti_les']=$this->m_beranda->permintaan_ganti_les();
    $data['ganti_ngajar']=$this->m_beranda->permintaan_ganti_ngajar();
		$this->load->view('pengelola/v_index', $data);

    }

}
