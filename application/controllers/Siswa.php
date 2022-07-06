<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('Siswa_model');
	}

	public function index()
	{
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Data Siswa";
		$data['siswa'] = $this->Siswa_model->getallsiswa();
			$this->load->view('templates/sitemain/header', $data);
			$this->load->view('templates/sitemain/sidebar', $data);
			$this->load->view('templates/sitemain/topbar', $data);
			$this->load->view('siswa/index', $data);
			$this->load->view('templates/sitemain/footer');
	
	}

	public function tambah()
	{
		$nisn = $this->input->post('nisn'); 
		$nama_siswa = $this->input->post('nama_siswa'); 
		$jenis_kelamin = $this->input->post('jenis_kelamin'); 
		$ttl = $this->input->post('ttl'); 
		$alamat = $this->input->post('alamat'); 
		$kelas = $this->input->post('kelas'); 
		$keterangan = $this->input->post('keterangan'); 

		$siswa = $this->db->get_where('siswa', ['nisn' => $this->input->post('nisn')])->row_array();

		if (is_null($siswa)) {
				$data = [
						'nisn' => $nisn,
						'nama_siswa' => $nama_siswa,
						'jenis_kelamin' => $jenis_kelamin,
						'ttl' => $ttl,
						'alamat' => $alamat,
						'kelas' => $kelas,
						'keterangan' => $keterangan
					];
				$this->db->insert('siswa', $data);
				$this->Flasher_model->flashdata('New siswa added', 'Succes', 'success');
				redirect('Siswa');
			}else{
				$this->Flasher_model->flashdata('Siswa already exist', 'Failed', 'danger');
				redirect('Siswa');
			}
	}

	public function delete($id = -1)
	{
		// id diperiksa apakah data ada atau tidak
		if (is_null($this->db->get_where('siswa', ['id_siswa' => $id])->row_array())) {
			$this->Flasher_model->flashdata('Siswa not exist','Failed','danger');
			redirect('Siswa');
		}else{
			$this->db->where('id_siswa', $id);
			$this->db->delete('siswa');
			$this->Flasher_model->flashdata('Siswa deleted','Succes','warning');
			redirect('Siswa');
		}
	}

	public function edit_siswa($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Siswa_model->getsiswabyid($id);
		$data['title_page'] = "Edit Data Siswa";
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('siswa/edit_siswa', $data);
		$this->load->view('templates/sitemain/footer');
	}
	
	public function update_siswa()
	{
		$id_siswa = $this->input->post('id_siswa'); 
		$nisn = $this->input->post('nisn'); 
		$nama_siswa = $this->input->post('nama_siswa'); 
		$jenis_kelamin = $this->input->post('jenis_kelamin'); 
		$ttl = $this->input->post('ttl'); 
		$alamat = $this->input->post('alamat'); 
		$kelas = $this->input->post('kelas'); 
		$keterangan = $this->input->post('keterangan');

		$data = array(
	        'nisn' => $nisn,
	        'nama_siswa' => $nama_siswa,
	        'jenis_kelamin' => $jenis_kelamin,
	        'ttl' => $ttl,
	        'alamat' => $alamat,
	        'kelas' => $kelas,
	        'keterangan' => $keterangan
		);

		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('siswa', $data);

		$this->Flasher_model->flashdata('Siswa Updated', 'Succes', 'success');
		redirect('Siswa');
	}

	
}
