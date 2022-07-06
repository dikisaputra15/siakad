<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('Absensi_model');
		$this->load->model('Guru_model');
		$this->load->model('Siswa_model');
	}

	public function index()
	{

		date_default_timezone_set('Asia/Jakarta');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Absensi Guru pada Tanggal" . " " . date('Y-m-d');
		$data['cek'] = $this->Absensi_model->getcekabsensi();
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('absensi/index', $data);
			$this->load->view('templates/sitemain/footer');
	
	}

	public function checkin_guru($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Absensi Guru pada Tanggal" . " " . date('Y-m-d');
		$data['checkin'] = $this->Absensi_model->getcheckin($id);
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('absensi/checkin_guru', $data);
		$this->load->view('templates/sitemain/footer');
	}

	public function proses_absen()
	{		
		 $id_guru = $this->input->post('id_guru');
		 $keterangan = $this->input->post('keterangan');
		 date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d');
		   $jml_dipilih    =count($id_guru);
		   for($x=0;$x<$jml_dipilih;$x++){
		   		$data = array(
			        'id_guru' => $id_guru[$x],
			        'tanggal' => $tgl,
			        'keterangan' => $keterangan[$x],
			        'status' => 1
				);
				$this->db->insert('absensi_guru', $data);
		   }
		   $this->Flasher_model->flashdata('Absensi Berhasil', 'Succes', 'success');
		redirect('Absensi');
	}

	public function form_absen_guru()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['guru'] = $this->Guru_model->getallguru();
		$data['cek'] = $this->Absensi_model->getcekabsensitgl();
		$data['title_page'] = "Absensi Guru Tanggal" . " " . date('Y-m-d');
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('absensi/form_absen_guru', $data);
		$this->load->view('templates/sitemain/footer');
	}
	
	public function absensi_siswa()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Absensi Siswa pada Tanggal" . " " . date('Y-m-d');
		$data['cek'] = $this->Absensi_model->getcekabsensisiswa();
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('absensi/absensi_siswa', $data);
			$this->load->view('templates/sitemain/footer');
	}

	public function form_absen_siswa()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Siswa_model->getallsiswa();
		$data['title_page'] = "Absensi Siswa Tanggal" . " " . date('Y-m-d');
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('absensi/form_absen_siswa', $data);
		$this->load->view('templates/sitemain/footer');
	}

	public function proses_absen_siswa()
	{		
		 $id_siswa = $this->input->post('id_siswa');
		 $keterangan = $this->input->post('keterangan');
		 date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d');
		   $jml_dipilih    =count($id_siswa);
		   for($x=0;$x<$jml_dipilih;$x++){
		   		$data = array(
			        'id_siswa' => $id_siswa[$x],
			        'tanggal' => $tgl,
			        'keterangan' => $keterangan[$x],
			        'status' => 1
				);
				$this->db->insert('absensi_siswa', $data);
		   }
		   $this->Flasher_model->flashdata('Absensi Berhasil', 'Succes', 'success');
		redirect('Absensi/absensi_siswa');
	}
	
}
