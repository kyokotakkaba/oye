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

	//Member Admin
	public function memberadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/memberadmin');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Withdraw Admin
	public function withdrawadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/withdrawadmin');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//New Member Admin
	public function new_memberadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/new_memberadmin');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//dashboard member
	public function dashboardmember(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/dashboard');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//change password admin
	public function changepasswordadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/change_password');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//change password member
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

	//registrasi member
	public function registrasimember(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/registrasimember');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//laporan bonus sponsor
	public function laporanbonussponsor(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/laporanbonussponsor');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}
	
	//laporan bonus pairing
	public function laporanbonuspair(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/laporanbonuspair');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//genealogy tree
	public function genealogytree(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/genealogytree');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}
	
	//withdraw
	public function withdrawmember(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/withdrawmember');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}



	//GET DATA

	//note: ambil semua data dari database parameter. 
	//Parameter return_var tidak untuk front end, jadi bisa langsung request url dengan /get_parameter
	public function get_parameter($return_var = NULL){
		$data = $this->default_model->get_data_parameter();
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//Data member

	//note: ambil data user secara spesifik dengan parameter username. Parameter dua bisa diabaikan front end
	public function get_specificuser($id, $return_var = NULL){
		$data = $this->default_model->get_data_member($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//note: ambil data user yang sedang login
	public function get_currentuser($return_var = NULL){
		$data = $this->get_specificuser($this->input->cookie('memberCookie',true),true);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//note: ambil semua data user
	public function get_alluser(){
		$data = $this->default_model->get_data_member();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: tidak untuk front end, ambil data user dengan parameter filter array
	public function get_filtereduser($filter, $return_var = NULL){
		$data = $this->default_model->get_data_member_filter($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//Data Withdraw

	//note: ambil data withdraw dari user yang sedang login
	public function get_currentuser_withdraw(){
		$data = $this->default_model->get_data_withdraw($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: ambil data withdraw dari semua user
	public function get_alluser_withdraw(){
		$data = $this->default_model->get_data_withdraw();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//Data Sponsor

	//note: ambil data sponsor dari user yang sedang login
	public function get_currentuser_bonussponsor(){
		$data = $this->default_model->get_data_bonussponsor($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: ambil data sponsor dari semua user
	public function get_alluser_bonussponsor(){
		$data = $this->default_model->get_data_bonussponsor();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}


	//Data Pairing

	//note: ambil data pair dari user yang sedang login
	public function get_currentuser_bonuspair(){
		$data = $this->default_model->get_data_bonuspair($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: ambil data pair dari semua user
	public function get_alluser_bonuspair(){
		$data = $this->default_model->get_data_bonuspair();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}




	//INSERT

	//register new member
	//note: registrasi member baru dengan request POST seperti di bawah.
	//Output: berhasil mengubah data / gagal mengubah data
	public function insert_registrasimember(){
		$parameter = $this->get_parameter(true);
		$biaya = $parameter['biaya_registrasi'] + rand(500, 999);
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_telepon' => $this->input->post('no_telepon'),
			'ktp' => $this->input->post('ktp'),
			'alamat' => $this->input->post('alamat'),
			'nama_bank' => $this->input->post('nama_bank'),
			'no_rekening' => $this->input->post('no_rekening'),
			'atas_nama_bank' => $this->input->post('atas_nama_bank'),
			'sponsor' => $this->input->cookie('memberCookie',true),
			'replacement_user' => $this->input->post('replacement_user'),
			'icash' => 0,
			'bv_kanan' => 0,
			'bv_kiri' => 0,
			'tanggal_registrasi' => date('Y-m-d H:i:s'),
			'nominal_pembayaran' => $biaya,
			'status' => "Pending"
		);

		$insertStatus = $this->default_model->insert_member($data);
		echo $insertStatus;
	}





	//UPDATE

	//Ubah password

	//note: ubah password admin dengan request POST seperti di bawah.
	//Output: berhasil mengubah data / gagal mengubah data / password lama salah
	public function update_passwordadmin(){
		$oldpassword = md5($this->input->post('oldpassword'));
		$data = $this->default_model->get_data_admin();
		if ($oldpassword == $data['password']){
			$data = array(
				'password' => md5($this->input->post('newpassword'))
			);
			$insertStatus = $this->default_model->update_admin($this->input->cookie('backendCookie',true),$data);
			echo $insertStatus;
		}else{
			echo "password lama salah";
		}
	}

	//note: ubah password member yang sedang login dengan request POST seperti di bawah.
	//Output: berhasil mengubah data / gagal mengubah data / password lama salah
	public function update_passwordmember(){
		$oldpassword = md5($this->input->post('oldpassword'));
		$data = $this->get_currentuser(true);
		if ($oldpassword == $data['password']){
			$data = array(
				'password' => md5($this->input->post('newpassword'))
			);
			$insertStatus = $this->default_model->update_member($this->input->cookie('memberCookie',true),$data);
			echo $insertStatus;
		}else{
			echo "password lama salah";
		}
	}

	//edit profil
	//note: ubah data member yang sedang login dengan request POST seperti di bawah.
	//Output: berhasil mengubah data / gagal mengubah data
	public function update_profilmember(){
		$data = array(
			'email' => $this->input->post('email'),
			'no_telepon' => $this->input->post('no_telepon'),
			'alamat' => $this->input->post('alamat'),
			'nama_bank' => $this->input->post('nama_bank'),
			'no_rekening' => $this->input->post('no_rekening'),
			'atas_nama_bank' => $this->input->post('atas_nama_bank'),
			'security_code' => $this->input->post('security_code')
		);

		$insertStatus = $this->default_model->update_member($this->input->cookie('memberCookie',true),$data);
		echo $insertStatus;
	}

	//note: ubah data member parameter 1: username, dengan request POST seperti di bawah. 
	//Parameter 2 bisa diabaikan oleh front end
	//Jika POST password kosong atau tidak ada, password tidak diupdate. Ini untuk fitur reset password oleh admin.
	//Output: berhasil mengubah data / gagal mengubah data
	public function update_profilmember_admin($id,$return_var = NULL){
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_telepon' => $this->input->post('no_telepon'),
			'ktp' => $this->input->post('ktp'),
			'alamat' => $this->input->post('alamat'),
			'nama_bank' => $this->input->post('nama_bank'),
			'no_rekening' => $this->input->post('no_rekening'),
			'atas_nama_bank' => $this->input->post('atas_nama_bank'),
			'sponsor' => $this->input->post('sponsor'),
			'replacement_user' => $this->input->post('replacement_user'),
			'icash' => 0,
			'bv_kanan' => 0,
			'bv_kiri' => 0,
			'status' => "Pending"
		);

		if (!empty($this->input->post('password'))) {
			$data['password'] = md5($this->input->post('password'));//password reset
		}

		$insertStatus = $this->default_model->update_member($id,$data);
		if ($return_var==true) {
			return $insertStatus;
		}else{
			echo $insertStatus;
		}
	}

	//warning: Belum selesai
	//note: verifikasi member berdasarkan parameter 1 username, untuk mengubah status ke aktif
	//Termasuk penempatan kaki dan perhitungan bonus sponsor dan BV
	//output: Replacement user tidak bisa digunakan
	//output: gagal mengubah data / gagal mengubah status / gagal menambah icash sponsor / gagal menambah poin sponsor
	//output: gagal menambah bv upline $userUpline
	//output: verifikasi sukses
	public function update_verifikasi_member($id){
		// $updateprofil = $this->update_profilmember_admin($id,true); //apakah profil diupdate dulu sebelum verifikasi atau tidak?
		$datauser = $this->get_specificuser($id,true);
		$jumlahdownline = $this->validasireplacementuser($datauser['replacement_user'],true);
		$datadownline= $this->get_filtereduser(array('status'=> 'active','replacement_user'=>$datauser['replacement_user']), true);
		$posisikaki = 'batal';
		if ($jumlahdownline == 0) {
			$posisikaki = 'kiri';
		}else if ($jumlahdownline == 1) {
			$posisikaki = 'kanan';
		}

		//update status verifikasi
		if ($posisikaki != 'batal') {
			$data = array(
				'posisi_kaki' => $posisikaki,
				'status' => "active"
			);
			$insertStatus = $this->default_model->update_member($id,$data);
			if ($insertStatus == "berhasil mengubah data") {

				//insert bonus sponsor
				$parameter = $this->get_parameter(true);
				$nominal = $parameter['bonus_sponsor']*((100-$parameter['persentase_poin'])/100);
				$poin = $parameter['bonus_sponsor']*($parameter['persentase_poin']/100);
				$data = array(
					'sponsor' => $datauser['sponsor'],
					'username_member' => $id,
					'nominal' => $nominal,
					'poin' => $poin
				);
				$insertStatus = $this->default_model->insert_bonussponsor($data);

				if ($insertStatus == "berhasil mengubah data"){
					//tambah icash dari bonus sponsor
					$insertStatus = $this->default_model->update_add_icash($datauser['sponsor'],$nominal);
					if ($insertStatus == "berhasil mengubah data"){
					//tambah poin dari bonus sponsor
						$insertStatus = $this->default_model->update_add_poin($datauser['sponsor'],$poin);
						if ($insertStatus == "berhasil mengubah data"){
							//tambah bv semua upline
							$dataupline = $this->get_specificuser($datauser['replacement_user'],true);
							$insertStatus = $this->update_add_bv($dataupline['username'],$posisikaki);
							if ($insertStatus == "berhasil mengubah data") {
								$sukses = true;
								while (!empty($dataupline['replacement_user'])) {
									set_time_limit(30);
									$posisikaki = $dataupline['posisi_kaki'];
									$dataupline = $this->get_specificuser($dataupline['replacement_user'],true);
									$insertStatus = $this->update_add_bv($dataupline['username'],$posisikaki);
									if ($insertStatus == "gagal mengubah data"){
										$sukses = false;
										break;
									}
								}
								if ($sukses) {
									echo "verifikasi sukses";
								}else{
									echo "gagal menambah bv upline ".$dataupline['username'];
								}
							}else{
								echo "gagal menambah bv upline ".$dataupline['username'];
							}
						}else{
							echo "gagal menambah poin sponsor";
						}
					}else{
						echo "gagal menambah icash sponsor";
					}


				}else{
					echo "gagal menginput bonus sponsor";
				}


			}else{
				echo "gagal mengubah status";
			}
			//continue here
		}else{
			echo "Replacement user tidak bisa digunakan";
		}
	}

	//note: bukan untuk front end
	//Mengecek posisi kaki bv dan menambah bv
	public function update_add_bv($idupline, $kakidownline){
		if ($kakidownline == 'kiri') {
			$insertStatus = $this->default_model->update_add_bvkiri($idupline,1);
		}else if ($kakidownline == 'kanan'){
			$insertStatus = $this->default_model->update_add_bvkanan($idupline,1);
		}
		return $insertStatus;
	}




	//DELETE

	//delete member
	//note: hapus data member sesuai username parameter 1
	//Hanya bisa menghapus user yang pending
	//Output: berhasil menghapus data / gagal menghapus data
	public function delete_member($id){
		$insertStatus = $this->main_model->delete_member($id); 
		echo $insertStatus;
	}





	//OTHER

	//Login
	//note: login dengan request POST seperti di bawah. 
	//Melakukan pengecekan login admin dulu, jika gagal, pengecekan login user yang aktif
	//Output: berhasil login admin / berhasil login member / gagal login
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
			$data = $this->get_filtereduser(array('status'=> 'active'), true);
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
	//note: tidak untuk front end
	public function checkcookieadmin(){
		$this->load->helper('cookie');
		if ($this->input->cookie('backendCookie',true)!=NULL) {
			// echo $this->input->cookie('backendCookie'); //to output cookie
			return true;
		}else{
			return false;
		}
	}

	//note: tidak untuk front end
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
	//note: menghapus cookie admin dan langsung redirect ke halaman login
	public function logoutadmin(){
		$this->load->helper('cookie');
		delete_cookie("memberCookie");
		header("Location: ".base_url()."index.php/login");
		die();
	}

	//note: menghapus cookie member dan langsung redirect ke halaman login
	public function logoutmember(){
		$this->load->helper('cookie');
		delete_cookie("memberCookie");
		header("Location: ".base_url()."index.php/login");
		die();
	}

	//untuk mengecek apakah username sudah dipakai atau tidak
	//output: username tersedia / username sudah dipakai
	public function validasiusername($id, $return_var=NULL){
		$datauser = $this->get_specificuser($id,true);
		if (empty($datauser)) {
			$response = 'username tersedia';
		}else{
			$response = 'username sudah dipakai';
		}

		if ($return_var == true) {
			return $response;
		}else{
			echo $response;
		}
	}

	//untuk mengecek apakah replacement user ada dan kakinya sudah penuh atau belum
	//output: replacement user tidak ditemukan
	//output: 0/1/2 (jumlah kaki downline, 2 berarti penuh)
	public function validasireplacementuser($id, $return_var=NULL){
		$datauser = $this->get_specificuser($id,true);
		if (empty($datauser)) {
			if ($return_var == true) {
				return 'replacement user tidak ditemukan';
			}else{
				echo "replacement user tidak ditemukan";
			}
		}else{
			$datadownline = $this->get_filtereduser(array('status'=> 'active','replacement_user'=>$id), true);
			if ($return_var == true) {
				return count($datadownline);
			}else{
				echo count($datadownline);
			}
		}
		
		
	}

	


}