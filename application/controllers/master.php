<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
        $this->load->model('m_master');
        $this->load->library('session','form_valiadtion');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }
    public function daftar_pgjr()
    {
      $data['pgjr']=$this->m_master->daftar_pgjr();
      $this->load->view('pengelola/v_dftr_pgjr', $data);
    }
    public function detail_pengajar($id_pengajar)
    {
      $data['bio']=$this->m_master->detail_bio_pgjr($id_pengajar);
      $data['ahli']=$this->m_master->detail_keahlian($id_pengajar);
      $data['waktu_ajar']=$this->m_master->detail_waktu($id_pengajar);
      $data['les_aktif']=$this->m_master->jmlh_penugasan_aktif_pgjr($id_pengajar);
      $data['les_non_aktif']=$this->m_master->jmlh_penugasan_tidak_aktif_pgjr($id_pengajar);
      $this->load->view('pengelola/v_detail_pgjr', $data);

    }
    public function daftar_kons()
    {
      $data['kons']=$this->m_master->daftar_kons();
      $this->load->view('pengelola/v_dftr_kons', $data);
    }
    public function detail_kons($id_pengajar)
    {
      $data['bio']=$this->m_master->detail_bio_kons($id_pengajar);
      $data['les_aktif']=$this->m_master->jmlh_penugasan_aktif_kons($id_pengajar);
      $data['les_non_aktif']=$this->m_master->jmlh_penugasan_tidak_aktif_kons($id_pengajar);
      $this->load->view('pengelola/v_detail_kons', $data);

    }
    public function daftar_penugasan()
    {
      $data['penugasan']=$this->m_master->daftar_penugasan();
      $this->load->view('pengelola/v_dftr_penugasan', $data);
    }
    public function detail_penugasan($id_penugasan)
    {
      $data['penugasan']=$this->m_master->detailnya_penugasan($id_penugasan);
      $this->load->view('pengelola/v_detail_penugasan', $data);
    }
    public function update_status_pgjr()
    {
      $status = $this->input->post('status');
      $id_pengajar = $this->input->post('id_pengajar');

      $data = array('status' => $status);
      $where = array('id_pengajar' => $id_pengajar);
      $this->m_master->update_data($where,$data,'pengajar');
      $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
      redirect(site_url("master/daftar_pgjr"));
    }
    public function update_status_kons()
    {
      $status = $this->input->post('status');
      $id_konsumen = $this->input->post('id_konsumen');

      $data = array('status' => $status);
      $where = array('id_konsumen' => $id_konsumen);
      $this->m_master->update_data($where,$data,'konsumen');
      $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
      redirect(site_url("master/daftar_kons"));
    }
    public function update_status_penugasan()
    {
      $status = $this->input->post('status');
      $id_penugasan = $this->input->post('id_penugasan');
      $id_pesan = $this->input->post('id_pesan');

      $data = array('status' => $status);
      $where = array('id_penugasan' => $id_penugasan);
      $this->m_master->update_data($where,$data,'penugasan');

      $data1 = array('status' => "tidak aktif");
      $where1 = array('id_pesan' => $id_pesan);
      $this->m_master->update_data($where1,$data1,'pesan2');

      $this->session->set_flashdata('pesan', 'Data berhasil di perbarui');
      redirect(site_url("master/daftar_penugasan"));


    }


}
