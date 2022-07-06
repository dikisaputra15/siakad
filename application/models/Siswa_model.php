<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
	public function getallsiswa()
	{
		$query = " SELECT * from siswa";
		return $this->db->query($query)->result_array();
	}

	public function getsiswabyid($id)
	{
		$query = $this->db->get_where('siswa', array('id_siswa' => $id))->row_array();
		return $query;
	}

	public function getnilaisiswa($id)
	{
		$query = "SELECT nilai_siswa.*, siswa.*, mapel.*, guru.* from nilai_siswa join siswa on nilai_siswa.id_siswa=siswa.id_siswa join mapel on nilai_siswa.id_mapel=mapel.id_mapel join guru on nilai_siswa.id_guru=guru.id_guru where nilai_siswa.id_siswa='$id'";
		return $this->db->query($query)->result_array();
	}

	public function getgrafiksiswa()
	{
		$this->db->group_by('jenis_kelamin');
        $this->db->select('jenis_kelamin');
        $this->db->select("count(*) as total");
        return $this->db->from('siswa')
          ->get()
          ->result();
	}
}
