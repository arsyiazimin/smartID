<?php 
class Model_admin extends CI_Model {
	function __construct()
    {
        parent::__construct();
        //$this->load->model("Model_mahasiswa");
    }

    function cek($username,$password){
        $this->db->where('nim',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('m_mahasiswa');
        $hasil = $query->result();
        $ada=0; //tdk ada di mhs dan dosen
        if (empty($hasil)) {
            $this->db->where('nip',$username);
            $this->db->where('password',$password);
            $kuery = $this->db->get('m_dosen');
            $hasil = $kuery->result();
            if (!empty($hasil)) {
                $ada = 2; //ada data di m_dosen
            }
        } else {
            $ada = 1; // ada data di m_mahasiswa
        }
        return $ada;
    }

    function ambil_mhs_mac($mac_add){
    	$this->db->where('mac_add',$mac_add);
    	$query = $this->db->get('m_mahasiswa');
    	$hasil = $query->result();
    	return $hasil;
    }

    function ambil_dosen_mac($mac_add){
    	$this->db->where('mac_add',$mac_add);
    	$query = $this->db->get('m_dosen');
    	$hasil = $query->result();
    	return $hasil;
    }

    function data_kelas(){
    	$this->db->order_by('kode_kelas ASC');
    	$query = $this->db->get('m_kelas');
    	$result = $query->result();
    	return $result;
    }

    function data_mhs_semua(){
    	$this->db->order_by('kode_kelas ASC');
    	$query = $this->db->get('m_mahasiswa');
    	$hasil = $query->result();
    	return $hasil;
    }

    function ubah_data_mhs(){
    	$nim = $this->input->post('nim');
		$data = array(
						'mac_add' => $this->input->post('macaddress'),
						'nama_mhs' => $this->input->post('nama'),
						'kode_kelas' => $this->input->post('kelas'),
						'email' => $this->input->post('email'),
						'no_telp' => $this->input->post('notelp')
					 );
		$data1 = array(
						'nama_mhs' => $this->input->post('nama'),
						'kode_kelas' => $this->input->post('kelas'),
						'email' => $this->input->post('email'),
						'no_telp' => $this->input->post('notelp')
					 );
		$berhasil = 0;

		$this->db->select('mac_add');
		$this->db->where('mac_add', $this->input->post('macaddress'));
		$query = $this->db->get('m_mahasiswa');
		$cek = $query->result();

		if (empty($cek)) {
			try {
				$this->db->where('nim',$nim);
				$this->db->update('m_mahasiswa',$data);
				$berhasil = 1;
			} catch (Exception $e) {
				
			}
		} else {
			try {
				$this->db->where('nim',$nim);
				$this->db->update('m_mahasiswa',$data1);
				$berhasil = 2;
			} catch (Exception $e) {
				
			}
		}
		return $berhasil;
    }

    function hapus_data_mhs(){
    	$nim =  $this->input->post('nim');
    	$berhasil = 0;

    	try {
    		$this->db->where('nim', $nim);
    		$this->db->delete('m_mahasiswa');
    		$berhasil = 1;
    	} catch (Exception $e) {
    		
    	}
    	return $berhasil;
    }

    function data_dosen_semua(){
    	$this->db->order_by('nama_dosen ASC');
    	$query = $this->db->get('m_dosen');
    	$hasil = $query->result();
    	return $hasil;
    }

    function ubah_data_dosen(){
    	$nip = $this->input->post('nip');
    	$kode_dosen = $this->input->post('kodedosen');
    	$nama_dosen = $this->input->post('nama_dosen');
    	$mac_add = $this->input->post('macaddress');
    	$no_telp = $this->input->post('notelp');

    	$data = array(
    					'mac_add' => $mac_add,
    					'nama_dosen' => $nama_dosen,
    					'no_telp' => $no_telp,
    					'kode_dosen' => $kode_dosen
    		);

    	$data1 = array(
    					'nama_dosen' => $nama_dosen,
    					'no_telp' => $no_telp,
    					'kode_dosen' => $kode_dosen
    		);
    	$data2 = array(
    					'nama_dosen' => $nama_dosen,
    					'no_telp' => $no_telp,
    					'mac_add' => $mac_add
    		);
    	$berhasil = 0;
    	$this->db->select('kode_dosen');
    	$this->db->where('kode_dosen', $kode_dosen);
    	$query = $this->db->get('m_dosen');
    	$cek_kode_dosen = $query->result();

    	if (empty($cek_kode_dosen)) {
    		$this->db->where('mac_add', $mac_add);
    		$query1 = $this->db->get('m_dosen');
    		$cek_mac = $query1->result();

    		if (empty($cek_mac)) {
    			try {
    				$this->db->where('nip', $nip);
	    			$this->db->update('m_dosen', $data);
	    			$berhasil = 1;
    			} catch (Exception $e) {
    				
    			}
    		} else {
    			try {
    				$this->db->where('nip', $nip);
	    			$this->db->update('m_dosen', $data1);
	    			$berhasil = 2;
    			} catch (Exception $e) {
    				
    			}
    		}
    	} else {
    		try {
    			$this->db->where('nip', $nip);
    			$this->db->update('m_dosen', $data2);
    			$berhasil = 3;
    		} catch (Exception $e) {
    			
    		}
    	}
    	return $berhasil;
    }

    function hapus_data_dosen(){
    	$nip =  $this->input->post('nip');
    	$berhasil = 0;

    	try {
    		$this->db->where('nip', $nip);
    		$this->db->delete('m_dosen');
    		$berhasil = 1;
    	} catch (Exception $e) {
    		
    	}
    	return $berhasil;
    }

    function ceknim(){
    	$nim = $this->input->post('nim');
    	$ada = 0;
    	$this->db->where('nim', $nim);
    	$query = $this->db->get('m_mahasiswa');
    	$cek_nim_mhs = $query->result();
    	if (!empty($cek_nim_mhs)) {
    		$ada = 1;
    	}
    	return $ada;
    }

    function cekmac(){
    	$mac_add = $this->input->post('macaddress');
    	$ada = 0;
    	$this->db->where('mac_add', $mac_add);
    	$query = $this->db->get('m_mahasiswa');
    	$cek_mac_mhs = $query->result();

    	$this->db->where('mac_add', $mac_add);
    	$query1 = $this->db->get('m_dosen');
    	$cek_mac_dosen = $query1->result();

    	if (!empty($cek_mac_mhs)) {
    		$ada = 1;
    	} elseif (!empty($cek_mac_dosen)) {
    		$ada = 2;
    	} else {
    		$ada = 3;
    	}
    	return $ada;
    }

    function cekkodedosen(){
    	$kode_dosen = $this->input->post('kode_dosen');
    	$ada = 0;
    	$this->db->where('kode_dosen', $kode_dosen);
    	$query = $this->db->get('m_dosen');
    	$cek_kode_dosen = $query->result();

    	if (!empty($cek_kode_dosen)) {
    		$ada = 1;
    	}
    	return $ada;
    }

    function ceknip(){
    	$nip = $this->input->post('nip');
    	$ada = 0;
    	$this->db->where('nip', $nip);
    	$query = $this->db->get('m_dosen');
    	$cek_nip_dosen = $query->result();

    	if (!empty($cek_nip_dosen)) {
    		$ada = 1;
    	}
    	return $ada;
    }

    function random_password( $length = 8 ) {
	   	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	   	$password = substr( str_shuffle( $chars ), 0, $length );
	   	return $password;
	}

    function simpan_data_mhs(){
    	$nim 		= $this->input->post('nim');
    	//$macaddress = $this->input->post('macaddress');
    	$nama 		= $this->input->post('nama');
    	$kelas 		= $this->input->post('kelas');
    	$email 		= $this->input->post('email');
    	$no_telp	= $this->input->post('notelp');

    	$password 	= $this->random_password(8);
    	$berhasil	= 0;
    	$data = array(
    					'nim' => $nim,
    					'nama_mhs' => $nama,
    					'email' => $email,
    					'no_telp' => $no_telp,
    					'mac_add' => NULL,
    					'kode_kelas' => $kelas,
    					'password' => $password
    		);
    	$berhasil = 0;
    	$this->db->where('nim', $nim);
    	$query = $this->db->get('m_mahasiswa');
    	$cek_nim_mhs = $query->result();
    	if (empty($cek_nim_mhs)) {
    		//$this->db->where('mac_add', $macaddress);
	    	//$query1 = $this->db->get('m_mahasiswa');
	    	//$cek_mac_mhs = $query1->result();
	    	//if (empty($cek_mac_mhs)) {
	    		try {
		    		$this->db->insert('m_mahasiswa',$data);
		    		$berhasil = 1;
		    	} catch (Exception $e) {
		    		
		    	}
	    	//}else{
	    		//$berhasil = 2;
	    	//}
    	} else {
    		$berhasil = 3;
    	}
    	
    	return $berhasil;
    }

    function simpan_data_dosen(){
    	$nip 		= $this->input->post('nip');
    	//$macaddress = $this->input->post('macaddress');
    	$nama_dosen	= $this->input->post('nama_dosen');
    	$kode_dosen = $this->input->post('kodedosen');
    	$no_telp	= $this->input->post('notelp');
    	function random_password( $length = 8 ) {
		   	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		   	$password = substr( str_shuffle( $chars ), 0, $length );
		   	return $password;
		}
    	$password 	= random_password(8);
    	$berhasil	= 0;

    	$data = array(
    					'nip' => $nip,
    					'kode_dosen' => $kode_dosen,
    					'nama_dosen' => $nama_dosen,
    					'no_telp' => $no_telp,
    					'mac_add' => NULL,
    					'password' => $password
    		);

    	$this->db->where('nip', $nip);
    	$query = $this->db->get('m_dosen');
    	$cek_nip_dosen = $query->result();

    	if (empty($cek_nip_dosen)) {
    		$this->db->where('kode_dosen', $kode_dosen);
	    	$query1 = $this->db->get('m_dosen');
	    	$cek_kode_dosen = $query1->result();
	    	if (empty($cek_kode_dosen)) {
	    		//$this->db->where('mac_add', $macaddress);
		    	//$query2 = $this->db->get('m_dosen');
		    	//$cek_mac_dosen = $query2->result();
		    	//if (empty($cek_mac_dosen)) {
		    		try {
		    			$this->db->insert('m_dosen',$data);
		    			$berhasil = 1;
		    		} catch (Exception $e) {
		    			
		    		}
		    	//} else {
		    		//$berhasil = 2;
		    	//}
	    	} else {
	    		$berhasil = 3;
	    	}
    	} else {
    		$berhasil = 4;
    	}
    	return $berhasil;
    }

    function importfiledosen(){
    	$i=0;
		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
	        echo '<script>';
			echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
			echo '</script>';
		}

		function random_password( $length = 8 ) {
		   	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		   	$password = substr( str_shuffle( $chars ), 0, $length );
		   	return $password;
		}
    	$password 	= random_password(8);

		//Import uploaded file to Database
		$handle = fopen($_FILES['filename']['tmp_name'], "r");

		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($i>0) {
				$data_dosen = array(
									array(
											'nip' => $data[0],
											'kode_dosen' => $data[1],
											'nama_dosen' => $data[2],
											'no_telp' => $data[3],
											'mac_add' => $data[4],
											'password' => $password
										)
									);
			 	$this->db->where('nip', $data[0]);
		    	$query = $this->db->get('m_dosen');
		    	$cek_nip_dosen = $query->result();

		    	if (empty($cek_nip_dosen)) {
		    		$this->db->where('kode_dosen', $data[1]);
			    	$query1 = $this->db->get('m_dosen');
			    	$cek_kode_dosen = $query1->result();
			    	if (!empty($data[4])) {
			    		if (empty($cek_kode_dosen)) {
				    		$this->db->where('mac_add', $data[4]);
					    	$query2 = $this->db->get('m_dosen');
					    	$cek_mac_dosen = $query2->result();
					    	if (empty($cek_mac_dosen)) {
					    		try {
					    			$this->db->insert('m_dosen',$data_dosen);
					    			$berhasil = 1;
					    		} catch (Exception $e) {
					    			
					    		}
					    	} else {
					    		$berhasil = 2;
					    	}
				    	} else {
				    		$berhasil = 3;
				    	}
			    	} else {
			    		$berhasil = 4;
			    	}
		    	} else {
		    		if (!empty($data[4])) {
		    			$berhasil = 5;
		    		} else {
		    			$berhasil = 6;
		    		}
		    	}
			}
			$i++;
		}
	
		fclose($handle);
		return $berhasil;
    }

    function importfilemhs(){
    	$i=0;
    	$berhasil = 0;
		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
	        echo '<script>';
			echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
			echo '</script>';
		}

		function random_password( $length = 8 ) {
		   	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		   	$password = substr( str_shuffle( $chars ), 0, $length );
		   	return $password;
		}
    	$password 	= random_password(8);

		//Import uploaded file to Database
		$handle = fopen($_FILES['filename']['tmp_name'], "r");

		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($i>0) {
				$data_mhs = array(
								array(
										'nim' => $data[0],
										'nama_mhs' => $data[1],
										'email' => $data[3],
										'no_telp' => $data[4],
										'mac_add' => $data[5],
										'kode_kelas' => $data[2],
										'password' => $password
									)
								);
				$data_mhs2 = array(
								array(
										'nim' => $data[0],
										'nama_mhs' => $data[1],
										'email' => $data[3],
										'no_telp' => $data[4],
										'kode_kelas' => $data[2],
										'password' => $password
									)
								);
				$data_mhs3 = array(
								array(
										'mac_add' => $data[5]
									)
								);
				$this->db->where('nim', $data[0]);
		    	$query = $this->db->get('m_mahasiswa');
		    	$cek_nim_mhs = $query->result();

		    	if (empty($cek_nim_mhs)) {
		    		if (!empty($data[5])) {
		    			$this->db->where('mac_add', $data[5]);
				    	$query1 = $this->db->get('m_mahasiswa');
				    	$cek_mac_mhs = $query1->result();
				    	if (empty($cek_mac_mhs)) {
				    		try {
				    			$this->db->insert('m_mahasiswa', $data_mhs);
				    			$berhasil = 1;
				    		} catch (Exception $e) {
				    			
				    		}
				    	} else {
				    		$berhasil = 2;
				    	}
		    		} else {
		    			try {
		    				$this->db->insert('m_mahasiswa', $data_mhs2);
		    				$berhasil = 3;
		    			} catch (Exception $e) {
		    				
		    			}
		    		}
		    	} else {
		    		if (!empty($data[5])) {
		    			$this->db->where('nim', $data[0]);
		    			$this->db->where('mac_add', 'NULL');
				    	$query2 = $this->db->get('m_mahasiswa');
				    	$cek_nim_mac = $query2->result();
				    	if (!empty($cek_nim_mac)) {
				    		$this->db->where('mac_add', $data[5]);
					    	$query1 = $this->db->get('m_mahasiswa');
					    	$cek_mac_mhs = $query1->result();
					    	if (empty($cek_mac_mhs)) {
					    		try {
					    			$this->db->where('nim', $data[0]);
					    			$this->db->update('m_mahasiswa', $data_mhs3);
					    			$berhasil = 4;
					    		} catch (Exception $e) {
					    			
					    		}
					    	} else {
					    		$berhasil = 5;
					    	}
				    	} else {
				    		$berhasil = 6;
				    	}
		    		} else {
		    			$berhasil = 7;
		    		}
		    	}
			 	
			}
			$i++;
		}
	
		fclose($handle);
		return $berhasil;
    }

    function importkelasmassal(){
    	$berhasil = 0;
    	$i=0;
		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
	        echo '<script>';
			echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
			echo '</script>';
		}

		//Import uploaded file to Database
		$handle = fopen($_FILES['filename']['tmp_name'], "r");

		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($i>0) {
				$data_kelas = array(
									array(
											'kode_kelas' => $data[0],
											'nama_kelas' => $data[1]
										)
									);
				$this->db->where('kode_kelas', $data[0]);
		    	$query = $this->db->get('m_kelas');
		    	$cek_kls = $query->result();
		    	if (empty($cek_kls)) {
		    		try {
		    			$this->db->insert('m_kelas', $data_kelas);
		    			$berhasil = 1;
		    		} catch (Exception $e) {
		    			
		    		}
		    	} else {
		    		$berhasil = 2;
		    	}
			}
			$i++;
		}
	
		fclose($handle);
		return $berhasil;
    }

    function importmatakuliahmassal(){
    	$berhasil = 0;
    	$i=0;
		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
	        echo '<script>';
			echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
			echo '</script>';
		}

		//Import uploaded file to Database
		$handle = fopen($_FILES['filename']['tmp_name'], "r");

		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($i>0) {
				$data_mk = array(
									array(
											'kode_mk' => $data[0],
											'nama_mk' => $data[1],
											'nip' => $data[2]
										)
									);
				$this->db->where('kode_mk', $data[0]);
				$this->db->where('nip', $data[2]);
		    	$query = $this->db->get('matakuliah');
		    	$cek_mk = $query->result();
		    	if (empty($cek_mk)) {
		    		try {
		    			$this->db->insert('matakuliah', $data_mk);
		    			$berhasil = 1;
		    		} catch (Exception $e) {
		    			
		    		}
		    	} else {
		    		$berhasil = 2;
		    	}
			}
			$i++;
		}
	
		fclose($handle);
		return $berhasil;
    }

    function cek_jadwal_mhs($nim,$tanggal,$jam,$hari){
    	$data = array(
    					'nim' => $nim,
    					'tanggal' => $tanggal,
    					'hari' => $hari,
    					'jam' => $jam,
    					'status' => 'Alpha' 
    				);
    	$berhasil=0;
    	$this->db->where('nim',$nim);
    	$this->db->where('tanggal',$tanggal);
    	$this->db->where('jam',$jam);
    	$query = $this->db->get('absensi_mhs');
    	$cek = $query->result();

    	if (empty($cek)) {
    		$sql = "SELECT * FROM m_mahasiswa a JOIN mhs_mengambil_mk b ON(a.nim=b.nim) JOIN jadwal c ON(b.id_jadwal=c.id_jadwal) WHERE '$jam' BETWEEN c.jam_m AND c.jam_s AND a.nim='$nim' AND c.hari='$hari'";
    		$query1 = $this->db->query($sql);
    		$cek_jadwal = $query1->result();
    		if (!empty($cek_jadwal)) {
    			try {
    				$this->db->insert('absensi_mhs',$data);
    				$berhasil=1;
    			} catch (Exception $e) {
    				
    			}
    		}
    	}
    	return $berhasil;
    }

    function cek_jadwal_dosen($nip,$tanggal,$jam,$hari){
    	$data = array(
    					'nip' => $nip,
    					'tanggal' => $tanggal,
    					'hari' => $hari,
    					'jam' => $jam,
    					'status' => 'Alpha' 
    				);
    	$berhasil=0;
    	$this->db->where('nip',$nip);
    	$this->db->where('tanggal',$tanggal);
    	$this->db->where('jam',$jam);
    	$query = $this->db->get('absensi_dosen');
    	$cek = $query->result();

    	if (empty($cek)) {
    		$sql = "SELECT * FROM m_dosen a JOIN matakuliah b ON(a.nip=b.nip) JOIN jadwal c ON(b.kode_mk=c.kode_mk) WHERE '$jam' BETWEEN c.jam_m AND c.jam_s AND a.nip='$nip' AND c.hari='$hari'";
    		$query1 = $this->db->query($sql);
    		$cek_jadwal = $query1->result();
    		if (!empty($cek_jadwal)) {
    			try {
    				$this->db->insert('absensi_dosen',$data);
    				$berhasil=1;
    			} catch (Exception $e) {
    				
    			}
    		}
    	}
    	return $berhasil;
    }

    function jadwal_dosen(){
    	$sql = "SELECT b.kode_mk, b.nama_mk, c.ruang, c.jam_m, c.jam_s, c.hari, a.kode_dosen, a.nama_dosen FROM m_dosen a JOIN matakuliah b ON (a.nip=b.nip) JOIN jadwal c ON(b.kode_mk=c.kode_mk)";
    	$query = $this->db->query($sql);
    	$hasil = $query->result();

    	return $hasil;
    }

    function jadwal_mhs(){
    	$sql = "SELECT c.kode_mk, d.nama_mk, c.ruang, c.jam_m, c.jam_s, c.hari, e.kode_dosen, e.nama_dosen FROM m_mahasiswa a JOIN mhs_mengambil_mk b ON(a.nim=b.nim) JOIN jadwal c ON(b.id_jadwal=c.id_jadwal) JOIN matakuliah d ON(c.kode_mk=d.kode_mk) JOIN m_dosen e ON(d.nip=e.nip)";
    	$query = $this->db->query($sql);
    	$hasil = $query->result();

    	return $hasil;
    }

    function daftar(){
    	$id 		= $this->input->post('nim');
    	$macaddress	= $this->input->post('macaddress');
    	$password 	= md5($this->input->post('password'));

    	$data = array('mac_add' => $macaddress, 'password' => $password);

    	$berhasil=0;
    	$this->db->where('nim', $id);
    	$query = $this->db->get('m_mahasiswa');
    	$cek_nim = $query->result();

    	$berhasil=0;
    	$this->db->where('mac_add', $macaddress);
    	$query1 = $this->db->get('m_mahasiswa');
    	$cek_mac_mhs = $query1->result();

    	$this->db->where('nip', $id);
    	$query2 = $this->db->get('m_dosen');
    	$cek_nip = $query2->result();

    	$berhasil=0;
    	$this->db->where('mac_add', $macaddress);
    	$query3 = $this->db->get('m_dosen');
    	$cek_mac_dosen = $query3->result();

    	if (empty($cek_nim)) {
    		if (!empty($cek_nip)) {
    			if (empty($cek_mac_dosen)) {
    				try {
    					$this->db->where('nip', $id);
    					$this->db->update('m_dosen', $data);
    					$berhasil=1;
    				} catch (Exception $e) {
    					
    				}
    			} else {
    				$berhasil=2;
    			}
    		} else {
    			$berhasil=3;
    		}
    	}else{
    		if (empty($cek_mac_mhs)) {
    			try {
    				$this->db->where('nim', $id);
    				$this->db->update('m_mahasiswa', $data);
    				$berhasil=1;
    			} catch (Exception $e) {
    				
    			}
    		}else{
    			$berhasil=2;
    		}
    	}

    	return $berhasil;
    }

    
}

?>