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

	public function get_data_member_filter($filter){
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where($filter);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_withdraw($id = NULL, $tanggal = NULL){
		$this->db->select('withdraw.*, member.nama, member.nama_bank, member.no_rekening, member.atas_nama_bank');
		$this->db->from('withdraw');
		$this->db->join('member', 'withdraw.username = member.username', 'left');
		if ($id == NULL){
			$query = $this->db->get();
			return $query->result_array();
		}else if ($tanggal == NULL) {
			$this->db->where('withdraw.username',$id);
			$query = $this->db->get();
			return $query->result_array();
		}else{
			$this->db->where('withdraw.username',$id);
			$this->db->where('withdraw.tanggal',$tanggal);
			$query = $this->db->get();
			return $query->row_array();
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

	public function get_data_parameter(){
		$query = $this->db->get('parameter');
		return $query->row_array();
	}


	//INSERT DATABASE
	public function insert_member($data){
		$this->db->insert('member', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function insert_bonussponsor($data){
		$this->db->insert('bonus_sponsor', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function insert_bonuspair($data){
		$this->db->insert('bonus_pair', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function insert_withdraw($data){
		$this->db->insert('withdraw', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}





	//UPDATE DATABASE
	public function update_admin($id, $data){
		$this->db->where('username', $id);
		$this->db->update('admin', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_member($id, $data){
		$this->db->where('username', $id);
		$this->db->update('member', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_withdraw($id, $tanggal, $data){
		$this->db->where('username', $id);
		$this->db->where('tanggal', $tanggal);
		$this->db->update('withdraw', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_add_icash($id, $value){
		$this->db->where('username', $id);
		$this->db->set('icash', 'icash+'.$value,false);
		$this->db->update('member');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_subtract_icash($id, $value){
		$this->db->where('username', $id);
		$this->db->set('icash', 'icash-'.$value,false);
		$this->db->update('member');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_add_poin($id, $value){
		$this->db->where('username', $id);
		$this->db->set('poin', 'poin+'.$value,false);
		$this->db->update('member');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_subtract_poin($id, $value){
		$this->db->where('username', $id);
		$this->db->set('poin', 'poin-'.$value,false);
		$this->db->update('member');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_add_bvkiri($id, $value){
		$this->db->where('username', $id);
		$this->db->set('bv_kiri', 'bv_kiri+'.$value,false);
		$this->db->update('member');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_add_bvkanan($id, $value){
		$this->db->where('username', $id);
		$this->db->set('bv_kanan', 'bv_kanan+'.$value,false);
		$this->db->update('member');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}

	public function update_subtract_bv($id, $value){
		$this->db->where('username', $id);
		$this->db->set('bv_kanan', 'bv_kanan-'.$value,false);
		$this->db->set('bv_kiri', 'bv_kiri-'.$value,false);
		$this->db->update('member');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil mengubah data';
		}else{
			$return_message = 'gagal mengubah data';
		}
		return $return_message;
	}



	//DELETE DATABASE
	public function delete_member($id){
		$this->db->where('username', $id);
		$this->db->where('status', 'Pending');
		$this->db->delete('member'); 
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil menghapus data';
		}else{
			$return_message = 'gagal menghapus data';
		}
		return $return_message;
	}

	public function delete_withdraw($id,$tanggal){
		$this->db->where('username', $id);
		$this->db->where('tanggal', $tanggal);
		$this->db->delete('withdraw'); 
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'berhasil menghapus data';
		}else{
			$return_message = 'gagal menghapus data';
		}
		return $return_message;
	}
}