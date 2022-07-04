<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
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
        $this->load->model(array('Model_login'));
    }
	public function index(){
		$username = $this->session->userdata("username");
		$password = $this->session->userdata("password");
		//$param["header"] = "Dashboard";

		//$notif = $this->Model_mahasiswa->notif();
		//$sum_notif = count($notif);
		//$param["notif"] = $notif;
		//$param["sum_notif"] = $sum_notif;

		if (empty($username)) {
			$this->load->view('/template/login');
		} else {
			$ada = $this->Model_login->cek($username,$password);
			if ($ada==1) {
				redirect(base_url()."mahasiswa/");
			} elseif ($ada==2) {
				redirect(base_url()."dosen/");
			} else {
				redirect(base_url()."admin/");
			}
		}
	}

	public function ceknim_nip(){
		$ada = $this->Model_login->ceknim_nip();

		if ($ada==1) {
			echo "<span class='label label-success'>NIM Terdaftar</span>";
		}elseif ($ada==2) {
			echo "<span class='label label-success'>NIP Terdaftar</span>";
		}else{
			echo "<span class='label label-warning'>NI/NIP tidak terdaftar</span>";
		}
	}

	public function cekmac(){
		$ada = $this->Model_login->cekmac();

		if ($ada==1) {
			echo "<span class='label label-warning'>Mac Address sudah terdaftar</span>";
		} elseif($ada==2) {
			echo "<span class='label label-warning'>Mac Address sudah terdaftar</span>";
		} else {
			echo "<span class='label label-success'><i class='fa fa-check'></i></span>";
		}
	}

	public function signup(){
		$berhasil = $this->Model_login->signup();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Disimpan !!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Berhasil Disimpan !!
                  </div>");
		}
		redirect(base_url());
	}

	public function signin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass_hash= md5($password);
		$ada = $this->Model_login->cek($username,$pass_hash);
		if ($ada==1) {
			$hasil = $this->Model_login->signin_mhs($username,$pass_hash);
			//json_encode($hasil);
			foreach ($hasil as $data) {
				$user	= $data->nim;
				$pass	= $data->password;
				$nama_mhs	= $data->nama_mhs;
			}

			//if (($username==$user) && ($pass_hash==$pass)) {
				$this->session->set_userdata('username',$user);
				$this->session->set_userdata('password',$pass);
				$this->session->set_userdata('nama',$nama_mhs);
				echo "<div id='sukses' class='alert alert-info'><strong><span class='fa fa-spimer fa-pulse fa-2x'></span> Redirect ... </strong></div><script>window.location='".base_url()."'</script>";
			/*}else{
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                    </button>
	                    <strong>Gagal!!</strong> username/nim dan password salah !!
	                  </div>";
			}*/
		} elseif ($ada==2) {
			$hasil = $this->Model_login->signin_dosen($username,$pass_hash);
			//json_encode($hasil);
			foreach ($hasil as $row) {
				$user	= $row->nip;
				$pass	= $row->password;
				$nama_dosen = $row->nama_dosen;
			}

				$this->session->set_userdata('username',$user);
				$this->session->set_userdata('password',$pass);
				$this->session->set_userdata('nama',$nama_dosen);
				echo "<div id='sukses' class='alert alert-info'><strong><span class='fa fa-spimer fa-pulse fa-2x'></span> Redirect ... </strong></div><script>window.location='".base_url()."'</script>";

			/*if (($username==$user) && ($pass_hash==$pass)) {
				echo "ada nip";
			}else{
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                    </button>
	                    <strong>Gagal!!</strong> username/nip dan password salah !!
	                  </div>";
			}*/
		} else {
			$user = "admin";
			$pass = "satu";
			if (($username == $user) && ($password == $pass)) {
				//$this->session->set_userdata('id_user',$id_user);
				$this->session->set_userdata('username',$username);
				$this->session->set_userdata('password',$password);
				$this->session->set_userdata('nama',$username);
				echo "<div id='sukses' class='alert alert-info'><strong><span class='fa fa-spimer fa-pulse fa-2x'></span> Redirect ... </strong></div><script>window.location='".base_url()."'</script>";
			} else {
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                    </button>
	                    <strong>Gagal!!</strong> username dan password salah !!
	                  </div>";			
			}
		} 		
	}

	public function logout(){
		$this->session->unset_userdata('nama','');
		$this->session->unset_userdata('username','');
		$this->session->unset_userdata('password','');
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
