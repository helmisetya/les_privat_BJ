<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_jadwal extends CI_Controller {

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
        $this->load->model('m_ganti_jadwal');
        $this->load->library('session','form_validation');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }
	public function jadwal_les()
	{
		//$this->load->model('m_jadwal');
		$data['jadwal_les']=$this->m_ganti_jadwal->jadwal_les();
		$this->load->view('Konsumen/v_ganti_les', $data);
    }
    public function form_ganti_jadwal_les($id_penugasan){
		$data['ganti_jadwal_les']=$this->m_ganti_jadwal->data_ganti_jadwal_les($id_penugasan);
		$this->load->view('Konsumen/v_form_ganti', $data);
	}
	public function simpan_ganti_les(){
		$this->form_validation->set_rules('nama_siswa', 'NAMA','required');
		$this->form_validation->set_rules('tempat_pertemuan', 'TEMPAT_PERTEMUAN','required');
		 if($this->form_validation->run() == true){
			$id_penugasan = $this->input->post('id_penugasan');
			$id_konsumen = $this->input->post('id_konsumen');
      $id_pesan = $this->input->post('id_pesan');

			$materi = $this->input->post('materi');
			$hari = $this->input->post('hari');
			$waktu = $this->input->post('jam');

			$tempat = $this->input->post('tempat_pertemuan');
			$tgl_minta = $this->input->post('tgl_permintaan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$alasan = $this->input->post('alasan');

			foreach ($hari as $hr) {
				$harinya = $hr;
			}
			foreach ($waktu as $jam) {
						$jamnya = $jam;
				}
			$data = array(
					'id_penugasan_lama' => $id_penugasan,
          'id_pesan_lama' => $id_pesan,
					'id_konsumen' => $id_konsumen,
					'materi' => $materi,
					'hari' => $hr,
					'jam' => $jam,
					'tempat_pertemuan' => $tempat,
					'tgl_mulai_penugasan' => $tgl_mulai,
					'tgl_selesai_penugasan' => $tgl_selesai,
					'alasan' => $alasan,
					'tgl_minta' => $tgl_minta,
					'status' => "belum di verifikasi"
			);
			$this->m_ganti_jadwal->tambah_data('minta_ganti_jadwal_les',$data);
			$this->session->set_flashdata('pesan', 'data pergantian berhasil di simpan');
			redirect(site_url("beranda/kons"));
		}
		else{
			echo "<script>
					window.alert('Harap isi form dengan benar');
					window.location='jadwal_les';
				  </script>";
			// redirect(site_url("Konsumen/kons_biodata"));
		}
	}
	public function daftar_minta_ganti_les(){
		$data['ganti_les']=$this->m_ganti_jadwal->daftar_permintaan_ganti_les();
		$this->load->view('pengelola/v_daftar_ganti_les', $data);
	}
	public function form_acc_ganti_les($id_penugasan_lama){
		$this->load->model('m_ganti_jadwal');
		$data['dftr_pgjr']=$this->m_ganti_jadwal->data_pengajar_sesuai_pesanan($id_penugasan_lama);
		$data['acc_ganti_les']=$this->m_ganti_jadwal->data_permintaan_ganti_les($id_penugasan_lama);
    	$this->load->view('Pengelola/v_form_acc_ganti_les', $data);
	}
	public function simpan_acc_ganti_les(){
			$id_ganti_kons = $this->input->post('id_ganti_kons');
			$id_penugasan = $this->input->post('id_penugasan_lama');
			$id_pengajar = $this->input->post('id_pgjr');
			$nama_pengajar = $this->input->post('nama_pgjr');
			$id_konsumen = $this->input->post('id_konsumen');
      $id_pesan = $this->input->post('id_pesan_lama');
			$materi = $this->input->post('materi');
			$hari = $this->input->post('hari');
			$waktu = $this->input->post('jam');

			$tempat = $this->input->post('tempat_pertemuan');
			$tgl_minta = $this->input->post('tgl_permintaan');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$alasan = $this->input->post('alasan');


			$data = array(
					// 'id_ganti_les' => $id_ganti_kons,
					'id_pengajar' => $id_pengajar,
					// 'nama_pgjr' => $nama_pengajar,
					// 'hari' => $hari,
					// 'jam' => $waktu,
					// 'tempat_pertemuan' => $tempat,
					// 'tgl_mulai_penugasan' => $tgl_mulai,
					// 'tgl_selesai_penugasan' => $tgl_selesai,
					// 'alasan' => $alasan,
					// 'tgl_minta' => $tgl_minta,
					'status' => "Aktif, pernah ganti "
			);
			$where = array(
				'id_penugasan' => $id_penugasan
			);
			$this->m_ganti_jadwal->update_data($where,$data,'penugasan');

			$data1 = array(
				'status' => "sudah di verifikasi"
			);
			$where1 = array(
				'id_ganti_kons' => $id_ganti_kons
			);
			$this->m_ganti_jadwal->update_status_minta_ganti($where1,$data1,'minta_ganti_jadwal_les');

      $data2 = array(
				'hari' => $hari,
        'jam' => $waktu,
        'tempat_pertemuan' => $tempat
			);
			$where2 = array(
				'id_pesan' => $id_pesan
			);
      $this->m_ganti_jadwal->update_hari_jam_pesanan($where2,$data2,'pesan2');
			$this->session->set_flashdata('pesan', 'data pergantian berhasil di simpan');
			redirect(site_url("Ganti_jadwal/daftar_minta_ganti_les"));

	}
	public function jadwal_ngajar(){
		$this->load->model('m_jadwal');
		$data['jadwal_ngajar']=$this->m_jadwal->jadwal_ngajar();
		$this->load->view('Pengajar/v_ganti_ngajar', $data);
	}
	 public function form_ganti_jadwal_ngajar($id_penugasan){
		$data['ganti_jadwal_ngajar']=$this->m_ganti_jadwal->data_ganti_jadwal_ngajar($id_penugasan);
		$this->load->view('Pengajar/v_form_ganti', $data);
	}
	public function simpan_ganti_ngajar(){
		$this->form_validation->set_rules('alasan', 'ALASAN','required');
		if($this->form_validation->run() == true){
			$id_konsumen = $this->input->post('id_konsumen');
			$id_pengajar = $this->input->post('id_pengajar');
			$id_penugasan_lama = $this->input->post('id_penugasan');
			$id_konsumen = $this->input->post('id_konsumen');
			$materi = $this->input->post('materi');
			$hari = $this->input->post('hari');
			$jam = $this->input->post('jam');
			$alasan= $this->input->post('alasan');
			$tgl_permintaan = $this->input->post('tgl_permintaan');

			$data = array(
				'id_penugasan_lama' => $id_penugasan_lama,
				'id_pgjr' => $id_pengajar,
				'id_kons' => $id_konsumen,
				'materi_penugasan' => $materi,
				'hari_penugasan' => $hari,
				'jam_penugasan' => $jam,
				'tgl_minta' => $tgl_permintaan,
				'alasan' => $alasan,
				'status' => "belum di verifikasi"
			);

			$this->m_ganti_jadwal->tambah_data('minta_ganti_jadwal_ngajar',$data);
			$this->session->set_flashdata('pesan', 'data pergantian mengajar berhasil di simpan harap menunggu verifikasi dari pengelola');
			redirect(site_url("beranda/Pengajar"));
		}
		else{
			echo "<script>
					window.alert('Harap isi form dengan benar');
					window.location='jadwal_ngajar';
				  </script>";
		}
	}
	public function daftar_minta_ganti_ngajar(){
		$data['ganti_ngajar']=$this->m_ganti_jadwal->daftar_permintaan_ganti_ngajar();
		$this->load->view('pengelola/v_daftar_ganti_ngajar', $data);
	}
	public function form_acc_ganti_ngajar($id_penugasan_lama){
		$this->load->model('m_ganti_jadwal');
		$data['dftr_pgjr']=$this->m_ganti_jadwal->data_pengajar_pengganti($id_penugasan_lama);
		$data['acc_ganti_ngajar']=$this->m_ganti_jadwal->data_permintaan_ganti_ngajar($id_penugasan_lama);
    	$this->load->view('Pengelola/v_form_acc_ganti_ngajar', $data);
	}
	public function simpan_acc_ganti_ngajar(){
		$id_ganti_pgjr = $this->input->post('id_ganti_pgjr');
		$id_pengajar = $this->input->post('id_pgjr');
		$id_penugasan = $this->input->post('id_penugasan_lama');

		$data = array(
			'id_pengajar' => $id_pengajar
		);
		$where = array(
			'id_penugasan' =>$id_penugasan
		);
		$this->m_ganti_jadwal->update_data($where,$data,'penugasan');
		$data1 = array(
			'status' => "sudah di verifikasi"
		);
		$where1 = array(
			'id_ganti_pgjr' => $id_ganti_pgjr
		);
		$this->m_ganti_jadwal->update_status_minta_ganti($where1,$data1,'minta_ganti_jadwal_ngajar');
		$this->session->set_flashdata('pesan', 'data pergantian pengajar berhasil di simpan ');
			redirect(site_url("beranda/pengelola"));
	}

}
