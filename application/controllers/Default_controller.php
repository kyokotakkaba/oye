<?php
class Default_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
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

	//Edit Member Admin
	public function editmember(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/editmember');
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
	public function editprofilemember(){
		if ($this->checkcookiemember()) {
			$this->load->view('member/editprofilemember');
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

	//registrasi sukses
	public function registrasisukses(){
		if ($this->checkcookiememberbaru()) {
			$this->load->view('member/registrasisukses');
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
		$data = $this->Default_model->get_data_parameter();
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
		$data = $this->Default_model->get_data_member($id);
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
		$data = $this->Default_model->get_data_member();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: tidak untuk front end, ambil data user dengan parameter filter array
	public function get_filtereduser($filter, $return_var = NULL){
		$data = $this->Default_model->get_data_member_filter($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//note: mengambil semua downline user dengan syarat downline kanan hanya boleh diambil jika punya kuota kiri
	public function get_lockkanan_alldownlineuser($id, $return_var = NULL){
		$currentuser = $this->get_specificuser($id,true);
		if ($currentuser['kuota_sponsor_kiri']>0) {
			$result = $this->get_alldownlineuser($id,true);
		}else{
			$childrentemp = $this->get_downlineuser($id,true); //get first level children
			$result = []; //initialize main children data
			$result[] = $currentuser;
			foreach ($childrentemp as $child) {
				if ($child['posisi_kaki']=='kiri') {
					$result = array_merge($result,$this->get_alldownlineuser($child['username'],true));
					break;
				}
			}
		}


		if ($return_var == true) {
			return $result;
		}else{
			echo json_encode($result);
		}
	}

	//note: mengambil semua downline user dengan parameter username
	public function get_alldownlineuser($id, $return_var = NULL){
		$childrentemp = $this->get_downlineuser($id,true); //get first level children
		$children = []; //initialize main children data
		$currentuser = $this->get_specificuser($id,true);
		$children[] = $currentuser;
		while (!empty($childrentemp)) {
			$nextlevelchildren = []; //initialize next level children data
			foreach ($childrentemp as $child) {
				set_time_limit(30); //reset timeout
				$children[]=$child; //store all child to main children data
				$nextlevelchildren = array_merge($nextlevelchildren,$this->get_downlineuser($child['username'],true));
			}
			$childrentemp = $nextlevelchildren;
		}
		if ($return_var == true) {
			return $children;
		}else{
			echo json_encode($children);
		}
	}

	//note: mengambil satu level downline user dengan parameter username
	public function get_downlineuser($id, $return_var = NULL){
		$data = $this->Default_model->get_data_member_filter(array('status'=> 'active','replacement_user'=>$id));
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
		$data = $this->Default_model->get_data_withdraw($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: ambil data withdraw dari semua user
	public function get_alluser_withdraw(){
		$data = $this->Default_model->get_data_withdraw();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: Tidak untuk front end karena datetime format tidak bisa jadi parameter.
	//Ambil data withdraw spesifik berdasarkan user dan tanggal
	public function get_specific_withdraw($user, $tanggal, $return_var = NULL){
		$data = $this->Default_model->get_data_withdraw($user, $tanggal);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//Data Sponsor

	//note: ambil data sponsor dari user yang sedang login
	public function get_currentuser_bonussponsor(){
		$data = $this->Default_model->get_data_bonussponsor($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: ambil data sponsor dari semua user
	public function get_alluser_bonussponsor(){
		$data = $this->Default_model->get_data_bonussponsor();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}


	//Data Pairing

	//note: ambil data pair dari user yang sedang login
	public function get_currentuser_bonuspair(){
		$data = $this->Default_model->get_data_bonuspair($this->input->cookie('memberCookie',true));
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	//note: ambil data pair dari semua user
	public function get_alluser_bonuspair(){
		$data = $this->Default_model->get_data_bonuspair();
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}




	//INSERT

	//register new member
	//note: registrasi member baru dengan request POST seperti di bawah.
	//output: username sudah dipakai / replacement user tidak ditemukan / Replacement user tidak bisa digunakan
	//output: gagal mengubah data / gagal mengirim email
	//output: gagal mengirim sms. Respon : $respon / gagal mengirim sms. Curl belum aktif.
	//output: registrasi sukses
	public function insert_registrasimember(){
		$insertStatus = $this->validasiusername($this->input->post('username'),true);
		if ($insertStatus == "username tersedia") {
			$insertStatus = $this->validasireplacementuser($this->input->post('replacement_user'),true);
			if ($insertStatus === 0 || $insertStatus == 1){ // === untuk memastikan variabel bernilai angka 0
				$parameter = $this->get_parameter(true);
				$biaya = $parameter['biaya_registrasi'] + rand(500, 999);
				date_default_timezone_set('Asia/Jakarta');
				$data = array(
					'username' => $this->input->post('username'),
					//'password' => md5($this->input->post('password')),
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
					'kuota_sponsor_kiri'=>0,
					'tanggal_registrasi' => date('Y-m-d H:i:s'),
					'nominal_pembayaran' => $biaya,
					'status' => "Pending"
				);

				$insertStatus = $this->Default_model->insert_member($data);
				if ($insertStatus == "berhasil mengubah data"){
					echo "registrasi sukses "; //tetap sukses walau email sms gagal
					
					//kirim email
					if ($this->sendmail_registrasi($this->input->post('email'),$this->input->post('username'),$biaya)) {
					}else{
						echo "|gagal mengirim email ";
					}

					//kirim sms
					$respon = $this->sendsms_registrasi($this->input->post('no_telepon'),$this->input->post('username'),$biaya);
					if ($respon == "berhasil mengirim sms") {
					}else{
						echo "|".$respon;
					}


				}else{
					echo $insertStatus;
				}

			}else if ($insertStatus == 2){
				echo "Replacement user tidak bisa digunakan";
			}
		}else{
			echo $insertStatus;
		}
	}

	//withdraw member
	//note: lakukan withdraw oleh member dengan request POST nominal withdraw. Kurangi icash member
	//output: Minimum Withdraw adalah Rp $minim_wd
	//output: saldo tidak cukup (setiap penarikan dikenakan biaya administrasi sebesar Rp $admin_fee) / user tidak ditemukan
	//Output: berhasil mengubah data / gagal mengubah data / gagal mengurangi icash member
	public function insert_withdraw(){
		$value = $this->input->post('nominal');
		$parameter = $this->get_parameter(true);
		if ($value>=$parameter['minim_wd']) {
			$total = $value + $parameter['admin_fee'];
			$insertStatus = $this->validasiwithdraw($this->input->cookie('memberCookie',true),$total,true);
			if ($insertStatus == "bisa melakukan withdraw") {
				date_default_timezone_set('Asia/Jakarta');
				$data = array(
					'username' => $this->input->cookie('memberCookie',true),
					'tanggal' => date('Y-m-d H:i:s'),
					'nominal' => $value,
					'admin_fee' => $parameter['admin_fee'],
					'total' => $total,
					'status' => 'Pending'
				);

				$insertStatus = $this->Default_model->insert_withdraw($data);
				if ($insertStatus == "berhasil mengubah data") {
					$insertStatus = $this->Default_model->update_subtract_icash($this->input->cookie('memberCookie',true),$total);
					if ($insertStatus == "berhasil mengubah data"){
						echo $insertStatus;
					}else{
						echo "gagal mengurangi icash member";
					}
				}else{
					echo $insertStatus;
				}
			}else{
				echo $insertStatus;
			}
		}else{
			echo "Minimum Withdraw adalah Rp ".number_format($parameter['minim_wd'],0,",",".");
		}
	}



	//UPDATE

	//Ubah password

	//note: ubah password admin dengan request POST seperti di bawah.
	//Output: berhasil mengubah data / gagal mengubah data / password lama salah
	public function update_passwordadmin(){
		$oldpassword = md5($this->input->post('oldpassword'));
		$data = $this->Default_model->get_data_admin();
		if ($oldpassword == $data['password']){
			$data = array(
				'password' => md5($this->input->post('newpassword'))
			);
			$insertStatus = $this->Default_model->update_admin($this->input->cookie('backendCookie',true),$data);
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
			$insertStatus = $this->Default_model->update_member($this->input->cookie('memberCookie',true),$data);
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

		$insertStatus = $this->Default_model->update_member($this->input->cookie('memberCookie',true),$data);
		echo $insertStatus;
	}

	//note: ubah data member parameter 1: username, dengan request POST seperti di bawah. 
	//Parameter 2 bisa diabaikan oleh front end
	//Jika POST password kosong atau tidak ada, password tidak diupdate. Ini untuk fitur reset password oleh admin.
	//Output: berhasil mengubah data / gagal mengubah data
	public function update_profilmember_admin($id,$return_var = NULL){
		$datauser = $this->get_specificuser($id,true);
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
		);

		if ($datauser['status']=="Pending") {
			$data['replacement_user'] = $this->input->post('replacement_user');
		}
		if (!empty($this->input->post('password'))) {
			$data['password'] = md5($this->input->post('password'));//password reset
		}

		$insertStatus = $this->Default_model->update_member($id,$data);
		if ($return_var==true) {
			return $insertStatus;
		}else{
			echo $insertStatus;
		}
	}

	//note: verifikasi member berdasarkan parameter 1 username, untuk mengubah status ke aktif
	//Termasuk penempatan kaki dan perhitungan bonus sponsor dan BV
	//output: Replacement user tidak bisa digunakan
	//output: gagal mengubah status / gagal menambah icash sponsor / gagal menambah poin sponsor
	//output: gagal menambah bv upline $userUpline
	//output: gagal mengirim email
	//output: gagal mengirim sms. Respon : $respon / gagal mengirim sms. Curl belum aktif.
	//output: verifikasi sukses
	public function update_verifikasi_member($id){
		// $updateprofil = $this->update_profilmember_admin($id,true); //apakah profil diupdate dulu sebelum verifikasi atau tidak?
		$datauser = $this->get_specificuser($id,true);
		$jumlahdownline = $this->validasireplacementuser($datauser['replacement_user'],true);
		$posisikaki = 'batal';
		if ($jumlahdownline === 0) { // === untuk memastikan variabel bernilai angka 0
			$posisikaki = 'kiri';
		}else if ($jumlahdownline == 1) {
			$posisikaki = 'kanan';
		}

		//update status verifikasi
		if ($posisikaki != 'batal') {
			$passwordrandom = rand(10000000, 99999999);
			$data = array(
				// 'password' => md5($datauser['no_telepon']),
				'password' => md5($passwordrandom),
				'posisi_kaki' => $posisikaki,
				'status' => "active"
			);
			$insertStatus = $this->Default_model->update_member($id,$data);
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
				$insertStatus = $this->Default_model->insert_bonussponsor($data);

				if ($insertStatus == "berhasil mengubah data"){
					//tambah icash dari bonus sponsor
					$insertStatus = $this->Default_model->update_add_icash($datauser['sponsor'],$nominal);
					if ($insertStatus == "berhasil mengubah data"){
						//ambil kaki kiri downline
						$datadownlinesponsorkiri= $this->get_filtereduser(array('status'=> 'active','replacement_user'=>$datauser['sponsor'],'posisi_kaki'=>'kiri'), true);
						foreach ($datadownlinesponsorkiri as $row){
							$downlinesponsorkiri = $row['username'];
						}

						//check apakah user di kaki kiri sponsor
						if ($this->checkdownline($datauser['replacement_user'], $downlinesponsorkiri, true)) {
							//Tambah kuota kiri sponsor
							$insertStatus = $this->Default_model->update_add_kuota_sponsor_kiri($datauser['sponsor'],1);
						}else{
							//Kurangi kuota kiri sponsor
							$insertStatus = $this->Default_model->update_subtract_kuota_sponsor_kiri($datauser['sponsor'],1);
						}
						if ($insertStatus == "berhasil mengubah data"){
							//tambah poin dari bonus sponsor
							$insertStatus = $this->Default_model->update_add_poin($datauser['sponsor'],$poin);
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
											// $sukses = false; //comment untuk tetap jalankan program walau gagal
											// break;
											echo "gagal menambah bv upline ".$dataupline['username'];
										}
									}
									if ($sukses) {
									echo "verifikasi sukses "; //tetap sukses walau email sms gagal
									
									//kirim email
									if ($this->sendmail_verifikasi($datauser['email'],$datauser['username'],$passwordrandom)) {
									}else{
										echo "|gagal mengirim email ";
									}

									//kirim sms
									$respon = $this->sendsms_verifikasi($datauser['no_telepon'],$datauser['username'],$passwordrandom);
									if ($respon == "berhasil mengirim sms") {
									}else{
										echo "|".$respon;
									}
								}else{
									echo "gagal menambah bv upline ".$dataupline['username'];
								}
							}else{
								echo "gagal menambah bv upline ".$dataupline['username'];
							}
						}else{
							echo "gagal menambah poin sponsor";
						}

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
		$insertStatus = $this->Default_model->update_add_bvkiri($idupline,1);
	}else if ($kakidownline == 'kanan'){
		$insertStatus = $this->Default_model->update_add_bvkanan($idupline,1);
	}else{
		$insertStatus = "gagal mengubah data";
	}
	return $insertStatus;
}


	//note: verifikasi withdraw berdasarkan parameter 1 username, dan post tanggal
	//post tanggal menggunakan format date time [Y-m-d H:i:s] contoh: 2019-07-13 19:19:47
	//mengubah status withdraw
	//output: data withdraw tidak ditemukan / user tidak ditemukan
	//output: saldo tidak cukup (setiap penarikan dikenakan biaya administrasi sebesar Rp $admin_fee)
	//output: gagal mengubah status withdraw
	//output: verifikasi sukses
public function update_verifikasi_withdraw($id){
	$tanggal = $this->input->post('tanggal');
	$datawithdraw = $this->get_specific_withdraw($id,$tanggal,true);
	if (empty($datawithdraw)) {
		echo 'data withdraw tidak ditemukan';
	}else{
		$response = $this->validasiwithdraw($id,$datawithdraw['total'],true);
		if ($response == 'bisa melakukan withdraw') {
			$data = array(
				'status' => "Success"
			);
			$insertStatus = $this->Default_model->update_withdraw($id,$tanggal,$data);
			if ($insertStatus == "berhasil mengubah data") {
				echo "verifikasi sukses";
			}else{
				echo "gagal mengubah status withdraw";
			}
		}else{
			echo $response;
		}
	}
}



	//note: payout bonus pair semua member
	//
	//output: data member kosong / gagal menginput bonus pair $member / gagal menginput bonus pair kedua $member
	//output: gagal menambah icash $member / gagal menambah poin $member / gagal mengurangi bv $member 
	//output: payout bonus pair $member sukses 
public function update_payout_bonuspair(){
		//ambil member yang memiliki bv kiri dan kanan
	$allActiveMember= $this->get_filtereduser(array('status'=> 'active','bv_kiri >'=>0, 'bv_kanan >'=>0), true);
	if (empty($allActiveMember)) {
		echo 'data member kosong';
	}else{
		$parameter = $this->get_parameter(true);
		foreach ($allActiveMember as $member) {
				set_time_limit(30); //reset timeout tiap member

				//hitung payout BV
				if ($member['bv_kiri']<$member['bv_kanan']) {
					$payoutBV = $member['bv_kiri'];
				}else{
					$payoutBV = $member['bv_kanan'];
				}

				//cek apakah bv melebihi batas payout
				if ($payoutBV>$parameter['batas_pairing_pertama']) {
					$payoutBV2 = $payoutBV-$parameter['batas_pairing_pertama'];
					$payoutBV = $parameter['batas_pairing_pertama'];
				}else{
					$payoutBV2 = 0;
				}

				date_default_timezone_set('Asia/Jakarta');
				$tanggal = date('Y-m-d H:i:s');
				$total = $payoutBV*$parameter['bonus_pairing_pertama'];
				$icash = $total*((100-$parameter['persentase_poin'])/100);
				$poin = $total*($parameter['persentase_poin']/100);
				//insert tabel bonus pair
				$data = array(
					'username' => $member['username'],
					'tanggal' => $tanggal,
					'harga_pair' => $parameter['bonus_pairing_pertama'],
					'jumlah_pair' => $payoutBV,
					'total' => $total,
					'icash' => $icash,
					'poin' => $poin
				);
				$insertStatus = $this->Default_model->insert_bonuspair($data);

				if ($insertStatus == "berhasil mengubah data"){
					if ($payoutBV2>0) {
						//bonus pairing kedua bila melebihi batas
						$total2 = $payoutBV2*$parameter['bonus_pairing_kedua'];
						$icash2 = $total2*((100-$parameter['persentase_poin'])/100);
						$poin2 = $total2*($parameter['persentase_poin']/100);
						//insert tabel bonus pair
						$data = array(
							'username' => $member['username'],
							'tanggal' => $tanggal,
							'harga_pair' => $parameter['bonus_pairing_kedua'],
							'jumlah_pair' => $payoutBV2,
							'total' => $total2,
							'icash' => $icash2,
							'poin' => $poin2
						);
						$insertStatus = $this->Default_model->insert_bonuspair($data);
						if ($insertStatus != "berhasil mengubah data") {
							echo "gagal menginput bonus pair kedua ".$member['username']."<br>";
						}
					}else{
						$total2 = 0;
						$icash2 = 0;
						$poin2 = 0;
					}

					//update icash, poin, dan bv member
					$icash = $icash+$icash2;
					$poin = $poin+$poin2;
					$payoutBV = $payoutBV+$payoutBV2;



					//tambah icash member
					$insertStatus = $this->Default_model->update_add_icash($member['username'],$icash);
					if ($insertStatus == "berhasil mengubah data"){
					//tambah poin member
						$insertStatus = $this->Default_model->update_add_poin($member['username'],$poin);
						if ($insertStatus == "berhasil mengubah data"){
							//kurangi bv member
							$insertStatus = $this->Default_model->update_subtract_bv($member['username'],$payoutBV);
							if ($insertStatus == "berhasil mengubah data"){
								echo "payout bonus pair ".$member['username']." sukses <br>";
							}else{
								echo "gagal mengurangi bv ".$member['username']."<br>";
							}
						}else{
							echo "gagal menambah poin ".$member['username']."<br>";
						}
					}else{
						echo "gagal menambah icash ".$member['username']."<br>";
					}
				}else{
					echo "gagal menginput bonus pair ".$member['username']."<br>";
				}
			}
		}
	}




	//DELETE

	//delete member
	//note: hapus data member sesuai username parameter 1
	//Hanya bisa menghapus user yang pending
	//Output: berhasil menghapus data / gagal menghapus data
	public function delete_member($id){
		$insertStatus = $this->Default_model->delete_member($id); 
		echo $insertStatus;
	}

	//delete withdraw
	//note: hapus data withdraw username parameter 1 dan post tanggal
	//post tanggal menggunakan format date time [Y-m-d H:i:s] contoh: 2019-07-13 19:19:47
	//Output: berhasil menghapus data / gagal menghapus data
	public function delete_withdraw($id){
		$tanggal = $this->input->post('tanggal');
		$insertStatus = $this->Default_model->delete_withdraw($id,$tanggal);
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
		$data = $this->Default_model->get_data_admin();
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

	//Security code
	//note: cek security code sebelum withdraw dengan request POST seperti di bawah. 
	//Output: security code belum dibuat. Silahkan buat di halaman edit profil.
	//Output: security code salah / security code benar
	public function ceksecuritycode(){
		$code = $this->input->post('security_code');
		$data = $this->get_currentuser(true);
		if (empty($data['security_code'])) {
			echo "security code belum dibuat. Silahkan buat di halaman edit profil.";
		}else if ($code == $data['security_code']){
			echo "security code benar";
		}else{
			echo "security code salah";
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

	//note: untuk front end
	public function checkcookiememberbaru(){
		$this->load->helper('cookie');
		if ($this->input->cookie('memberBaru',true)!=NULL) {
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

	//untuk mengecek apakah bisa melakukan withdraw berdasarkan saldo user
	//output: user tidak ditemukan / bisa melakukan withdraw
	//output: saldo tidak cukup (setiap penarikan dikenakan biaya administrasi sebesar Rp $admin_fee)
	public function validasiwithdraw($id, $value, $return_var=NULL){
		$datauser = $this->get_specificuser($id,true);
		if (empty($datauser)) {
			if ($return_var == true) {
				return 'user tidak ditemukan';
			}else{
				echo "user tidak ditemukan";
			}
		}else{
			$parameter = $this->get_parameter(true);
			if ($datauser['icash']>= $value) {
				$response = 'bisa melakukan withdraw';
			}else{
				$response = 'saldo tidak cukup (Setiap penarikan dikenakan biaya administrasi sebesar Rp '.number_format($parameter['admin_fee'],0,",",".").")";
			}

			if ($return_var == true) {
				return $response;
			}else{
				echo $response;
			}
		}	
	}

	//untuk mengecek apakah user parameter 1 adalah downline dari user parameter 2
	//output: true / false
	public function checkdownline($iddownline, $idupline, $return_var = NULL){
		$childrentemp = $this->get_downlineuser($idupline,true); //get first level children
		$result = false;
		while (!empty($childrentemp)) {
			$nextlevelchildren = []; //initialize next level children data
			foreach ($childrentemp as $child) {
				set_time_limit(30); //reset timeout
				if ($child['username']==$iddownline) {
					$result = true;
					break 2;
				}
				$nextlevelchildren = array_merge($nextlevelchildren,$this->get_downlineuser($child['username'],true));
			}
			$childrentemp = $nextlevelchildren;
		}
		if ($return_var == true) {
			return $result;
		}else{
			echo $result;
		}
	}

	//untuk mengirim email registrasi, tidak untuk front end
	//output: true / false
	public function sendmail_registrasi($to, $username, $biaya){
		$parameter = $this->get_parameter(true);
		$subject = "Pendaftaran member oye.co.id";
		$txt = "Member yang terhormat, terima kasih telah melakukan pendaftaran di oye.co.id.\nAnda telah mendaftarkan diri dengan detail \nusername: ".$username."\nSilahkan lakukan pembayaran ke rekening berikut:\n".$parameter['nama_bank']."\nNo rekening: ".$parameter['no_rekening']."\nAtas Nama: ".$parameter['atas_nama']."\nNominal Pembayaran: Rp ".number_format($biaya,0,",",".")."\nKirim bukti transfer untuk verifikasi ke no WA admin: ".$parameter['no_admin'];
		$txt = wordwrap($txt,140);
		$headers = "From: oye@oye.co.id";

		return mail($to,$subject,$txt,$headers);
	}

	//untuk mengirim email verifikasi, tidak untuk front end
	//output: true / false
	public function sendmail_verifikasi($to, $username, $password){
		$subject = "Pendaftaran member oye.co.id";
		$txt = "Member yang terhormat, terima kasih pendaftaran anda telah di kami setujui. \nAnda telah terdaftar dengan detail \nUsername:".$username."\npassword:".$password."\nSilahkan login ke oye.co.id untuk mengakses dashboard anda.";
		$txt = wordwrap($txt,140);
		$headers = "From: oye@oye.co.id";

		return mail($to,$subject,$txt,$headers);
	}


	//untuk mengirim sms registrasi, tidak untuk front end
	//output: berhasil mengirim sms / gagal mengirim sms. Respon : $respon / gagal mengirim sms. Curl belum aktif.
	public function sendsms_registrasi($to, $username, $biaya){
		$parameter = $this->get_parameter(true);
		$txt = "Registrasi oye.co.id : ".$username.". Pembayaran Rp ".number_format($biaya,0,",",".")." ke rek ".$parameter['nama_bank']." ".$parameter['no_rekening']." a/n ".$parameter['atas_nama'].". Kirim bukti transfer ke WA: ".$parameter['no_admin'];

		return $this->sendsms($to,$txt);
	}

	//untuk mengirim sms verifikasi, tidak untuk front end
	//output: berhasil mengirim sms / gagal mengirim sms. Respon : $respon / gagal mengirim sms. Curl belum aktif.
	public function sendsms_verifikasi($to, $username, $password){
		$txt = "Pendaftaran oye.co.id telah disetujui. Silahkan login dengan username:".$username." password:".$password;
		return $this->sendsms($to,$txt);
	}

	//memanggil api pengirim sms, tidak untuk front end
	//output: berhasil mengirim sms / gagal mengirim sms. Respon : $respon / gagal mengirim sms. Curl belum aktif.
	public function sendsms($to,$text){
		$username    = 'bekkostudio'; 
		$apikey      = '75e1663ea2429a322f889ed11c3cf671'; 
		$urlserver   = 'http://sms241.xyz';
		if(!function_exists('curl_version')){
			return "gagal mengirim sms. Curl belum aktif.";
		}else{
			$number  = $to;
			$message = $text;
			$url     = $urlserver."/sms/smsreguler.php?username=".urlencode($username)."&key=".urlencode($apikey)."&number=".urlencode($number)."&message=".urlencode($message);
			$curlHandle = curl_init();
			curl_setopt($curlHandle, CURLOPT_URL,$url);
			curl_setopt($curlHandle, CURLOPT_HEADER, 0);
			curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
			$respon = curl_exec($curlHandle);
			curl_close($curlHandle);			
			if (substr($respon,0,1)=='0') {
				return "berhasil mengirim sms";		
			} else {
				return "gagal mengirim sms. Respon : $respon";		
			}
		}

	}






}