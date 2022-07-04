<?php 
class Model_dosen extends CI_Model {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
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

    function data_kelas(){
    	$this->db->order_by('kode_kelas ASC');
    	$query = $this->db->get('m_kelas');
    	$result = $query->result();
    	return $result;
    }

    function jadwal_dosen(){
        $nip = $this->session->userdata('username');
        $sql = "SELECT b.kode_mk, b.nama_mk, c.ruang, c.jam_m, c.jam_s, c.hari, a.kode_dosen, a.nama_dosen FROM m_dosen a JOIN matakuliah b ON(a.nip=b.nip) JOIN jadwal c ON(b.kode_mk=c.kode_mk) WHERE a.nip='$nip'";
        $query = $this->db->query($sql);
        $hasil = $query->result();
        return $hasil;
    }

    function log_presensi(){
        $nip = $this->session->userdata('username');
        $sql="SELECT b.nip, a.nama_dosen, b.tanggal, b.hari, b.jam, b.status, b.id_abs_dosen, c.nama_mk, d.jam_m, d.jam_s FROM m_dosen a JOIN absensi_dosen b ON(a.nip=b.nip) JOIN matakuliah c ON(a.nip=c.nip) JOIN jadwal d ON(c.kode_mk=d.kode_mk) WHERE a.nip='$nip' AND (b.jam BETWEEN d.jam_m AND d.jam_s) AND d.hari = b.hari";

        $query = $this->db->query($sql);
        $hasil = $query->result();
        return $hasil;
    }

    function updateabsen(){
        $id_abs_dosen=$this->input->post('id_abs_dosen');
        $berhasil=0;
        try {
            $this->db->set('status','Hadir');
            $this->db->where('id_abs_dosen',$id_abs_dosen);
            $this->db->update('absensi_dosen');
            $berhasil=1;
        } catch (Exception $e) {
            
        }
        
        return $berhasil;
    }
}

?>