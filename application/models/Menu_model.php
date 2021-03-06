<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getSubMenu()
	{
		$query = " SELECT `user_sub_menu` . *, `user_menu` . `menu`
					 FROM `user_sub_menu` JOIN `user_menu`
					   ON `user_sub_menu` . `menu_id` = `user_menu` . `id`
						 ORDER BY `user_menu` . `menu` ASC
				";
		return $this->db->query($query)->result_array();
	}

	public function getrole()
	{
		$query = " SELECT * from user_role where id!=1";
		return $this->db->query($query)->result_array();
	}
}
