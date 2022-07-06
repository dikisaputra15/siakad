<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
		$this->load->model('Guru_model');
	}

	public function index()
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Siswa_model->getallsiswa();
		$data['title_page'] = "Nilai Siswa";
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('nilai/index', $data);
			$this->load->view('templates/sitemain/footer');
	
	}

	public function form_nilai()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Form Nilai";
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('nilai/form_nilai', $data);
			$this->load->view('templates/sitemain/footer');
	}

	public function input_nilai($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['mapel'] = $this->Mapel_model->getallmapel();
		$data['guru'] = $this->Guru_model->getallguru();
		$data['siswa'] = $this->Siswa_model->getsiswabyid($id);
		$data['nilai'] = $this->Siswa_model->getnilaisiswa($id);
		$data['title_page'] = "Input Nilai";
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('nilai/input_nilai', $data);
			$this->load->view('templates/sitemain/footer');
	}

	public function proses_input_nilai()
	{
		$id_siswa = $this->input->post('id_siswa');
		$id_mapel = $this->input->post('id_mapel');
		$id_guru = $this->input->post('id_guru');
		 $nilai_pts = $this->input->post('nilai_pts');
		 $nilai_pas = $this->input->post('nilai_pas');
		 date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d');
		   $jml_dipilih    =count($id_mapel);
		   for($x=0;$x<$jml_dipilih;$x++){
		   		$data = array(
			        'id_siswa' => $id_siswa,
			        'id_mapel' => $id_mapel[$x],
			        'id_guru' => $id_guru[$x],
			        'nilai_pts' => $nilai_pts[$x],
			        'nilai_pas' => $nilai_pas[$x],
			        'tanggal' => $tgl,
			        'status' => 1
				);
				$this->db->insert('nilai_siswa', $data);
		   }
		   $this->Flasher_model->flashdata('Nilai Berhasil diinput', 'Succes', 'success');
		redirect('Nilai/input_nilai/' . $id_siswa);
	}
	
}
