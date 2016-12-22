<?php



class Msiswa extends CI_Model {



    //put your code here



    public function __construct() {

        parent::__construct();

    }

    public function get_siswa()

	{

		$id_siswa=$this->session->userdata['email'] ;	

		$this->db->select('id_siswa,nama_depan,nama_belakang,password,email,alamat,no_tlp,nama_sekolah,status,photo');

		$this->db->from('tb_siswa');

		$this->db->where('email',$id_siswa); 

		$query = $this->db->get();

		return $query->result_array();

	}

	public function update_siswa() {
		$a  =  $this->input->post('nama_depan');
		$b  =  $this->input->post('nama_belakang');
		$c  =  $this->input->post('email');
		$d  =  $this->input->post('password');
		$e  =  $this->input->post('alamat');
		$f  =  $this->input->post('no_tlp');
		$g  =  $this->input->post('id_siswa');
		

		$arr = array(
				'nama_depan' => $a,
				'nama_belakang'=> $b,
				'email'=> $c,
				'password' => $d,
				'alamat'=> $e,
				'no_tlp'=> $f,
				'id_siswa' => $g,
				


			);
		$this->db->where('id_siswa', $g);
		return $this->db->update('tb_siswa', $arr);
	}

	 
    public function update_photo($photo) {
        $data = array(
            'photo' => $photo
        );
        $id_siswa = $this->session->userdata['email'];
        $this->db->where('email', $id_siswa);
        $this->db->update('tb_siswa', $data);
        redirect(site_url('siswa/Profilesiswa'));
    }

    // function get_reportlatihan_siswa($id_siswa) {
    //     $this->db->select('*');
    //     $this->db->from('tb_report_latihan');
    //     $this->db->where('id_siswa', $id_siswa);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }


    function get_reportlatihan_siswa($id_siswa) {
        $this->db->select('r.id_report_latihan,r.id_pengguna,r.id_latihan,r.jmlh_kosong,r.jmlh_benar,r.jmlh_salah,r.total_nilai,r.score,r.tgl_pengerjaan,r.durasi_pengerjaan,l.id_bab,b.judul_bab');
        $this->db->from('tb_report_latihan r');
        $this->db->join('tb_latihan l', 'l.id_latihan = r.id_latihan');
        $this->db->join('tb_bab b', 'b.id_bab = l.id_bab');
        $this->db->where('r.id_pengguna', $id_siswa);
        $query = $this->db->get();
        return $query->result_array();
    }
	

	 public function getDaftarsoal(){
    	
		$this->db->select('b.id_bank, b.judul_soal, b.soal, b.judul_bab, b.kesulitan, m.nama_mapel,b.publish,b.jawaban_benar');
		$this->db->from('tb_bank_soal b');
		$this->db->join('tb_mata_pelajaran m', 'm.id_mapel = b.id_mapel');
		$tampil=$this->db->get();
		return $tampil->result_array();

    }

}

?>