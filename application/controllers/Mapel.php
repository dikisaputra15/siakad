<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('Mapel_model');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title_page'] = "Mata Pelajaran";
		$data['mapel'] = $this->Mapel_model->getallmapel();
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('mapel/index', $data);
		$this->load->view('templates/sitemain/footer');
	}

	public function tambah()
	{ 
		$nama_mapel = $this->input->post('nama_mapel'); 

		$mapel = $this->db->get_where('mapel', ['nama_mapel' => $this->input->post('nama_mapel')])->row_array();

		if (is_null($mapel)) {
				$data = [ 'nama_mapel' => $nama_mapel ];
				$this->db->insert('mapel', $data);
				$this->Flasher_model->flashdata('New mapel added', 'Succes', 'success');
				redirect('Mapel');
			}else{
				$this->Flasher_model->flashdata('Mapel already exist', 'Failed', 'danger');
				redirect('Mapel');
			}
	}

	public function delete($id = -1)
	{
		// id diperiksa apakah data ada atau tidak
		if (is_null($this->db->get_where('mapel', ['id_mapel' => $id])->row_array())) {
			$this->Flasher_model->flashdata('Mapel not exist','Failed','danger');
			redirect('Mapel');
		}else{
			$this->db->where('id_mapel', $id);
			$this->db->delete('mapel');
			$this->Flasher_model->flashdata('Guru deleted','Succes','warning');
			redirect('Mapel');

		}
	}

	public function edit_mapel($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['mapel'] = $this->Mapel_model->getmapelbyid($id);
		$data['title_page'] = "Edit Data Siswa";
		$this->load->view('templates/sitemain/header', $data);
		$this->load->view('templates/sitemain/sidebar', $data);
		$this->load->view('templates/sitemain/topbar', $data);
		$this->load->view('mapel/edit_mapel', $data);
		$this->load->view('templates/sitemain/footer');
	}
	
	public function update_mapel()
	{
		$id_mapel = $this->input->post('id_mapel'); 
		$nama_mapel = $this->input->post('nama_mapel'); 

		$data = array(
	        'nama_mapel' => $nama_mapel
		);

		$this->db->where('id_mapel', $id_mapel);
		$this->db->update('mapel', $data);

		$this->Flasher_model->flashdata('Mata Pelajaran Updated', 'Succes', 'success');
		redirect('Mapel');
	}

	
}
