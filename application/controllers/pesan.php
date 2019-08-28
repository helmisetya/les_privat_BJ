<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

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
        $this->load->model('m_pesan');
        $this->load->library('session','form_validation');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }
	public function form_pesan()
	{
		$this->load->helper('form_helper');
		$data['akun']=$this->m_pesan->get_id_kons();
    $data['data_kons']=$this->m_pesan->get_data_kons();
		$this->load->view('konsumen/v_form_pesan', $data);
    }
    public function simpan_pesan()
    {
        $this->form_validation->set_rules('nama','nama ', 'required');
		$this->form_validation->set_rules('alamat','alamat', 'required');

		if($this->form_validation->run()!=FALSE){
			$id_akun = $this->input->post('id_kons');
			$nama = $this->input->post('nama');
      $nama_siswa = $this->input->post('nama_siswa');
			$materi = $this->input->post('materi');
			$hari = $this->input->post('hari');
			$jam = $this->input->post('jam');
			$alamat = $this->input->post('alamat');
			$tgl_dftr = $this->input->post('tgl_dftr');


			foreach ($hari as $hr) {
				$this->m_pesan->simpan_les(array(
					'id_konsumen' => $id_akun,
					'materi' => $materi,
					'hari' => $hr,
					'jam' => $jam[$hr],
					'tempat_pertemuan' => $alamat,
					'tgl_pesan' => $tgl_dftr,
					'status' => "belum mendapat pengajar",
					'nama' => $nama,
          'nama_peserta' => $nama_siswa
				));
			}
            $this->session->set_flashdata('pesan', 'data pemesanan berhasil disimpan, harap menunggu konfirmasi dari pihak les privat.');

            redirect(site_url("beranda/kons"));
		}
		else{
					echo "<script>
					window.alert('Harap isi form dengan benar');
					window.location='form_pesan';
				  </script>";
			}
    }
    public function permintaan_les()
    {
        $data['pesanan']=$this->m_pesan->tampil_pesanan();
    	$this->load->view('pengajar/v_permintaan_les', $data);
    }
    public function ambil_pesanan($id_pesan){
    	$this->load->model('m_pendaftaran');
    	$data['data_pengajar']= $this->m_pendaftaran->get_data_pgjr();
    	$data['data_pemesan']=$this->m_pesan->data_ambil_pesan($id_pesan);
    	$this->load->view('pengajar/v_ambil_les', $data);
    }
    public function simpan_ambil_pesanan(){

    	$this->form_validation->set_rules('status', 'STATUS','required');

    	if($this->form_validation->run() == FALSE){
			echo "<script>
					window.alert('Harap beri tanda centang pad  form yang tersedia');
					window.location='permintaan_les';
				  </script>";


    	}else{

	    	$id_pesan = $this->input->post('id_pesan');
	    	$id_pengajar = $this->input->post('id_pengajar');
	    	$id_konsumen = $this->input->post('id_konsumen');
	    	//$nama_pgjr = $this->input->post('nama_pengajar');
	    	$nama_kons = $this->input->post('nama');
	    	$status = $this->input->post('status');
	    	$data = array(
	    		'id_pesan' =>$id_pesan,
	    		'id_kons' =>$id_konsumen,
	    		'id_pengajar' =>$id_pengajar,
	    		// 'nama_pgjr' =>$nama_pgjr,
	    		'nama_kons' =>$nama_kons,
	    		'status' => "terambil"
	    	);
	    	$this->m_pesan->tambah_data('penugasan', $data);

	    	$data1 = array(
	    		'status' => $status
	    	);
	    	$where = array(
	    		'id_pesan' => $id_pesan
	    	);
	    	$this->m_pesan->update_ambil_pesan($where,$data1,'pesan2');
	    	$this->session->set_flashdata('pesan', 'Permintaan les berhasil di ambil');
			redirect(site_url("beranda/pengajar"));
			// }
    	}

		}

}
