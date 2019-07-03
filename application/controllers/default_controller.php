<?php
class default_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('default_model');
		$this->load->helper('url_helper');
	}

	//LOAD VIEW

	//front
	public function index(){
		$this->load->view('frontpage');
	}

	//login
	public function login(){
		$this->load->view('login');
	}

	//Dashboard
	public function dashboardadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/dashboard');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	public function dashboardmember(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/dashboard');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//change password
	public function changepasswordadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/change_password');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	public function changepasswordmember(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/change_password');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//profile
	public function editprofile(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/edit_profile');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}





	//GET DATA

	//Data member
	public function get_currentuser(){
		$data = $this->default_model->get_data_member($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	unset($data['password']); //unset password to make it not visible in API output
		// }
		echo json_encode($data);
	}

	public function get_alluser(){
		$data = $this->default_model->get_data_member();
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	foreach ($data as &$row){ //& mean to call by reference
		// 		unset($row['password']);
		// 	}
		// }
		echo json_encode($data);
	}


	//Data Withdraw
	public function get_currentuser_withdraw(){
		$data = $this->default_model->get_data_withdraw($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	unset($data['password']); //unset password to make it not visible in API output
		// }
		echo json_encode($data);
	}

	public function get_alluser_withdraw(){
		$data = $this->default_model->get_data_withdraw();
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	foreach ($data as &$row){ //& mean to call by reference
		// 		unset($row['password']);
		// 	}
		// }
		echo json_encode($data);
	}

	//Data Sponsor
	public function get_currentuser_bonussponsor(){
		$data = $this->default_model->get_data_bonussponsor($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	unset($data['password']); //unset password to make it not visible in API output
		// }
		echo json_encode($data);
	}

	public function get_alluser_bonussponsor(){
		$data = $this->default_model->get_data_bonussponsor();
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	foreach ($data as &$row){ //& mean to call by reference
		// 		unset($row['password']);
		// 	}
		// }
		echo json_encode($data);
	}


	//Data Pairing
	public function get_currentuser_bonuspair(){
		$data = $this->default_model->get_data_bonuspair($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	unset($data['password']); //unset password to make it not visible in API output
		// }
		echo json_encode($data);
	}

	public function get_alluser_bonuspair(){
		$data = $this->default_model->get_data_bonuspair();
		if (empty($data)){
			$data = [];
		}
		// else{
		// 	foreach ($data as &$row){ //& mean to call by reference
		// 		unset($row['password']);
		// 	}
		// }
		echo json_encode($data);
	}




	//UPDATE

	//Ubah password
	public function update_passwordadmin(){
		$oldpassword = md5($this->input->post('oldpassword'));
		$data = $this->default_model->get_data_admin();
		if ($oldpassword == $data['password']){
			$data = array(
				'password' => md5($this->input->post('newpassword'))
			);
			$insertStatus = $this->default_model->update_password_admin($this->input->cookie('backendCookie',true),$data);
			echo $insertStatus;
		}else{
			echo "password lama salah";
		}
	}

	public function update_passwordmember(){
		$oldpassword = md5($this->input->post('oldpassword'));
		$data = $this->default_model->get_data_admin();
		if ($oldpassword == $data['password']){
			$data = array(
				'password' => md5($this->input->post('newpassword'))
			);
			$insertStatus = $this->default_model->update_password_member($this->input->cookie('memberCookie',true),$data);
			echo $insertStatus;
		}else{
			echo "password lama salah";
		}
	}





	//OTHER

	//Login
	public function ceklogin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = $this->default_model->get_data_admin();
		if ($username == $data['username'] && $password == $data['password']) {
			$this->load->helper('cookie');
			$cookie= array(
				'name'   => 'backendCookie',
				'value'  => $username,
				'expire' => '0',
			);
			$this->input->set_cookie($cookie);
			echo "berhasil login admin";
		}else{
			$data = $this->default_model->get_data_member(NULL);
			$is_login = false;
			foreach ($data as $row){
				if ($username == $row['username'] && $password == $row['password']) {
					$this->load->helper('cookie');
					$cookie= array(
						'name'   => 'memberCookie',
						'value'  => $username,
						'expire' => '0',
					);
					$this->input->set_cookie($cookie);
					$is_login = true;
					break;
				}
			}

			if ($is_login) {
				echo "berhasil login member";
			}else{
				echo "gagal login";
			}
		}

	}

	//Check cookie
	public function checkcookieadmin(){
		$this->load->helper('cookie');
		if ($this->input->cookie('backendCookie',true)!=NULL) {
			// echo $this->input->cookie('backendCookie'); //to output cookie
			return true;
		}else{
			return false;
		}
	}


	public function checkcookiemember(){
		$this->load->helper('cookie');
		if ($this->input->cookie('memberCookie',true)!=NULL) {
			// echo $this->input->cookie('memberCookie'); //to output cookie
			return true;
		}else{
			return false;
		}
	}


	//Logout
	public function logoutadmin(){
		$this->load->helper('cookie');
		delete_cookie("memberCookie");
		header("Location: ".base_url()."index.php/login");
		die();
	}

	public function logoutmember(){
		$this->load->helper('cookie');
		delete_cookie("memberCookie");
		header("Location: ".base_url()."index.php/login");
		die();
	}

	


}