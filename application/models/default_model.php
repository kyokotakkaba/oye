<?php
class default_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	//GET DATABASE
	public function get_data_admin(){
		$query = $this->db->get('admin');
		return $query->row_array();
	}

	public function get_data_member($id = NULL){
		$this->db->select('*');
		$this->db->from('member');
		if ($id == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where('username',$id);
			$query = $this->db->get();
			return $query->row_array();
		}
	}

	public function get_data_withdraw($id = NULL){
		$this->db->select('withdraw.*, member.nama');
		$this->db->from('withdraw');
		$this->db->join('member', 'withdraw.username = member.username', 'left');
		if ($id == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where('withdraw.username',$id);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_data_bonussponsor($id = NULL){
		if ($id == NULL){
			$this->db->select('bonus_sponsor.*, sponsor.nama as nama_sponsor, sponsored.nama as nama_member, sponsored.replacement_user, replacement.nama as nama_replacement');
			$this->db->from('bonus_sponsor');
			$this->db->join('member sponsor', 'bonus_sponsor.sponsor = sponsor.username', 'left');
			$this->db->join('member sponsored', 'bonus_sponsor.username_member = sponsored.username', 'left');
			$this->db->join('member replacement', 'sponsored.replacement_user = replacement.username', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->select('bonus_sponsor.*, sponsored.nama as nama_member, sponsored.replacement_user, replacement.nama as nama_replacement');
			$this->db->from('bonus_sponsor');
			$this->db->join('member sponsored', 'bonus_sponsor.username_member = sponsored.username', 'left');
			$this->db->join('member replacement', 'sponsored.replacement_user = replacement.username', 'left');
			$this->db->where('bonus_sponsor.sponsor',$id);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_data_bonuspair($id = NULL){
		if ($id == NULL){
			$this->db->select('bonus_pair.*, member.nama');
			$this->db->from('bonus_pair');
			$this->db->join('member', 'bonus_pair.username = member.username', 'left');
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->select('*');
			$this->db->from('bonus_pair');
			$this->db->where('bonus_pair.username',$id);
			$query = $this->db->get();
			return $query->result_array();
		}
	}






	//UPDATE DATABASE
	public function update_password_admin($id, $data){
		$this->db->where('username', $id);
		$this->db->update('admin', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah password';
		}else{
			$return_message = 'gagal mengubah password';
		}
		return $return_message;
	}

	public function update_password_member($id, $data){
		$this->db->where('username', $id);
		$this->db->update('member', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah password';
		}else{
			$return_message = 'gagal mengubah password';
		}
		return $return_message;
	}
}