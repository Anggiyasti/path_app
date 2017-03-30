<?php



class Msiswa extends CI_Model {

    public function __construct() {

        parent::__construct();

    }

    // GET DATA SISWA
    public function get_siswa()

	{

		$id_siswa=$this->session->userdata['email'] ;	

		$this->db->select('id_siswa,nama_depan,nama_belakang,password,email,alamat,no_tlp,nama_sekolah,status,photo, jurusan, univ,biografi,facebook,twitter,instagram, jurusan_pelajaran, status_path');

		$this->db->from('tb_siswa');

		$this->db->where('email',$id_siswa); 

		$query = $this->db->get();

		return $query->result_array();

	}

	// UPDATE SISWA
	public function update_siswa() {
		$a  =  $this->input->post('nama_depan');
		$b  =  $this->input->post('nama_belakang');
		$c  =  $this->input->post('email');
		$d  =  $this->input->post('jurusan_sekolah');
		$e  =  $this->input->post('alamat');
		$f  =  $this->input->post('no_tlp');
		$g  =  $this->input->post('id_siswa');
		$j  =  $this->input->post('biografi');
		$k  =  $this->input->post('nama_belakang');

		$arr = array(
				'nama_depan' => $a,
				'nama_belakang'=> $b,
				'email'=> $c,
				'jurusan_pelajaran' => $d,
				'alamat'=> $e,
				'no_tlp'=> $f,
				'id_siswa' => $g,
<<<<<<< HEAD
				'biografi' => $j,
				'nama_belakang' => $k
				

=======
				'biografi' => $j
>>>>>>> 784de4bf6ce493b067a9fcf7744f52afe82c5b68

			);
		$this->db->where('id_siswa', $g);
		return $this->db->update('tb_siswa', $arr);
	}

	// UPDATE SOCIAL MEDIA 
	public function update_sosmed() {
		$a  =  $this->input->post('facebook');
		$b  =  $this->input->post('twitter');
		$c  =  $this->input->post('instagram');
		$g  =  $this->input->post('id_siswa');

		$arr = array(
				'facebook' => $a,
				'twitter'=> $b,
				'instagram'=> $c,

			);
		$this->db->where('id_siswa', $g);
		return $this->db->update('tb_siswa', $arr);
	}

	// fungsi update univ dan jurusan
	public function up_siswa($j, $u) {
		$id_siswa=$this->session->userdata['email'] ;
		$jur = urldecode($j);
		$univ = urldecode($u);
		$arr = array(
				'jurusan'=> $jur,
				'univ'=> $univ,
			);
		$this->db->where('email', $id_siswa);
		return $this->db->update('tb_siswa', $arr);
	}

	// GET JURUSAN UNIVERSITAS
	function getjur($id){

		$option="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('prodi','ASC');
		$jur= $this->db->get_where('tb_passing_grade',array('universitas'=>$id));
		foreach ($jur->result_array() as $data ){
		$option.= "<option value='$data[prodi]'></option>";

		}
		return $option;
	}

	// GET UNIVERSITAS
	function getuniv(){
		$this->db->order_by('universitas','ASC');
		$provinces= $this->db->get('tb_passing_grade');
		return $provinces->result_array();
	}

	// UBAH KATA SANDI
	public function ubah_katasandi() {
		$a  =  $this->input->post('id_siswa');
		$b  =  md5($this->input->post('password'));
		
		$arr = array(
				'password' => $b
			);
		$this->db->where('id_siswa', $a);
		return $this->db->update('tb_siswa', $arr);
	}

	// UPDATE FOTO SISWA	 
    public function update_photo($photo) {
        $data = array(
            'photo' => $photo
        );
        $id_siswa = $this->session->userdata['email'];
        $this->db->where('email', $id_siswa);
        $this->db->update('tb_siswa', $data);
        redirect(site_url('siswa/Profilesiswa'));
    }

    // UPDATE FOTO DEFAULT
    public function update_photo_default() {
        $data = array(
            'photo' => "male.png"
        );
        $id_siswa = $this->session->userdata['email'];
        $this->db->where('email', $id_siswa);
        $this->db->update('tb_siswa', $data);
    }

    // GET REPORT SISWA
    function get_reportlatihan_siswa($id_siswa) {
        $this->db->select('r.id_report_latihan,r.id_pengguna,r.id_latihan,r.jmlh_kosong,r.jmlh_benar,r.jmlh_salah,r.total_nilai,r.score,r.tgl_pengerjaan,r.durasi_pengerjaan,l.id_bab,b.judul_bab');
        $this->db->from('tb_report_latihan r');
        $this->db->join('tb_latihan l', 'l.id_latihan = r.id_latihan');
        $this->db->join('tb_bab b', 'b.id_bab = l.id_bab');
        $this->db->where('r.id_pengguna', $id_siswa);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	// GET ID SISWA UNTUK TOKEN
    function get_siswaid(){
        $penggunaID = $this->session->userdata['email'];

        $this->db->select('id_siswa');
        $this->db->from('tb_siswa');
        $this->db->where('email',$penggunaID);
        $query = $this->db->get();
        return $query->result_array()[0]['id_siswa'];
    }

    // GET TOKEN SISWA FRONT
    function get_token(){
        $siswaID = $this->get_siswaid();
        $this->db->select('*');
        $this->db->from('tb_token');
        $this->db->where('siswaID', $siswaID);
        $query = $this->db->get();
        if ($query->result_array()) {
            return $query->result_array()[0];
        }else{
            return false;
        }
    }

    // GET SISWA YANG BELUM IKUT TO
    public function get_siswa_blm_ikutan_to() {
        $query = "SELECT s.id_siswa, s.nama_depan,s.nama_belakang 
                    FROM tb_siswa s 
                    WHERE s.status = 1
        ";
        $result = $this->db->query($query);
        return $result->result_array();
    }

}

?>