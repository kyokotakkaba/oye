<?php
class default_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function get_data_admin(){
		$query = $this->db->get('admin');
		return $query->row_array();
	}

	public function get_data_member($id = NULL){
		if ($id == NULL){
			$query = $this->db->get('member');
			return $query->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('member');
			$this->db->where('username',$id);
			$query = $this->db->get();
			return $query->row_array();
		}
	}
}