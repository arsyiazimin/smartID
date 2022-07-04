<?php 
class Model_json extends CI_Model {
	function __construct()
    {
        parent::__construct();
        //$this->load->model("Model_mahasiswa");
    }

    function signup(){
        $data = array(
                        'nim' => "2",
                        'no_telp' => $this->input->post('name'),
                        'nama_mhs' => $this->input->post('country'),
                        'email'    => $this->input->post('twitter')
                      );
        $berhasil=0;
        try {
            $this->db->insert('m_mahasiswa',$data);
            $berhasil =1;
        } catch (Exception $e) {
            
        }
        return $berhasil;
    }

    function data_mhs(){
        $this->db->select("*");
        $query = $this->db->get("m_mahasiswa");
        $hasil = $query->row_array();
        return $hasil;
    }

    function data_dosen(){
        $this->db->select("*");
        $query = $this->db->get("m_dosen");
        $hasil = $query->row_array();
        return $hasil;    
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
    	$hasil = $query->row_array();
    	return $hasil;
    }

    function signin_dosen($username,$password){
        $this->db->where('nip',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('m_dosen');
        $hasil = $query->row_array();
        return $hasil;
    }

    function jadwal_mhs($username){
        $nim = $username;
        $sql = "SELECT c.kode_mk, d.nama_mk, c.ruang, c.jam_m, c.jam_s, c.hari, e.kode_dosen, e.nama_dosen FROM m_mahasiswa a JOIN mhs_mengambil_mk b ON(a.nim=b.nim) JOIN jadwal c ON(b.id_jadwal=c.id_jadwal) JOIN matakuliah d ON(c.kode_mk=d.kode_mk) JOIN m_dosen e ON(d.nip=e.nip) WHERE a.nim='$nim'";
        $query = $this->db->query($sql);
        $hasil = $query->row_array();
        return $hasil;
    }

    function log_presensi($username){
        $nim = $username;
        $sql="SELECT b.nim, a.nama_mhs, b.tanggal, b.hari, b.jam, b.status, b.id_abs_mhs FROM m_mahasiswa a JOIN absensi_mhs b ON(a.nim=b.nim) WHERE a.nim='$nim'";
        $query = $this->db->query($sql);
        $hasil = $query->row_array();
        return $hasil;
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