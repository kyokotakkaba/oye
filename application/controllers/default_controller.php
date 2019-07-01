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
		$password = $this->input->post('password');
		$data = $this->default_model->get_login();
		// echo "submited user: ".$username."|".$password."<br>";
		// echo "server user: ".$data['username']."|".$data['password']."<br>";
		if ($username == $data['username'] && $password == $data['password']) {
			echo "berhasil login";
		}else{
			echo "gagal login";
		}

	}
}