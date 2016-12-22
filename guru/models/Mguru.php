<?php



class Mguru extends CI_Model {



    //put your code here

    public $id_akun;



    public function __construct() {

        parent::__construct();

    }

    public function get_guru()

	{

		$id_guru=$this->session->userdata['email'] ;	

		$this->db->select('id_guru,nama_guru,username,password,email,image,status');

		$this->db->from('tb_guru');

		$this->db->where('email',$id_guru); 

		$query = $this->db->get();

		return $query->result_array();

	}

	public function update_guru() {
		$a  =  $this->input->post('nama_guru');
		$b  =  $this->input->post('username');
		$c  =  $this->input->post('email');
		$d  =  $this->input->post('password');
		$e  =  $this->input->post('status');
		$f  =  $this->input->post('id_guru');

		$arr = array(
				'nama_guru' => $a,
				'username' => $b,
				'email'=> $c,
				'password' => $d,
				'status' => $e,
				'id_guru' => $f
			);
		$this->db->where('id_guru', $f);
		return $this->db->update('tb_guru', $arr);
	}


}

?>