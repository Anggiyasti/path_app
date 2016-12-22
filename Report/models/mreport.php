<?php 
/**
* 
*/
class mreport extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	

	public function getreportall()
	{
		$this->db->distinct();
		$this->db->select()->from('tb_report_latihan');
		$tampil=$this->db->get();
		return $tampil->result_array();
	}

	public function getreportpersiswa()
	{
		
		$b  =  $this->input->post('id_siswa');

		
		$arr = array(
				
				'id_siswa'=> $b
				
				
			);
		
		$this->db->distinct();
		$this->db->select('*');
		$this->db->where('id_siswa', $b);
		$this->db->from('tb_report_latihan', $arr);
		$tampil=$this->db->get();
		return $tampil->result_array();

	}
	

	
	



}

 ?>