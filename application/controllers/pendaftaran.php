<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

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
        $this->load->model('m_pendaftaran');
        $this->load->library('session','form_validation');
        if($this->session->userdata('status') != "login"){
		 	redirect(base_url("index.php/login"));
		 }

    }
	public function kons_form_bio()
	{
		$data['akun']=$this->m_pendaftaran->get_id_akun();
		$this->load->view('konsumen/v_form_bio', $data);
	}
	public function simpan_bio_kons(){
		 $this->form_validation->set_rules('nama', 'NAMA','required');
		 $this->form_validation->set_rules('alamat', 'ALAMAT','required');

		 $this->form_validation->set_rules('nama_siswa', 'NAMA_SISWA','required');
		 $this->form_validation->set_rules('sekolah', 'SEKOLAH','required');
		 if($this->form_validation->run() != false){
			$id_akun = $this->input->post('id_akun');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$nama_siswa = $this->input->post('nama_siswa');
			$kelas = $this->input->post('kelas');
			$sekolah = $this->input->post('sekolah');
			$tgl_dftr = $this->input->post('tgl_dftr');

			$data = array(
				'id_akun' => $id_akun,
				'nama' => $nama,
				'alamat' => $alamat,
				'nama_siswa' => $nama_siswa,
				'kelas' => $kelas,
				'sekolah' => $sekolah,
				'tgl_dftr' => $tgl_dftr,
        'status' => "Aktif"
				);

			$res = $this->m_pendaftaran->tambah_data('konsumen',$data);


			$this->session->set_flashdata('pesan', 'data diri berhasil di daftarkan, silahkan untuk melanjutkan pemesanan');
			redirect(site_url("Beranda/kons"));
		}else{
			echo "<script>
					window.alert('Harap isi form dengan benar');
					window.location='kons_form_bio';
				  </script>";

		}
	}
    public function pgjr_form_bio()
	{
		$data['akun']=$this->m_pendaftaran->get_id_akun();
		$this->load->view('pengajar/v_form_bio', $data);
	}
	public function simpan_bio_pgjr()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    	$this->form_validation->set_rules('alamat_asal', 'Alamat_asal', 'required');
    	$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

    	if($this->form_validation->run()==TRUE){
    		$id_akun = $this->input->post('id_akun');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$alamat_asal = $this->input->post('alamat_asal');
			$kampus = $this->input->post('kampus');
			$semester = $this->input->post('semester');
			$jurusan = $this->input->post('jurusan');
			$tgl_dftr = $this->input->post('tgl_dftr');


			$data = array(
				'id_akun' => $id_akun,
				'nama' => $nama,
				'alamat' => $alamat,
				'alamat_asal' => $alamat_asal,
				'kampus' => $kampus,
				'semester' => $semester,
				'jurusan' => $jurusan,
				'tgl_dftr' => $tgl_dftr,
        'status' => "Aktif"
				);

			$res = $this->m_pendaftaran->tambah_data('pengajar',$data);

			$this->session->set_flashdata('pesan', 'data diri berhasil di daftarkan');
			redirect(site_url("pendaftaran/pgjr_form_keahlian"));
    	}
    	else{
    		echo "<script>
					window.alert('Harap isi form dengan benar');
					window.location='pgjr_form_bio';
				  </script>";
    	}
	}
	public function pgjr_form_keahlian()
	{
		$data['pgjr']=$this->m_pendaftaran->get_data_pgjr();
		$this->load->view('pengajar/v_form_keahlian', $data);
	}
	public function simpan_keahlian()
	{
		$id_pgjr = $this->input->post('id_pgjr');
		$materi = $this->input->post('materi');

			foreach ($materi as $b) {
				$this->m_pendaftaran->tambah_keahlian(array(
					'id_pengajar' => $id_pgjr,
					'materi' => $b
				));
			}
			$this->session->set_flashdata('pesan', 'data keahlian berhasil di tambahkan');

			redirect(site_url("pendaftaran/pgjr_form_waktu"));
	}
	public function pgjr_form_waktu()
	{
		$data['pgjr']=$this->m_pendaftaran->get_data_pgjr();
		$this->load->view('pengajar/v_form_waktu', $data);
	}
	public function simpan_waktu()
	{
		$id_pgjr = $this->input->post('id_pgjr');
		$waktu = $this->input->post('jadwal');
		foreach ($waktu as $row=>$hari) {
			foreach ($hari as $coll=>$jam){
				$a = explode(" " , $jam);
				//print_r($jam);
				$this->m_pendaftaran->tambah_waktu_ngajar(array(
					'id_pengajar' => $id_pgjr,
					'hari' => $a[0],
					'waktu' => $a[1]
				));

			}
		}
		$this->session->set_flashdata('pesan', 'data waktu mengajar berhasil di tambahkan');
		redirect(site_url("beranda/pengajar"));
	}
    public function pengelola()
	{
		$this->load->view('konsumen/v_index');

    }

}
