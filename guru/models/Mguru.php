<?php



class Mguru extends CI_Model {



    //put your code here

    public $id_akun;



    public function __construct() {

        parent::__construct();

    }

    // GET DATA GURU
    public function get_guru()

	{

		$id_guru=$this->session->userdata['email'] ;	

		$this->db->select('id_guru,nama_guru,username,password,email,image,status');

		$this->db->from('tb_guru');

		$this->db->where('email',$id_guru); 

		$query = $this->db->get();

		return $query->result_array();

	}

	// UPDATE GURU
	public function update_guru() {
		$a  =  $this->input->post('nama_guru');
		$b  =  $this->input->post('username');
		$c  =  $this->input->post('email');
		
		$f  =  $this->input->post('id_guru');

		$arr = array(
				'nama_guru' => $a,
				'username' => $b,
				'email'=> $c				
			);
		$this->db->where('id_guru', $f);
		return $this->db->update('tb_guru', $arr);
	}

	// UBAH PASSWORD GURU
	public function ubah_passguru() {
		$a  =  $this->input->post('id_guru');
		$b  =  md5($this->input->post('password'));
		

		$arr = array(
				'password' => $b
			);
		$this->db->where('id_guru', $a);
		return $this->db->update('tb_guru', $arr);
	}

	// UPDATE KATA SANDI GURU
	public function update_katasandi($data, $id)

	{
		$this->db->where('id_guru',$id);

		$this->db->update('tb_guru',$data);

		redirect(site_url('guru/profileguru'));
	}


}

?>