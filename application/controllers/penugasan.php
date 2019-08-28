<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penugasan extends CI_Controller {

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
        $this->load->model('m_penugasan');
        $this->load->library('session','form_validation');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/login"));
         }

    }
	public function pesanan_terambil()
	{
		$data['pesanan']=$this->m_penugasan->pesanan_sudah_terambil();

    	$this->load->view('pengelola/v_pesanan_terambil', $data);
    }
    public function pesanan_belum_terambil()
	{
        $data['pesanan_belum']=$this->m_penugasan->pesanan_belum_terambil();
    	$this->load->view('pengelola/v_pesanan_belum_terambil', $data);
    }
    public function acc_pengambilan($id_pesan){

        $data['acc']=$this->m_penugasan->data_acc_penugasan($id_pesan);
        $this->load->view('pengelola/v_acc_pengambilan',$data);
    }
    public function simpan_acc(){
        $this->form_validation->set_rules('tgl_mulai','Tanggal Mulai','required');
        $this->form_validation->set_rules('tgl_selesai','Tanggal selesai','required');
        $id_pesan= $this->input->post('id_pesanan');
        $id_penugasan = $this->input->post('id_penugasan');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $status = $this->input->post('status');

        if($this->form_validation->run()==FALSE){
            echo "<script>
					window.alert('Harap isi form dengan benar');
					window.location='pesanan_terambil';
				  </script>";
        }
        else{
            $data = array(
                'tgl_mulai' => $tgl_mulai,
                'tgl_selesai' => $tgl_selesai,
                'status' => $status
            );
            $where = array(
                'id_penugasan' => $id_penugasan
            );
            $data1=array(
                'status' => "sudah mendapat pengajar"
            );
            $where1=array(
                'id_pesan' =>$id_pesan
            );

            $this->m_penugasan->update_data($where,$data,'penugasan');
            $this->m_penugasan->update_status_pesan($where1,$data1,'pesan2');
            $this->session->set_flashdata('pesan', 'data acc penugasan berhasil di update');
            redirect(site_url("beranda/pengelola"));
        }

    }
     public function entri_penugasan($id_pesan){
    	//$this->load->model('model_login');
    	$data['pesannya']=$this->m_penugasan->data_entri_penugasan($id_pesan);
    	$data['dftr_pgjr']=$this->m_penugasan->data_pengajar_sesuai_pesanan($id_pesan);
    	$this->load->view('pengelola/v_entri_penugasan', $data);
    }
    public function simpan_penugasan(){
    	 $this->form_validation->set_rules('tgl_mulai','Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl_selesai','Tanggal Selesai', 'required');
         if($this->form_validation->run()==FALSE){
               echo "<script>window.alert('harap isi semua form nya');
                window.location = 'pesanan_belum_terambil';
                </script>";
                //redirect(site_url('pengelola/pesanan'));
            }
        else{
            $id_pesan = $this->input->post('id_pesanan');
            $id_pgjr = $this->input->post('id_pgjr');
            $id_kons = $this->input->post('id_kons');
            // $nama_pgjr = $this->input->post('nama_pgjr');
            $nama_kons = $this->input->post('nama_konsumen');
            $tgl_mulai = $this->input->post('tgl_mulai');
            $tgl_selesai = $this->input->post('tgl_selesai');
            $status = $this->input->post('status');

            $data = array(
                'id_pesan' => $id_pesan,
                'id_pengajar' => $id_pgjr,
                'id_kons' => $id_kons,
                // 'nama_pgjr' => $nama_pgjr,
                'nama_kons' => $nama_kons,
                'tgl_mulai' => $tgl_mulai,
                'tgl_selesai' => $tgl_selesai,
                'status' => $status
            );
            $this->m_penugasan->tambah_data('penugasan', $data);
            $data1 = array(
                'status' => "sudah mendapat pengajar"
            );
            $where1 = array(
                'id_pesan' => $id_pesan
            );
             $this->m_penugasan->update_status_pesan($where1, $data1,'pesan2');

            $this->session->set_flashdata('pesan', 'data penugasan berhasil di tambahkan');

            redirect(site_url("Penugasan/pesanan_belum_terambil"));
        }
    }

}
