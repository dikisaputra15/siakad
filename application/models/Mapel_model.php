<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
	public function getallmapel()
	{
		$query = " SELECT * from mapel";
		return $this->db->query($query)->result_array();
	}

	public function getmapelbyid($id)
	{
		$query = $this->db->get_where('mapel', array('id_mapel' => $id))->row_array();
		return $query;
	}
}
