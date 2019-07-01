<?php
class default_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_login()
	{
		$query = $this->db->get('admin');
		return $query->row_array();
	}
}