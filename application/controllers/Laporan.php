<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('Absensi_model');
	}

	public function index()
	{
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Laporan Absensi Siswa";
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('laporan/index', $data);
			$this->load->view('templates/sitemain/footer');
	
	}

	public function pdf_absensi()
	{
		$tgl1 = $this->input->post('tgl1'); 
		$tgl2 = $this->input->post('tgl2'); 
		$data['pdfsiswa'] = $this->Absensi_model->getpdfabsensisiswa($tgl1, $tgl2);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-absensi-siswa.pdf";
		$this->pdf->load_view('laporan/pdf_absensi_siswa', $data);
	}

	public function lap_guru()
	{
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Laporan Absensi Guru";
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('laporan/lap_guru', $data);
			$this->load->view('templates/sitemain/footer');
	
	}

	public function pdf_absensi_guru()
	{
		$tgl1 = $this->input->post('tgl1'); 
		$tgl2 = $this->input->post('tgl2'); 
		$data['pdfguru'] = $this->Absensi_model->getpdfabsensiguru($tgl1, $tgl2);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-absensi-guru.pdf";
		$this->pdf->load_view('laporan/pdf_absensi_guru', $data);
	}

	public function lap_nilai_siswa()
	{
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Laporan Nilai Siswa";
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('laporan/lap_nilai_siswa', $data);
			$this->load->view('templates/sitemain/footer');
	
	}

	public function pdf_nilai_siswa()
	{
		$nisn = $this->input->post('nisn'); 
		$data['siswa'] = $this->Absensi_model->getnisnsiswa($nisn);
		$data['nilai'] = $this->Absensi_model->getnilaisiswa($nisn);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-nilai-siswa.pdf";
		$this->pdf->load_view('laporan/pdf_nilai_siswa', $data);
	}
	
}
