<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

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
        $this->load->model('m_login');
        $this->load->library('session');

    }
	public function index()
	{
		//$this->load->helper('date');
		$this->load->view('v_daftar');

    }
    public function proses(){
        $this->form_validation->set_rules('username', 'USERNAME','required');

         $this->form_validation->set_rules('password','PASSWORD','required');
         $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		if($this->form_validation->run()==FALSE){
			$this->load->view('v_daftar');
		}
		else{
		$data_daftar = array(
			'username' => $username,
			'password' => $password,
			'level' => $level
			);
		$id = $this->m_login->input_akun($data_daftar,'user');

			$data_session = array(

			'iduser' => $id,
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'status' => "login"
			);
			//redirect('crud/index');
			$this->session->set_userdata($data_session);
			if($level=="1"){
				 $this->session->set_flashdata('pesan', 'Pendaftaran akun berhasil, silahkan mengisi form biodata di bawah ini.');
                 redirect(site_url("pendaftaran/kons_form_bio"));

			}else if($level=="2"){
				$this->session->set_flashdata('pesan', 'Pendaftaran akun berhasil, silahkan mengisi form biodata di bawah ini.');
        redirect(site_url("pendaftaran/pgjr_form_bio"));


			}
		}

		//redirect(site_url('Welcome\kons_biodata'));
	}


    function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
		}

}
