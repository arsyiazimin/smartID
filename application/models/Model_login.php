<?php 
class Model_login extends CI_Model {
	function __construct()
    {
        parent::__construct();
        //$this->load->model("Model_mahasiswa");
    }

    function data_mhs(){
        $this->db->select("*");
        $query = $this->db->get("m_mahasiswa");
        $hasil = $query->result();
        return $hasil;
    }

    function data_dosen(){
        $this->db->select("*");
        $query = $this->db->get("m_dosen");
        $hasil = $query->result();
        return $hasil;    
    }

    function signup(){
    	$data = array(
						'username' => $this->input->post('username'),
						'password' => md5($this->input->post('password')),
						'email'	   => $this->input->post('email')
					  );
		$berhasil=0;
		try {
			$this->db->insert('user',$data);
			$berhasil =1;
		} catch (Exception $e) {
			
		}
		return $berhasil;
    }

    function cek($username,$password){
        $this->db->where('nim',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('m_mahasiswa');
        $hasil = $query->result();
        $ada=0;
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

    function signin_mhs($username,$password){
    	$this->db->where('nim',$username);
    	$this->db->where('password',$password);
    	$query = $this->db->get('m_mahasiswa');
    	$hasil = $query->result();
    	return $hasil;
    }

    function signin_dosen($username,$password){
        $this->db->where('nip',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('m_dosen');
        $hasil = $query->result();
        return $hasil;
    }

    function ceknim_nip(){
        $id = $this->input->post('id');
        $ada=0;
        $this->db->where('nim', $id);
        $query = $this->db->get('m_mahasiswa');
        $cek_nim = $query->result();

        if (!empty($cek_nim)) {
            $ada = 1;
        } else {
            $this->db->where('nip', $id);
            $query = $this->db->get('m_dosen');
            $cek_nip = $query->result();
            if (!empty($cek_nip)) {
                $ada = 2;
            }
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
}

?>