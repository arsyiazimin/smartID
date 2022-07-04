<?php 
class Model_mahasiswa extends CI_Model {
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

    function jadwal_mhs(){
        $nim = $this->session->userdata('username');
        $sql = "SELECT c.kode_mk, d.nama_mk, c.ruang, c.jam_m, c.jam_s, c.hari, e.kode_dosen, e.nama_dosen FROM m_mahasiswa a JOIN mhs_mengambil_mk b ON(a.nim=b.nim) JOIN jadwal c ON(b.id_jadwal=c.id_jadwal) JOIN matakuliah d ON(c.kode_mk=d.kode_mk) JOIN m_dosen e ON(d.nip=e.nip) WHERE a.nim='$nim'";
        $query = $this->db->query($sql);
        $hasil = $query->result();
        return $hasil;
    }

    function log_presensi(){
        $nim = $this->session->userdata('username');
        /*$sql="SELECT b.nim, a.nama_mhs, b.tanggal, b.hari, b.jam, b.status, b.id_abs_mhs FROM m_mahasiswa a JOIN absensi_mhs b ON(a.nim=b.nim) WHERE a.nim='$nim'";*/
        $sql="SELECT b.nim, a.nama_mhs, b.tanggal, b.hari, b.jam, b.status, b.id_abs_mhs, d.nama_mk, e.jam_m, e.jam_s FROM m_mahasiswa a JOIN absensi_mhs b ON(a.nim=b.nim) JOIN mhs_mengambil_mk c ON(a.nim=c.nim) JOIN matakuliah d ON(c.kode_mk=d.kode_mk) JOIN jadwal e ON(c.id_jadwal=e.id_jadwal) WHERE a.nim='$nim' AND (b.jam BETWEEN e.jam_m AND e.jam_s) AND e.hari = b.hari";
        $query = $this->db->query($sql);
        $hasil = $query->result();
        return $hasil;
    }

    function updateabsen(){
        $id_abs_mhs=$this->input->post('id_abs_mhs');
        $berhasil=0;
        try {
            $this->db->set('status','Hadir');
            $this->db->where('id_abs_mhs',$id_abs_mhs);
            $this->db->update('absensi_mhs');
            $berhasil=1;
        } catch (Exception $e) {
            
        }
        
        return $berhasil;
    }
}

?>