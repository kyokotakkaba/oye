<?php
class default_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('default_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$this->load->view('frontpage');
	}

	public function login(){
		$this->load->view('login');
	}

	public function ceklogin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = $this->default_model->get_data_admin();
		if ($username == $data['username'] && $password == $data['password']) {
			$this->load->helper('cookie');
			$cookie= array(
				'name'   => 'backendCookie',
				'value'  => md5($username),
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