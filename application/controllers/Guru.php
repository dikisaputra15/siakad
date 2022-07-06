<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('Guru_model');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['guru'] = $this->Guru_model->getallguru();
		$data['title_page'] = "Data Guru";
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('guru/index', $data);
		$this->load->view('templates/sitemain/footer');
	}

	public function tambah()
	{
		$nama_guru = $this->input->post('nama_guru'); 
		$nip = $this->input->post('nip'); 
		$jenis_kelamin = $this->input->post('jenis_kelamin'); 
		$telepon = $this->input->post('telepon');  
		$keterangan = $this->input->post('keterangan'); 

		$guru = $this->db->get_where('guru', ['nip' => $this->input->post('nip')])->row_array();

		if (is_null($guru)) {
				$data = [
						'nama_guru' => $nama_guru,
						'nip' => $nip,
						'jenis_kelamin' => $jenis_kelamin,
						'keterangan' => $keterangan,
						'telepon' => $telepon
					];
				$this->db->insert('guru', $data);
				$this->Flasher_model->flashdata('New guru added', 'Succes', 'success');
				redirect('Guru');
			}else{
				$this->Flasher_model->flashdata('NIP Guru already exist', 'Failed', 'danger');
				redirect('Guru');
			}
	}

	public function delete($id = -1)
	{
		// id diperiksa apakah data ada atau tidak
		if (is_null($this->db->get_where('guru', ['id_guru' => $id])->row_array())) {
			$this->Flasher_model->flashdata('Siswa not exist','Failed','danger');
			redirect('Guru');
		}else{
			$this->db->where('id_guru', $id);
			$this->db->delete('guru');
			$this->Flasher_model->flashdata('Guru deleted','Succes','warning');
			redirect('Guru');
		}
	}

	public function edit_guru($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['guru'] = $this->Guru_model->getgurubyid($id);
		$data['title_page'] = "Edit Data Guru";
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('guru/edit_guru', $data);
		$this->load->view('templates/sitemain/footer');
	}

	public function update_guru()
	{
		$id_guru = $this->input->post('id_guru'); 
		$nip = $this->input->post('nip'); 
		$nama_guru = $this->input->post('nama_guru'); 
		$jenis_kelamin = $this->input->post('jenis_kelamin'); 
		$keterangan = $this->input->post('keterangan');
		$telepon = $this->input->post('telepon');  

		$data = array(
	        'nama_guru' => $nama_guru,
	        'nip' => $nip,
	        'jenis_kelamin' => $jenis_kelamin,
	        'keterangan' => $keterangan,
	        'telepon' => $telepon
		);

		$this->db->where('id_guru', $id_guru);
		$this->db->update('guru', $data);

		$this->Flasher_model->flashdata('Guru Updated', 'Succes', 'success');
		redirect('Guru');
	}

	
}
