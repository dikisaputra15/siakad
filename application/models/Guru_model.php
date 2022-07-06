<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
	public function getallguru()
	{
		$query = " SELECT * from guru";
		return $this->db->query($query)->result_array();
	}

	public function getgurubyid($id)
	{
		$query = $this->db->get_where('guru', array('id_guru' => $id))->row_array();
		return $query;
	}

	public function getgrafikguru()
	{
		$this->db->group_by('jenis_kelamin');
        $this->db->select('jenis_kelamin');
        $this->db->select("count(*) as total");
        return $this->db->from('guru')
          ->get()
          ->result();
	}
}
