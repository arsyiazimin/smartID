<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

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
	function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('Model_mahasiswa'));
    }
	public function index(){
		$ada = $this->Model_mahasiswa->cek($this->session->userdata("username"),$this->session->userdata("password"));
		if($ada!=1) redirect(base_url());
		$param["title"] = $this->session->userdata('nama');
		
		$this->load->view('template/mahasiswa/header');
		$this->load->view('template/mahasiswa/dashboard',$param);
		$this->load->view('template/mahasiswa/footer');
	}

	public function jadwal_mhs(){
		$ada = $this->Model_mahasiswa->cek($this->session->userdata("username"),$this->session->userdata("password"));
		if($ada!=1) redirect(base_url());

		$param["title"] = "Jadwal Kuliah";

		$jadwal_mhs = $this->Model_mahasiswa->jadwal_mhs();
		$json_jadwal_mhs = json_encode($jadwal_mhs);
		//echo $json_jadwal_mhs;
		$param["jadwal_mhs"] = $jadwal_mhs;
		$this->load->view('template/mahasiswa/header');
		$this->load->view('mahasiswa/jadwal_mhs',$param);
		$this->load->view('template/mahasiswa/footer');
	}

	public function log_presensi(){
		$ada = $this->Model_mahasiswa->cek($this->session->userdata("username"),$this->session->userdata("password"));
		if($ada!=1) redirect(base_url());

		$param["title"] = "Data Presensi";

		$log_presensi = $this->Model_mahasiswa->log_presensi();
		$json_log_presensi = json_encode($log_presensi);
		//echo $json_log_presensi;
		$param["log_presensi"] = $log_presensi;
		$this->load->view('template/mahasiswa/header');
		$this->load->view('mahasiswa/log_presensi',$param);
		$this->load->view('template/mahasiswa/footer');
	}

	public function updateabsen(){
		$berhasil = $this->Model_mahasiswa->updateabsen();
		if ($berhasil==1) {
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Diupdate !!
                  </div>");
		}else{
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Diupdate !!
                  </div>");
		}
		redirect(base_url().'mahasiswa/log_presensi');
	}

}
