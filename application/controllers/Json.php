<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

	/**
	 * Author : Muh. Arsyi Azimin
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('Model_json'));
    }

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass_hash= md5($password);
		//if (isset($_POST["user"])) {
			$ada = $this->Model_json->cek($username,$pass_hash);
			if ($ada==1) {
				$hasil = $this->Model_json->signin_mhs($username,$pass_hash);
				$response["privilege"] = 1;
				$response["error"] = FALSE;
				$response["data"] = $hasil;
				echo json_encode($response);
			} elseif ($ada==2) {
				$hasil = $this->Model_json->signin_dosen($username,$pass_hash);
				$response["privilege"] = 2;
				$response["error"] = FALSE;
				$response["data"] = $hasil;
				echo json_encode($response);
			} else {
				$user = "admin";
				$pass = "satu";
				if (($username == $user) && ($password == $pass)) {
					$response["privilege"] = 3;
					$response["error"] = FALSE;
					$data = array('username' => $username, 'password' => $password);
					$response["data"] = $data;
					echo json_encode($response);
				} else {
					$response["error"] = TRUE;
					$response["error_msg"] = "username dan password salah !!";
					echo json_encode($response);	
				}
			}
		//} else {
			//$response["error"] = TRUE;
			//$response["error_msg"] = "Tida ada POST";
			//$hasil = $this->Model_login->signin_mhs("1","c4ca4238a0b923820dcc509a6f75849b");
			//$response["data"] = $hasil;
			//echo json_encode($response);
		//}
	}

	public function signup(){
		$berhasil = $this->Model_json->signup();
		if($berhasil==1){
			
		} else {
			
		}
	}

	public function jadwal_mhs(){
		$jadwal_mhs = $this->Model_json->jadwal_mhs($username);
		$response["jadwal"] = $jadwal_mhs;
		echo json_encode($response);
	}

	public function log_presensi(){
		$log_presensi = $this->Model_json->log_presensi($username);
		$response["log_presensi"] = $log_presensi;
		echo json_encode($response);
	}

}
?>