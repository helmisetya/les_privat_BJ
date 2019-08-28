<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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
        $this->load->model('m_jadwal');
        $this->load->library('session','form_validation');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }	
	public function jadwal_les()
	{
		$data['jadwal_les']=$this->m_jadwal->jadwal_les();
		$this->load->view('Konsumen/v_jadwal_les', $data);
    }
    public function jadwal_ngajar()
	{
		$data['jadwal_ngajar']=$this->m_jadwal->jadwal_ngajar();
		$this->load->view('pengajar/v_jadwal_ngajar', $data);
    }
    
}
