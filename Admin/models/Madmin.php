<?php 



/**
 * 
 */
 class Madmin extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

	public function get_admin()

	{

		$id_admin=$this->session->userdata['username'] ;	

		$this->db->select('id_admin,username,password,status');

		$this->db->from('tb_admin');

		$this->db->where('username',$id_admin); 

		$query = $this->db->get();

		return $query->result_array();

	}

	public function update_admin() {
		// $a  =  $this->input->post('nama_guru');
		// $c  =  $this->input->post('email');
		$b  =  $this->input->post('username');
		$d  =  $this->input->post('password');
		$e  =  $this->input->post('status');
		$f  =  $this->input->post('id_admin');

		$arr = array(
				// 'nama_guru' => $a,
				// 'email'=> $c,
				'username' => $b,
				'password' => $d,
				'status' => $e,
				'id_guru' => $f
			);
		$this->db->where('id_admin', $f);
		return $this->db->update('tb_admin', $arr);
	}

	function getmapel(){
	$this->db->order_by('nama_mapel','ASC');
	$this->db->where('status = 1');
	$provinces= $this->db->get('tb_mata_pelajaran');
	

	return $provinces->result_array();
	}
	public function getsoal() {
    	$this->db->select('b.id_bank, b.judul_soal, b.soal, b.judul_bab, b.kesulitan, m.nama_mapel');
		$this->db->from('tb_bank_soal b');
		$this->db->join('tb_mata_pelajaran m', 'm.id_mapel = b.id_mapel');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }
     public function getkesulitanfilter() {
    	$this->db->select('kesulitan');
		$this->db->from('tb_bank_soal');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }







 } ?>