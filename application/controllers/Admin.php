<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->model(array('Model_admin'));
    }
	public function index(){
		//$ada = $this->Model_admin->cek($this->session->userdata("username"),$this->session->userdata("password"));
		//if($ada!=0) redirect(base_url());
		//echo "<script>alert(".$this->session->userdata('username').")</script>";
		if($this->session->userdata("username") != "admin") redirect(base_url());
		$param["title"] = $this->session->userdata('username');
		$data_kelas = $this->Model_admin->data_kelas();
		$param["data_kelas"] = $data_kelas;
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/dashboard',$param);
		$this->load->view('template/admin/footer',$param);
	}

	public function absen_mhs(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());
		if (($handle = fopen(base_url()."parsing/filemac-01.csv", "r")) !== FALSE) {
            $count = 0;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            	$mac = $data[0];
                $hasil = $this->Model_admin->ambil_mhs_mac($mac);
                foreach ($hasil as $row) {
                	$nama_mhs = $row->nama_mhs;
                	$nim = $row->nim;
                	$mac_add = $row->mac_add;

                	if($count>=5 and $mac_add){
	                	$data_array[] = array("nim"=>$nim, "nama_mhs"=>$nama_mhs, "mac_add"=>$mac_add, "waktu_absen"=>$data[1]);
	                    $param["data_mhs"] = $data_array;
	                }
                }     
            	$count++;
            } //end while

            fclose($handle);            
        } 
        $data_kelas = $this->Model_admin->data_kelas();
		$param["data_kelas"] = $data_kelas;
        $param["title"] = "Daftar Abensi Mahasiswa";
        $this->load->view('template/admin/header');
		$this->load->view('admin/viewabsen_mhs',$param);
		$this->load->view('template/admin/footer',$param);
	}

	public function absen_dosen(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());
		if (($handle = fopen(base_url()."parsing/filemac-01.csv", "r")) !== FALSE) {
            $count = 0;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            	$mac = $data[0];
                $hasil = $this->Model_admin->ambil_dosen_mac($mac);
                foreach ($hasil as $row) {
                	$nama_dosen = $row->nama_dosen;
                	$kode_dosen = $row->kode_dosen;
                	$nip = $row->nip;
                	$mac_add = $row->mac_add;

                	if($count>=5 and $mac_add){
	                	$data_array[] = array("nip"=>$nip, "nama_dosen"=>$nama_dosen, "mac_add"=>$mac_add, "waktu_absen"=>$data[1], "kode_dosen"=>$kode_dosen);
	                    $param["data_dosen"] = $data_array;
	                }
                }
            	$count++;
            } //end while

            fclose($handle);            
        } 
        $data_kelas = $this->Model_admin->data_kelas();
		$param["data_kelas"] = $data_kelas;
        $param["title"] = "Daftar Abensi Dosen";
        $this->load->view('template/admin/header');
		$this->load->view('admin/viewabsen_dosen',$param);
		$this->load->view('template/admin/footer',$param);
	}

	public function run_absen_mhs(){
		//if(!$this->session->userdata("username")) redirect(base_url());
		if (($handle = fopen(base_url()."parsing/filemac-01.csv", "r")) !== FALSE) {
            $no = 1;
            $count = 0;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            	$mac = $data[0];
                $hasil = $this->Model_admin->ambil_mhs_mac($mac);
                foreach ($hasil as $row) {
                	$nama_mhs = $row->nama_mhs;
                	$nim = $row->nim;
                	$mac_add = $row->mac_add;

                	if($count>=5 and $mac_add){
	                	$data_array = array(array("nim"=>$nim, "nama_mhs"=>$nama_mhs, "mac_add"=>$mac_add, "waktu_absen"=>$data[1]));
	                    $array = explode(" ",$data[1]);
	                    $tanggal = $array[1];
	                    $jam = $array[2];
	                    $timestamp = strtotime($tanggal);
	                    $day = date('D',$timestamp);
	                    switch ($day) {
	                        case 'Mon':
	                            $hari = 'Senin';
	                            break;
	                        
	                        case 'Tue':
	                            $hari = 'Selasa';
	                            break;

	                        case 'Wed':
	                            $hari = 'Rabu';
	                            break;

	                        case 'Thu':
	                            $hari = 'Kamis';
	                            break;

	                        case 'Fri':
	                            $hari = "Jumat";
	                            break;

	                        case 'Sat':
	                            $hari = 'Sabtu';
	                            break;

	                        default:
	                            # code...
	                            break;
	                    }
	                    //echo "Tanggal : ".$tanggal;
	                    $param["data_mhs"] = $data_array;
	                }
	                $jadwal_mhs = $this->Model_admin->jadwal_mhs();
	                foreach ($jadwal_mhs as $key) {
	                	$jam_masuk = $key->jam_m;
	                	$jam_selesai = $key->jam_s;

	                	if (($jam_masuk >= $data[1]) && ($data[1] <= $jam_selesai)) {
	                		$this->Model_admin->cek_jadwal_mhs($nim,$tanggal,$jam,$hari);
	                	}
	                }
                }
                

            //echo $tanggal;            
            $count++;
            } //end while

            fclose($handle);
            $data_kelas = $this->Model_admin->data_kelas();
			$param["data_kelas"] = $data_kelas;
            $param["title"] = "Daftar Abensi Mahasiswa";
            
        } 
	}

	public function run_absen_dosen(){
		//if(!$this->session->userdata("username")) redirect(base_url());
		if (($handle = fopen(base_url()."parsing/filemac-01.csv", "r")) !== FALSE) {
            $no = 1;
            $count = 0;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            	$mac = $data[0];
                $hasil = $this->Model_admin->ambil_dosen_mac($mac);
                foreach ($hasil as $row) {
                	$nama_dosen = $row->nama_dosen;
                	$kode_dosen = $row->kode_dosen;
                	$nip = $row->nip;
                	$mac_add = $row->mac_add;

                	if($count>=5 and $mac_add){
	                	$data_array = array(array("nip"=>$nip, "nama_dosen"=>$nama_dosen, "mac_add"=>$mac_add, "waktu_absen"=>$data[1], "kode_dosen"=>$kode_dosen));
	                    $array = explode(" ",$data[1]);
	                    $tanggal = $array[1];
	                    $jam = $array[2];
	                    $timestamp = strtotime($tanggal);
	                    $day = date('D',$timestamp);
	                    switch ($day) {
	                        case 'Mon':
	                            $hari = 'Senin';
	                            break;
	                        
	                        case 'Tue':
	                            $hari = 'Selasa';
	                            break;

	                        case 'Wed':
	                            $hari = 'Rabu';
	                            break;

	                        case 'Thu':
	                            $hari = 'Kamis';
	                            break;

	                        case 'Fri':
	                            $hari = "Jumat";
	                            break;

	                        case 'Sat':
	                            $hari = 'Sabtu';
	                            break;

	                        default:
	                            # code...
	                            break;
	                    }
	                    //echo "Tanggal : ".$tanggal;
	                    $param["data_dosen"] = $data_array;
	                }
	                $jadwal_dosen = $this->Model_admin->jadwal_dosen();
	                foreach ($jadwal_dosen as $key) {
	                	$jam_masuk = $key->jam_m;
	                	$jam_selesai = $key->jam_s;
	                	if (($jam_masuk >= $data[1]) && ($data[1] <= $jam_selesai)) {
	                		$this->Model_admin->cek_jadwal_dosen($nip,$tanggal,$jam,$hari);
	                	}
	                }
	            
                }
                

            //echo $tanggal;

            $count++;
            } //end while

            fclose($handle);
            $data_kelas = $this->Model_admin->data_kelas();
			$param["data_kelas"] = $data_kelas;
            
        } 
	}

	public function data_mhs(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$hasil = $this->Model_admin->data_mhs_semua();
		$data_kelas = $this->Model_admin->data_kelas();
		$param["data_kelas"] = $data_kelas;
		$param["data_mhs_semua"] = $hasil;
		$param["title"]="Data Mahasiswa";
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_mhs',$param);
		$this->load->view('template/admin/footer',$param);
	}

	public function ubah_data_mhs(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$berhasil = $this->Model_admin->ubah_data_mhs();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Diupdate !!
                  </div>");
		} elseif($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!!</strong> Mac Address Telah Terdaftar !!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Diupdate !!
                  </div>");
		}
		redirect(base_url().'admin/data_mhs');
	}

	public function hapus_data_mhs(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$berhasil = $this->Model_admin->hapus_data_mhs();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Dihapus !!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Dihapus !!
                  </div>");
		}
		redirect(base_url().'admin/data_mhs');
	}

	public function data_dosen(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$hasil = $this->Model_admin->data_dosen_semua();
		$data_kelas = $this->Model_admin->data_kelas();
		$param["data_kelas"] = $data_kelas;
		$param["data_dosen_semua"] = $hasil;
		$param["title"]="Data Dosen";
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_dosen',$param);
		$this->load->view('template/admin/footer',$param);
	}

	public function ubah_data_dosen(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$berhasil = $this->Model_admin->ubah_data_dosen();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Diupdate !!
                  </div>");
		} elseif($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!!</strong> Mac Address Telah Terdaftar !!
                  </div>");
		} elseif ($berhasil==3) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!!</strong> Kode Dosen Telah Terdaftar !!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Diupdate !!
                  </div>");
		}
		redirect(base_url().'admin/data_dosen');
	}

	public function hapus_data_dosen(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$berhasil = $this->Model_admin->hapus_data_dosen();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Dihapus !!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Dihapus !!
                  </div>");
		}
		redirect(base_url().'admin/data_dosen');
	}

	public function ceknim(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$ada = $this->Model_admin->ceknim();

		if ($ada==1) {
			echo "<span class='label label-warning'>NIM Sudah terdaftar</span>";
		} else {
			echo "<span class='label label-success'><i class='fa fa-check'></i></span>";
		}
	}

	public function cekmac(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$ada = $this->Model_admin->cekmac();

		if ($ada==1) {
			echo "<span class='label label-warning'>Mac Address sudah terdaftar</span>";
		} elseif($ada==2) {
			echo "<span class='label label-warning'>Mac Address sudah terdaftar</span>";
		} else {
			echo "<span class='label label-success'><i class='fa fa-check'></i></span>";
		}
	}

	public function cekkodedosen(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$ada = $this->Model_admin->cekkodedosen();

		if ($ada==1) {
			echo "<span class='label label-warning'>Kode dosen sudah terdaftar</span>";
		} else {
			echo "<span class='label label-success'><i class='fa fa-check'></i></span>";
		}
	}

	public function ceknip(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$ada = $this->Model_admin->ceknip();

		if ($ada==1) {
			echo "<span class='label label-warning'>NIP sudah terdaftar</span>";
		} else {
			echo "<span class='label label-success'><i class='fa fa-check'></i></span>";
		}
	}

	public function simpan_data_mhs(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$berhasil = $this->Model_admin->simpan_data_mhs();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Ditambah !!
                  </div>");
		} elseif ($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> mac address telah terdaftar!
                  </div>");
		} elseif ($berhasil==3) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> data mahasiswa telah terdaftar!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Ditambah !!
                  </div>");
		}
		redirect(base_url().'admin/data_mhs');
	}

	public function simpan_data_dosen(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());

		$berhasil = $this->Model_admin->simpan_data_dosen();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Ditambah !!
                  </div>");
		} elseif ($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Mac Address sudah terdaftar!
                  </div>");
		} elseif ($berhasil==3) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Kode Dosen telah terdaftar!
                  </div>");
		} elseif ($berhasil==4) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> data dosen yang bersangkutan telah terdaftar!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Ditambah !!
                  </div>");
		}
		redirect(base_url().'admin/data_dosen');
	}

	public function form($nama_form){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());
		switch ($nama_form) {
		    case 'import_mac_dosen':

		    	echo "<form action='".base_url()."admin/importfiledosen' method='post' name='postform' enctype='multipart/form-data' >
		                <p>
		                    <strong>Import Massal Dosen</strong>
		                </p>
		                <div class='asd'>
		                    <label for='backup'>File CSV (*.csv)</label><br>
		                    
		                    <input type='file' name='filename' class='filestyle' /> <br>
		                    
		                    <button type='submit' class='btn btn-primary' name='restore' data-loading-text='Loading...'>Proses</button>
		                </div>";
		    break;

		    case 'import_mac_mhs':

		    	echo "<form action='".base_url()."admin/importfilemhs' method='post' name='postform' enctype='multipart/form-data' >
		                <p>
		                    <strong>Unggah Berkas Data Mahasiswa</strong>
		                </p>
		                <div class='asd'>
		                    <label for='backup'>Berkas CSV (*.csv)</label><br>
		                    
		                    <input type='file' name='filename' class='filestyle' /> <br>
		                    
		                    <button type='submit' class='btn btn-primary' name='restore' data-loading-text='Loading...'>Proses</button>
		                </div>";
		    break;

		    
		}
	}

	public function importfiledosen(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());
		$berhasil = $this->Model_admin->importfiledosen();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Ditambah !!
                  </div>");
		} elseif ($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> beberapa mac address telah terdaftar!
                  </div>");
		} elseif ($berhasil==3) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> beberapa Kode Dosen telah terdaftar!
                  </div>");
		} elseif ($berhasil==4) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> kolom mac address pada file kosong/tidak terisi
                  </div>");
		} elseif ($berhasil==5) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> beberapa data dosen telah terdaftar!
                  </div>");
		} elseif ($berhasil==6) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> column mac address kosong!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Ditambah !!
                  </div>");
		}
		redirect(base_url().'admin/data_dosen');
	}

	public function importfilemhs(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());
		$berhasil = $this->Model_admin->importfilemhs();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Ditambah !!
                  </div>");
		} elseif ($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> beberapa mac address telah terdaftar!
                  </div>");
		} elseif ($berhasil==3) {
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> data berhasil di input tanpa mac address!
                  </div>");
		} elseif ($berhasil==4) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> beberapa mac telah didaftarkan!
                  </div>");
		} elseif ($berhasil==5) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> mac address telah terdaftar!
                  </div>");
		} elseif ($berhasil==6) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> data telah terdaftar dan terisi lengkap!
                  </div>");
		} elseif ($berhasil==7) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Warning!!</strong> column mac address kosong!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Ditambah !!
                  </div>");
		}
		redirect(base_url().'admin/data_dosen');
	}

	public function importkelasmassal(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());
		$berhasil = $this->Model_admin->importkelasmassal();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Ditambah !!
                  </div>");
		} elseif ($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> beberapa data Kelas telah terdaftar!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Ditambah !!
                  </div>");
		}
		redirect(base_url().'admin');
	}

	public function importmatakuliahmassal(){
		if($this->session->userdata("username") != "admin") redirect(base_url());
		//if(!$this->session->userdata("username")) redirect(base_url());
		$berhasil = $this->Model_admin->importmatakuliahmassal();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Ditambah !!
                  </div>");
		} elseif ($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> beberapa data matakuliah dengan dosen bersangkutan telah terdaftar!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Ditambah !!
                  </div>");
		}
		redirect(base_url().'admin');
	}

	public function daftar(){
		$berhasil = $this->Model_admin->daftar();
		if($berhasil==1){
			$this->session->set_flashdata("notification","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Berhasil!!</strong> Data Berhasil Ditambah !!
                  </div>");
		} elseif ($berhasil==2) {
			$this->session->set_flashdata("notification","<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Mac Address Terdaftar!
                  </div>");
		} elseif ($berhasil==3) {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> NIP/NIM Terdaftar !!
                  </div>");
		} else {
			$this->session->set_flashdata("notification","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Gagal!!</strong> Data Gagal Ditambah !!
                  </div>");
		}
		redirect(base_url().'admin');
	}

}
